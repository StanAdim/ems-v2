<?php

namespace App\Console\Commands;

use App\Enums\ProfileType;
use App\Models\User;
use App\Models\UserProfile;
use Exception;
use Illuminate\Console\Command;

class ImportUsers extends Command
{
    protected $signature = 'app:import-users {usersFile} {userInfosFile} {--userIdColIndex=0} {--foreignUserIdColIndex=11}';
    protected $description = 'Import Users from users_table user_infos_table CSV files';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $usersFile = $this->argument('usersFile');
        $userInfosFile = $this->argument('userInfosFile');

        $users = $this->readCsv($usersFile);
        $userInfos = $this->readCsv($userInfosFile);

        $joinedData = $this->joinCsvData($users, $userInfos);
        $this->info('Importing ' . count($joinedData) . ' users and profiles ...');

        $createdUsers = $this->createUsers($joinedData);
        $this->info('Users and Profiles imported finalizing...');

        $outputFile = storage_path('logs') . '/user_imports_' . time() . '.csv';
        $this->writeCsv($outputFile, $createdUsers);
        $this->info("Imported User data stored in $outputFile");
    }

    private function readCsv($file)
    {
        $data = [];
        if (($handle = fopen($file, 'r')) !== FALSE) {
            while (($row = fgetcsv($handle, 1000, ',')) !== FALSE) {
                $data[] = $row;
            }
            fclose($handle);
        }
        return $data;
    }

    private function joinCsvData($users, $userInfos)
    {
        // Assuming the first column in each CSV is the user ID
        $headers = array_merge($users[0], array_slice($userInfos[0], 1)); // merge headers
        $mergedData = [$headers];

        $userIdColIndex = $this->option('userIdColIndex');
        for ($i = 1; $i < count($users); $i++) {
            $userId = $users[$i][$userIdColIndex];
            $userInfoRow = $this->findUserInfo($userInfos, $userId);
            if ($userInfoRow) {
                $mergedData[] = array_merge($users[$i], array_slice($userInfoRow, 1));
            }
        }
        return $mergedData;
    }

    private function findUserInfo($userInfos, $userId)
    {
        $foreignUserIdColIndex = $this->option('foreignUserIdColIndex');
        foreach ($userInfos as $row) {
            if ($row[$foreignUserIdColIndex] == $userId) {
                return $row;
            }
        }
        return null;
    }

    private function createUsers(array $usersAndInfo)
    {
        $created = [['Id', 'ProfileId', 'Name', 'Email', 'RegistrationNumber']];

        $headers = $usersAndInfo[0];
        for ($i = 1; $i < count($usersAndInfo); $i++) {
            $row = (object) array_combine($headers, $usersAndInfo[$i]);

            try {
                $user = User::create([
                    'name' => implode(' ', [$row->firstName, $row->middleName, $row->lastName]),
                    'email' => $row->email,
                    'email_verified_at' => $row->email_verified_at,
                    'password' => $row->password,
                ]);
            } catch (Exception $e) {
                $this->error($e->getMessage());
                $user = null;
            }

            if ($user) {
                $profile = UserProfile::create([
                    'user_id' => $user->id,
                    'registration_status' => $row->professionalStatus === 'f' ? 'non-registered' : 'registered',
                    'registration_number' => $row->professionalNumber,
                    'phone_number' => $row->phoneNumber,
                    'institution_name' => $row->institution,
                    'position' => $row->position,
                    'nationality' => $row->nation,
                    'address' => [
                        'physical_address' => $row->address,
                        'region' => $row->region_id,
                        'district' => $row->district_id,
                    ],
                    'type' => ProfileType::User,
                    'can_receive_notification' => $row->notificationConsent === 't' ?: false,
                ]);

                $created[] = [
                    $user->id,
                    $profile->id,
                    $user->name,
                    $user->email,
                    $profile->registration_number,
                ];
            }
        }

        return $created;
    }

    private function writeCsv($file, $data)
    {
        $handle = fopen($file, 'w');
        foreach ($data as $row) {
            fputcsv($handle, $row);
        }
        fclose($handle);
    }
}
