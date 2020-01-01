<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{

    public function run()
    {
        // Add the root administrator
        // Get the admin role
        $role_admin = Role::where('name', 'user administrator')->first();
        // Create the admin user
        $admin = new User();
        $admin->name = "John Useradministrator";
        $admin->email = "admin@example.com";
        $admin->password = bcrypt("inet2005");
        $admin->save();
        // Associate the admin role with the newly created user
        $admin->roles()->attach($role_admin);


        // Add the user editor
        // Get the user editor role
        $role_editor = Role::where('name', 'editor')->first();
        // Create the editor user
        $editor = new User();
        $editor->name = "Jane Editor";
        $editor->email = "editor@example.com";
        $editor->password = bcrypt("inet2005");
        $editor->save();
        // Associate the editor role with the newly created user
        $editor->roles()->attach($role_editor);


        // Add the post moderator user
        // Get the moderator role
        $role_moderator = Role::where('name', 'post moderator')->first();
        // Create the editor user
        $moderator = new User();
        $moderator->name = "Jack Postmoderator";
        $moderator->email = "moderator@example.com";
        $moderator->password = bcrypt("inet2005");
        $moderator->save();
        // Associate the moderator role with the newly created user
        $moderator->roles()->attach($role_moderator);


        // Add the theme manager user
        // Get the theme manager role
        $role_theme_manager = Role::where('name', 'theme manager')->first();
        // Create the theme manager user
        $theme_manager = new User();
        $theme_manager->name = "James Thememanager";
        $theme_manager->email = "manager@example.com";
        $theme_manager->password = bcrypt("inet2005");
        $theme_manager->save();
        // Associate the moderator role with the newly created user
        $theme_manager->roles()->attach($role_theme_manager);


        // Add the default user
        // Get the default user role
        $role_default_user = Role::where('name', 'default user')->first();
        // Create the default user
        $default_user = new User();
        $default_user->name = "Jillian Defaultuser";
        $default_user->email = "user@example.com";
        $default_user->password = bcrypt("inet2005");
        $default_user->save();
        // Associate the default user role with the newly created user
        $default_user->roles()->attach($role_default_user);
    }
}
