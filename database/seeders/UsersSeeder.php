<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        $teknisi = User::create([
            'name' => 'teknisi',
            'email' => 'teknisi@teknisi.com',
            'divisi' => 'teknisi',
            'password' => bcrypt('123456'),
            'remember_token' => Str::random(60),
            'status' => '2',

            ]);
        $teknisi->save();

        $warehouse = User::create([
            'name' => 'warehouse',
            'email' => 'warehouse@warehouse.com',
            'divisi' => 'warehouse',
            'password' => bcrypt('123456'),
            'remember_token' => Str::random(60),
            'status' => '2',
            ]);
        $warehouse->save();

        $marketing = User::create([
            'name' => 'marketing',
            'email' => 'marketing@marketing.com',
            'divisi' => 'marketing',
            'password' => bcrypt('123456'),
            'remember_token' => Str::random(60),
            'status' => '2',

            ]);
        $marketing->save();

        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'divisi' => 'admin',
            'password' => bcrypt('123456'),
            'remember_token' => Str::random(60),
            'status' => '2',

            ]);
        $admin->save();

        $purchasing = User::create([
            'name' => 'purchasing',
            'email' => 'purchasing@purchasing.com',
            'divisi' => 'purchasing',
            'password' => bcrypt('123456'),
            'remember_token' => Str::random(60),
            'status' => '2',

            ]);
        $purchasing->save();
        
        $administrator = User::create([
            'name' => 'administrator',
            'email' => 'administrator@administrator.com',
            'divisi' => 'administrator',
            'password' => bcrypt('123456'),
            'remember_token' => Str::random(60),
            'status' => '2',

            ]);
        $administrator->save();

        $office = User::create([
            'name' => 'office',
            'email' => 'office@office.com',
            'divisi' => 'office',
            'password' => bcrypt('123456'),
            'remember_token' => Str::random(60),
            'status' => '2',

            ]);
        $office->save();
    }
}
