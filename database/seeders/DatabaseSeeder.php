<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(OrderStatusSeeder::class);
        $this->call(OrderSeeder::class);
        $this->call(OrderProducts::class);
        $this->call(userAddressSeeder::class);
        $this->call(UnitSeeder::class);
        $this->call(CountrySeeder::class);
        $this->call(StateSeeder::class);
        $this->call(Permissions::class);
        $this->call(RoleSeeder::class);
        $this->call(DepartmentSeeder::class);
        $this->call(JobPosition::class);
        
    }
}
