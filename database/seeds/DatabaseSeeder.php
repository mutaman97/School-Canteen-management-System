<?php

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
         $this->call(EmployeeSeeder::class);
        $this->call(StudentSeeder::class);
//        factory(\App\User::class, 10)->create();

    }
}
