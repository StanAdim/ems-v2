<?php

namespace App\Livewire\Forms;
use App\Enums\ProfileType;
use Livewire\Form;
use Illuminate\Validation\Rules;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserDetailsForm extends Form
{
    public $type = ProfileType::User;
    public $first_name = '';
    public $middle_name = '';
    public $last_name = '';

    public $email = '';
    public $password = '';
    public $password_confirmation = '';
    public $phone_number = '';
    public $registration_status = '';
    public $institution_name = '';
    public $position = '';
    public $nationality = '';
    public $address = '';
    public $region = '';
    public $district = '';

    public $company_service_category = '';
    public $company_registration_number = '';
    public $vat_number = '';

    public function rules()
    {
        return [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'phone_number' => ['required_if:type,user'],
            'registration_status' => ['required'],
            'institution_name' => ['required_if:type,user'],
            'position' => ['required_if:type,user'],
            'nationality' => ['required'],
            'address' => ['required'],
            'region' => ['required'],
            'district' => ['required'],
            'company_service_category' => ['required_if:type,exhibitor'],
            'company_registration_number' => ['required_if:type,exhibitor'],
            'vat_number' => ['required_if:type,exhibitor'],
        ];
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(): void
    {
        $this->validate();
        DB::beginTransaction();

        try {
            $user = User::create([
                'name' => implode(' ', [
                    $this->first_name,
                    $this->middle_name,
                    $this->last_name
                ]),
                'email' => $this->email,
                'password' => Hash::make($this->password),
            ]);

            if ($user) {
                $user->roles()->detach();

                $address_obj = [
                    "physical_address" => $this->address,
                    "region" => $this->region,
                    "district" => $this->district,
                ];

                $address_json = json_encode($address_obj);

                UserProfile::create(
                    [
                        'user_id' => $user->id,
                        'phone_number' => $this->phone_number,
                        'registration_status' => $this->registration_status,
                        'institution_name' => $this->institution_name,
                        'position' => $this->position,
                        'nationality' => $this->nationality,
                        'address' => $address_json,
                        'can_receive_notification' => true,
                        'type' => $this->type,
                    ]
                );
            }

            DB::commit();
            event(new Registered($user));

            Auth::login($user);

        } catch (\Exception $e) {
            DB::rollBack();

            Log::error("Registration Failed: " . $e->getMessage());

            throw $e;
        }
    }
}
