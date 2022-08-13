<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'username' => 'adminpro',
                'password' => '$2y$10$0foAD8KMD6jQXsULOwFcgOn3onrJVm18YdvABR.jJWOy4azDM/mdu',
                'role' => 2,
                'created_at' => '2022-07-18 21:49:45',
                'updated_at' => '2022-07-18 21:49:45',
            ),
            1 => 
            array (
                'id' => 2,
                'username' => 'adminkeu',
                'password' => '$2y$10$GKBaAKa9LUl73N1FRC25bO1XCWZNxrwhSXHnBFShoJZAnSCcMYLky',
                'role' => 3,
                'created_at' => '2022-07-18 21:51:39',
                'updated_at' => '2022-07-18 21:51:39',
            ),
            2 => 
            array (
                'id' => 3,
                'username' => 'ownerfp',
                'password' => '$2y$10$sV14qT.Ir8O1YXgiHJiESeA9ddRR1dHTjHkUAqSmV/9nbeG6Di20.',
                'role' => 1,
                'created_at' => '2022-07-18 21:52:11',
                'updated_at' => '2022-07-18 21:52:11',
            ),
        ));
        
        
    }
}