<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class GetUserEmail extends Command{

    protected $signature = 'users:get';
    protected $description = 'Get the email address of the only user in the users table';

    public function handle(){
        $userCount = User::count();

        if ($userCount === 0) {
            $this->error('No users found in the database.');
            return -1;
        } elseif ($userCount > 1) {
            $this->error('Multiple users found in the database. Cannot determine the correct email.');
            return -1;
        }

        // Get the email of the only user in the table
        $user = User::first();
        $this->info('The email address of the doctor is: ' . $user->email);

        return 0;
    }
}