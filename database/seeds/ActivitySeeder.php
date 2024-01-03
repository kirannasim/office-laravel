<?php

use Illuminate\Database\Seeder;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('activities')->insert([
            [
                "operation" => 'login',
                "description" => "Login to system",
                "priority" => 0,
                "visibility" => 1,
                "icon" => 'fa fa-lock',
                "color" => 'teal'
            ],
            [
                "operation" => 'registration',
                "description" => "New member registration",
                "priority" => 1,
                "visibility" => 1,
                "icon" => 'fa fa-user-plus',
                "color" => 'orange'
            ],
            [
                "operation" => 'forget_password',
                "description" => "Forget password",
                "priority" => 0,
                "visibility" => 1,
                "icon" => 'fa fa-lock',
                "color" => 'teal'
            ],
            [
                "operation" => 'change_transaction_password',
                "description" => "Transaction password changed",
                "priority" => 0,
                "visibility" => 1,
                "icon" => 'fa fa-lock',
                "color" => 'red'
            ],
            [
                "operation" => 'profile_update',
                "description" => "Profile updated",
                "priority" => 0,
                "visibility" => 1,
                "icon" => 'fa fa-user',
                "color" => 'navy'
            ],
            [
                "operation" => 'module_installed',
                "description" => "New module installed",
                "priority" => 0,
                "visibility" => 1,
                "icon" => 'fa fa-plus',
                "color" => 'red'
            ],
            [
                "operation" => 'module_activated',
                "description" => "Module activated",
                "priority" => 0,
                "visibility" => 1,
                "icon" => 'fa fa-plug',
                "color" => 'blue'
            ],
            [
                "operation" => 'module_deactivated',
                "description" => "Module deactivated",
                "priority" => 0,
                "visibility" => 1,
                "icon" => 'fa fa-minus',
                "color" => 'yellow'
            ],
            [
                "operation" => 'module_uninstalled',
                "description" => "Module uninstalled",
                "priority" => 0,
                "visibility" => 1,
                "icon" => 'fa fa-remove',
                "color" => 'red'
            ],
            [
                "operation" => 'module_config_updated',
                "description" => "Module configuration updated",
                "priority" => 0,
                "visibility" => 1,
                "icon" => 'fa fa-gear',
                "color" => 'silver'
            ],
            [
                "operation" => 'member_profile_updated',
                "description" => "Member profile updated",
                "priority" => 0,
                "visibility" => 1,
                "icon" => 'fa fa-user',
                "color" => 'navy'
            ],
            [
                "operation" => 'member_password_changed',
                "description" => "Member password changed",
                "priority" => 0,
                "visibility" => 1,
                "icon" => 'fa fa-user-secret',
                "color" => 'black'
            ],
            [
                "operation" => 'settings_updated',
                "description" => "System settings updated",
                "priority" => 0,
                "visibility" => 1,
                "icon" => 'fa fa-gear',
                "color" => 'silver'
            ],
            [
                "operation" => 'package_updated',
                "description" => "Package updated",
                "priority" => 0,
                "visibility" => 1,
                "icon" => 'fa fa-gift',
                "color" => 'gray'
            ],
            [
                "operation" => 'theme_installed',
                "description" => "New theme installed",
                "priority" => 0,
                "visibility" => 1,
                "icon" => 'fa fa-plus',
                "color" => 'green'
            ],
            [
                "operation" => 'theme_uninstalled',
                "description" => "Theme uninsatalled",
                "priority" => 0,
                "visibility" => 1,
                "icon" => 'fa fa-remove',
                "color" => 'red'
            ],
            [
                "operation" => 'theme_changed',
                "description" => "Theme updated",
                "priority" => 0,
                "visibility" => 1,
                "icon" => 'fa fa-desktop',
                "color" => 'fuchsia'
            ],
            [
                "operation" => 'menu_updated',
                "description" => "Menu updated",
                "priority" => 0,
                "visibility" => 1,
                "icon" => 'fa fa-list-ul',
                "color" => 'maroon'
            ]
        ]);
    }
}
