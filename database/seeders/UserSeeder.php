<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                "nama" => "muhammad al farizzi",
                "username" => "alfarizzi",
                "email" => "malfarizzi13@gmail.com",
                "password" => bcrypt("rahasia"),
            ],
            [
                "nama" => "steve jobs",
                "username" => "jobs",
                "email" => "jobs@gmail.com",
                "password" => bcrypt("rahasia"),
            ],
            [
                "nama" => "eduardo saverin",
                "username" => "saverin",
                "email" => "saverin@gmail.com",
                "password" => bcrypt("rahasia"),
            ],
            [
                "nama" => "mark zuckerberg",
                "username" => "mark",
                "email" => "mark@gmail.com",
                "password" => bcrypt("rahasia"),
            ],
            [
                "nama" => "richard",
                "username" => "richard",
                "email" => "richard@gmail.com",
                "password" => bcrypt("rahasia"),
            ],
            [
                "nama" => "dinesh",
                "username" => "dinesh",
                "email" => "dinesh@gmail.com",
                "password" => bcrypt("rahasia"),
            ],
            [
                "nama" => "gilfoyle",
                "username" => "gilfoyle",
                "email" => "gilfoyle@gmail.com",
                "password" => bcrypt("rahasia"),
            ],
        ];
        foreach ($data as $d) {
            User::create([
                "nama" => $d['nama'],
                "username" => $d['username'],
                "email" => $d['email'],
                "password" => $d['password']
            ]);
        }
    }
}
