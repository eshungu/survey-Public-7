<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //truncate the table
        User::truncate();
        
        DB::table('role_user')->truncate();

        $adminRole = Role::where('name', 'admin')->first();
        // $authorRole = Role::where('name', 'author')->first();
        $hrRole = Role::where('name', 'hr')->first();
        $userRole = Role::where('name', 'user')->first();

        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin')
        ]);

        // $author = User::create([
        //     'name' => 'Author',
        //     'email' => 'author@author.com',
        //     'password' => bcrypt('author')
        // ]);

        $hr = User::create([
            'name' => 'H.R.',
            'email' => 'hr@hr.com',
            'password' => bcrypt('hr@2020@2020')
        ]);

        $user = User::create([
            'name' => 'User',
            'email' => 'user@user.com',
            'password' => bcrypt('user')
        ]);

        $admin->roles()->attach($adminRole);
        $hr->roles()->attach($hrRole);
        $user->roles()->attach($userRole);

        factory(App\User::class, 50)->create();
    }
}
