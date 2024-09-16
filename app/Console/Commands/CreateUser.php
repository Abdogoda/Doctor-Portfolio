<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CreateUser extends Command{
    protected $signature = 'users:create';
    protected $description = 'Create User Command';

    public function handle(){
        // check there is no users 
        if (User::count() > 0) {
            $this->error('A user already exists in the system. Only one user is allowed.');
            return -1;
        }

        // Ask for user details
        $name = $this->ask('Enter the doctor\'s name');
        $email = $this->ask('Enter the doctor\'s email');
        $password = $this->secret('Enter the doctor\'s password');

        // Validate user input
        $validator = Validator::make([
            'name' => $name,
            'email' => $email,
            'password' => $password,
        ], [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $error) {
                $this->error($error);
            }
            return -1;
        }

        // Create the user
        User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
        ]);

        $this->info('Doctor user created successfully!');
        return 0;
    }
}