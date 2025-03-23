<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class ResendVerificationEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:resend-verification-emails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Resend verification emails to unverified users';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $users = User::whereNull('email_verified_at')->get();

        $this->info("Found {$users->count()} unverified users");

        foreach ($users as $user) {
            $this->info("Sent verification email to {$user->email}");
            $user->sendEmailVerificationNotification();
        }
    }
}
