<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $role_author = new Role();
        $role_author->name = 'author';
        $role_author->description = 'An author';
        $role_author->save();

        $role_user = new Role();
        $role_user->name = 'user';
        $role_user->description = 'A normal user';
        $role_user->save();
    }
}
