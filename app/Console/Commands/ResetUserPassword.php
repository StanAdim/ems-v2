<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ResetUserPassword extends Command
{
    protected $signature = 'user:reset-password {email}';
    protected $description = 'Reset user password with a random 8-character string';

    public function handle()
    {
        $email = $this->argument('email');
        $user = User::where('email', $email)->first();

        if (!$user) {
            $this->error('User not found.');
            return;
        }

        // Generate a random 8-character password
        $newPassword = Str::random(8);

        // Update the user's password
        $user->password = Hash::make($newPassword);
        $user->save();

        $this->info("Password reset successfully.");
        $this->info("New Password: {$newPassword}");
    }
}
