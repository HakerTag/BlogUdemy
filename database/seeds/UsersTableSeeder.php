<?php

use App\User;
use App\Role;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        Role::truncate();
        DB::table('assigned_roles')->truncate();
        
        $user = User::create([
        	'name' => 'Daniel',
        	'email' => 'admin@email.com',
        	'password' => '123123'
        ]);

        $role = Role::create([
        	'name' => 'admin',
        	'display_name' => 'Administrador',
        	'descripcion' => 'Administrador del sitio web'
        ]); 

        $user->roles()->save($role);
    }
}
