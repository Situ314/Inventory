<?php

use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
		DB::table('users')->insert([
            [
                'name'          => 'Admin',
                'email'         => 'admin@mail.com',
                'password'      => bcrypt('admin'),
                'created_at'    => date("Y-m-d H:i:s"),
				'role'          => 'admin'
            ],
            [
                'name'          => 'Staff',
                'email'         => 'staff@mail.com',
                'password'      => bcrypt('staff'),
                'created_at'    => date("Y-m-d H:i:s"),
				'role'          => 'staff'
            ],

            [
                'name'          => 'Customer 1',
                'email'         => 'customer@mail.com',
                'password'      => bcrypt('customer'),
                'created_at'    => date("Y-m-d H:i:s"),
                'role'          => 'customer'
            ],

            [
                'name'          => 'Customer2',
                'email'         => 'customer2@mail.com',
                'password'      => bcrypt('customer'),
                'created_at'    => date("Y-m-d H:i:s"),
                'role'          => 'customer'
            ],
        ]);

        DB::table('categories')->insert([
            [
                'name'          => 'Mobile Phone',
            ],
            [
                'name'          => 'Game Consoles',
            ],
            [
                'name'          => 'PC and Laptops',
            ],
            [
                'name'          => 'TV\'s',
            ],
            [
                'name'          => 'Clothing',
            ],

        ]);

        DB::table('customers')->insert([
            [
                'name'          => 'Pablo Perez',
                'address'       => 'Pinilla Avenue #22',
                'phone'         => '+1 785898989',
                'user_id'       => '3',
            ],
            [
                'name'          => 'Alejandro Fanitno',
                'address'       => 'Arce Street #3223',
                'phone'         => '+591 70667848',
                'user_id'       => '4',
            ],
        ]);
    }
}
