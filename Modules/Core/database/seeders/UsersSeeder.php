<?php

namespace Modules\Core\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Core\Entities\User;
use Modules\Core\Enums\UserRole;
use Illuminate\Support\Facades\Hash;
class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superAdmin = User::firstOrCreate([
            'email' => 'admin@admin.com',
        ], [
            'name' => 'Admin',

            'password' => Hash::make('123456789'),

            'phone_number' => '+970595222666',
        ]);

        $superAdmin->markEmailAsVerified();

        $superAdmin->syncRoles(UserRole::SuperAdmin->value);

        // $superAdmin->generateAvatar();

    }
}
