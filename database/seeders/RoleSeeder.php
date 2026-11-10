<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $admin=Role::firstOrCreate(['name'=>'admin']);
       $editor=Role::firstOrCreate(['name'=>'editor']);

       $user=User::firstOrCreate(['email'=>'example@example.com'],['name'=>'admin', 'password'=>'password1234']);

       $user->roles()->syncWithoutDetaching([$admin->id,$editor->id]);
    }
}
