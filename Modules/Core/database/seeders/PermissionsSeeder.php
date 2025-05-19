<?php

namespace Modules\Core\Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $permissionsNames = [
            [
                'module' => 'Dashboard',
                'group' => 'Dashboard',
                'label' => 'Access Dashboard',
                'name' => 'dashboard.access',
            ],

            // Roles
            [
                'module' => 'Dashboard',
                'group' => 'Roles',
                'label' => 'Create',
                'name' => 'dashboard.user_management.roles.create',
            ],
            [
                'module' => 'Dashboard',
                'group' => 'Roles',
                'label' => 'Edit',
                'name' => 'dashboard.user_management.roles.edit',
            ],
            [
                'module' => 'Dashboard',
                'group' => 'Roles',
                'label' => 'Delete',
                'name' => 'dashboard.user_management.roles.delete',
            ],
            [
                'module' => 'Dashboard',
                'group' => 'Roles',
                'label' => 'Bulk Delete',
                'name' => 'dashboard.user_management.roles.delete.bulk',
            ],
            [
                'module' => 'Dashboard',
                'group' => 'Roles',
                'label' => 'View All',
                'name' => 'dashboard.user_management.roles',
            ],
            [
                'module' => 'Dashboard',
                'group' => 'Roles',
                'label' => 'View',
                'name' => 'dashboard.user_management.roles.view',
            ],

            // Users
            [
                'module' => 'Dashboard',
                'group' => 'Users',
                'label' => 'Create',
                'name' => 'dashboard.user_management.users.create',
            ],
            [
                'module' => 'Dashboard',
                'group' => 'Users',
                'label' => 'Edit',
                'name' => 'dashboard.user_management.users.edit',
            ],
            [
                'module' => 'Dashboard',
                'group' => 'Users',
                'label' => 'Delete',
                'name' => 'dashboard.user_management.users.delete',
            ],
            [
                'module' => 'Dashboard',
                'group' => 'Users',
                'label' => 'Bulk Delete',
                'name' => 'dashboard.user_management.users.delete.bulk',
            ],
            [
                'module' => 'Dashboard',
                'group' => 'Users',
                'label' => 'Restore',
                'name' => 'dashboard.user_management.users.restore',
            ],
            [
                'module' => 'Dashboard',
                'group' => 'Users',
                'label' => 'Trashed Filter',
                'name' => 'dashboard.user_management.users.filters.trashed',
            ],
            [
                'module' => 'Dashboard',
                'group' => 'Users',
                'label' => 'View All',
                'name' => 'dashboard.user_management.users',
            ],
            [
                'module' => 'Dashboard',
                'group' => 'Users',
                'label' => 'View',
                'name' => 'dashboard.user_management.users.view',
            ],
            [
                'module' => 'Dashboard',
                'group' => 'Users',
                'label' => 'Change Password',
                'name' => 'dashboard.user_management.users.change_password',
            ],
            [
                'module' => 'Dashboard',
                'group' => 'Users',
                'label' => 'Sessions',
                'name' => 'dashboard.user_management.users.sessions',
            ],
            [
                'module' => 'Dashboard',
                'group' => 'Users',
                'label' => 'Histories',
                'name' => 'dashboard.user_management.users.history',
            ],
            [
                'module' => 'Dashboard',
                'group' => 'Users',
                'label' => 'Messages',
                'name' => 'dashboard.user_management.users.messages',
            ],
            [
                'module' => 'Dashboard',
                'group' => 'Users',
                'label' => 'Mobiles',
                'name' => 'dashboard.user_management.users.mobiles',
            ],
            [
                'module' => 'Dashboard',
                'group' => 'Users',
                'label' => 'Login As Another User',
                'name' => 'dashboard.user_management.users.impersonate',
            ],

            // Profile
            // [
            //     'module' => 'Dashboard',
            //     'group' => 'Profile',
            //     'label' => 'View',
            //     'name' => 'dashboard.account.profile',
            // ],
            // [
            //     'module' => 'Dashboard',
            //     'group' => 'Profile',
            //     'label' => 'Edit',
            //     'name' => 'dashboard.account.profile.edit',
            // ],
            // [
            //     'module' => 'Dashboard',
            //     'group' => 'Profile',
            //     'label' => 'Change Password',
            //     'name' => 'dashboard.account.change_password',
            // ],
            // [
            //     'module' => 'Dashboard',
            //     'group' => 'Profile',
            //     'label' => 'Sessions',
            //     'name' => 'dashboard.account.sessions',
            // ],
            // [
            //     'module' => 'Dashboard',
            //     'group' => 'Profile',
            //     'label' => 'Mobiles',
            //     'name' => 'dashboard.account.mobiles',
            // ],
            // [
            //     'module' => 'Dashboard',
            //     'group' => 'Profile',
            //     'label' => 'Logout From All Other Devices',
            //     'name' => 'dashboard.account.sessions.logout_from_all_other_devices',
            // ],
            // [
            //     'module' => 'Dashboard',
            //     'group' => 'Profile',
            //     'label' => 'Histories',
            //     'name' => 'dashboard.account.history',
            // ],
            // [
            //     'module' => 'Dashboard',
            //     'group' => 'Profile',
            //     'label' => 'Notifications',
            //     'name' => 'dashboard.account.notifications',
            // ],
            // [
            //     'module' => 'Dashboard',
            //     'group' => 'Profile',
            //     'label' => 'View Notification',
            //     'name' => 'dashboard.account.notifications.view',
            // ],

            // // Activity Logs
            // [
            //     'module' => 'Dashboard',
            //     'group' => 'Activity Logs',
            //     'label' => 'View All',
            //     'name' => 'dashboard.user_management.activity_logs',
            // ],
            // [
            //     'module' => 'Dashboard',
            //     'group' => 'Activity Logs',
            //     'label' => 'View',
            //     'name' => 'dashboard.user_management.activity_logs.view',
            // ],
            // [
            //     'module' => 'Dashboard',
            //     'group' => 'Activity Logs',
            //     'label' => 'Record History',
            //     'name' => 'dashboard.user_management.activity_logs.record.activities',
            // ],

            // // Settings
            // [
            //     'module' => 'Settings',
            //     'group' => 'General',
            //     'label' => 'General Settings',
            //     'name' => 'dashboard.settings.general',
            // ],
            // [
            //     'module' => 'Settings',
            //     'group' => 'SMTP',
            //     'label' => 'SMTP Settings',
            //     'name' => 'dashboard.settings.smtp',
            // ],
            // [
            //     'module' => 'Settings',
            //     'group' => 'Google ReCaptcha',
            //     'label' => 'Google ReCaptcha Settings',
            //     'name' => 'dashboard.settings.google_recaptcha',
            // ],

        ];

        collect($permissionsNames)->each(function ($permission) {
            $permissionModel = Permission::query();
            $permissionModel = $permissionModel->where('name', $permission['name']);

            if (isset($permission['new_name']) && $permission['new_name']) {
                $permissionModel->orWhere('name', $permission['new_name']);
                $permission['name'] = $permission['new_name'];
                unset($permission['new_name']);
            }

            $permissionModel = $permissionModel->first();

            if ($permissionModel) {
                $permissionModel->update($permission);
            } else {
                Permission::create($permission);
            }
        });

        // collect($permissionsNames)->each(function ($permission) {
        //     Permission::firstOrCreate([
        //         'module' => 'Core',
        //     ] + $permission);
        // });
    }
}
