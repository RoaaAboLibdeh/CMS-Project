<?php

namespace Modules\Core\Database\Seeders;

use Illuminate\Database\Seeder;

Class DatabaseSeeder extends Seeder{
     public function run(){
        $this->call(PermissionsSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(RolesSeeder::class);
     }
}