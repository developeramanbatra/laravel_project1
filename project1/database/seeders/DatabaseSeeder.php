<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();        //Used to create dummy records in USER MODEL Only...very cool     



        //For Any Other models
        // Student::create([
        //     'firstname'=>   'abcd',
        //     'lastname'=>    'ef' ,
        //     'rollno'=>      '123',
        //     'contact'=>     '80707807',
        //     'email'=>       'fmksdjfdijfopdw',
        //     'password'=>Hash::make('8767'),
        // ]);
        // Student::create([
        //     'firstname'=>   'abeokeoeedecd',
        //     'lastname'=>    'dededed' ,
        //     'rollno'=>      '123',
        //     'contact'=>     '80707807',
        //     'email'=>       'fmdeodeidhksdjfdijfopdw',
        //     'password'=>Hash::make('8767'),
        // ]);
    }
}
