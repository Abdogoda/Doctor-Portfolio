<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ResetUserPassword extends Command{

    protected $signature = 'users:reset';

    protected $description = 'Reset user password';

    public function handle(){
        // Check if there is exactly one user in the database
        $userCount = User::count();

        if ($userCount === 0) {
            $this->error('No users found in the database.');
            return -1;
        } elseif ($userCount > 1) {
            $this->error('Multiple users found in the database. Cannot determine the correct user.');
            return -1;
        }

        $email = $this->ask('Enter the doctor\'s email');
        // Validate user input
        $validator = Validator::make([
            'email' => $email,
        ], [
            'email' => 'required|string|email|max:255|exists:users',
        ]);

        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $error) {
                $this->error($error);
            }
            return -1;
        }

        // Get the only user in the table
        $user = User::where('email', $email)->first();

        if(!$user){
            $this->error('Email not found in the users table.');
            return -1;
        }

        // Ask for a new password
        $password = $this->secret('Enter the new password for the doctor');
        $password_confirmation = $this->secret('Confirm the new password');

        $validator = Validator::make([
            'password' => $password,
            'password_confirmation' => $password_confirmation,
        ], [
            'password' => 'required|string|confirmed|min:6',
        ]);

        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $error) {
                $this->error($error);
            }
            return -1;
        }

        // Update the user's password
        $user->password = Hash::make($password);
        $user->save();

        $this->info('The password has been successfully reset.');
        return 0;
    }
}