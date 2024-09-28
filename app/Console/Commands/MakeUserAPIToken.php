<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class MakeUserAPIToken extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:user-api-token {email}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generates a Sanctum API token for this user';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $user = User::whereEmail($this->argument('email'))->firstOrFail();
        $token = $user->createToken('apiAccessToken');

        $this->info("User: {$user->name}<{$user->email}>");
        $this->info("Token: {$token->plainTextToken}");
    }
}
