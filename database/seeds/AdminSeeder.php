<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run()
    {
        $password = bcrypt('123456');
        $date = date('Y-m-d H:i:s');

        DB::table('users')->insert([
            'facultyNum' => '0000000000',
            'fname' => 'Admin',
            'lname' => 'Admin',
            'password' => $password,
            'email' => 'admin@admin.com',
            'is_admin' => true,
            'created_at' => $date,
            'updated_at' => $date
        ]);
    }
}

