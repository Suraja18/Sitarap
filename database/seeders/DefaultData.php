<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Admin;
use App\Models\Clinic;
use App\Models\Company;

class DefaultData extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $Admin = [
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt(123456),
        ];
        Admin::create($Admin);
        $User = [
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => bcrypt(123456),
        ];
        User::create($User);
        $Clinic = [
            'name' => 'Clinic',
            'email' => 'clinic@gmail.com',
            'password' => bcrypt(123456),
        ];
        Clinic::create($Clinic);
        $Company = [
            'name' => 'Company',
            'email' => 'company@gmail.com',
            'password' => bcrypt(123456),
        ];
        Company::create($Company);
    }
}
