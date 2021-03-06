<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        // factory(App\User::class, 100)->create();

        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
                
    }
}
