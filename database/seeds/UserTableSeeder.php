<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_administrator = Role::where('name', 'administrator')->first();
		$role_user  = Role::where('name', 'user')->first();
		$administrator = new User();
		$administrator->name = 'administrator Name';
		$administrator->email = 'administrator@example.com';
		$administrator->password = bcrypt('secret');
		$administrator->save();
		$administrator->roles()->attach($role_administrator);
		$user = new User();
		$user->name = 'user Name';
		$user->email = 'user@example.com';
		$user->password = bcrypt('secret');
		$user->save();
		$user->roles()->attach($role_user);
    }
}
