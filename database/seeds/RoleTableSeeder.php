<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{

    public function run()
    {
        $role_admin = new Role();
        $role_admin->name = 'user administrator';
        $role_admin->save();

        $role_editor = new Role();
        $role_editor->name = 'editor';
        $role_editor->save();

        $role_moderator = new Role();
        $role_moderator->name = 'post moderator';
        $role_moderator->save();

        $role_theme_manager = new Role();
        $role_theme_manager->name = 'theme manager';
        $role_theme_manager->save();

        $role_default_user = new Role();
        $role_default_user->name = 'default user';
        $role_default_user->save();
    }
}
