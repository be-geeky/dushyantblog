<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_administrator = new Role();
		$role_administrator->name = 'administrator';
		$role_administrator->description = 'A administrator User';
		$role_administrator->save();
		$role_user = new Role();
		$role_user->name = 'user';
		$role_user->description = 'A user User';
		$role_user->save();
    }
}
