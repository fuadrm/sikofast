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
                'username' => 'ownerfp',
                'password' => '$2y$10$3Jn75/Z9wYPAsU88nUuuseSd83UqE0CaNizLxc/5Uf3V2bnLoXlHi',
                'role' => 1,
                'created_at' => '2022-08-12 06:31:48',
                'updated_at' => '2022-08-12 06:31:48',
            ),
            1 => 
            array (
                'id' => 2,
                'username' => 'adminpro',
                'password' => '$2y$10$KW/2xcibfiTalWDTaoy4LeS9Kkrh1nn/omUZJdN836iv0Ba6RTw.y',
                'role' => 2,
                'created_at' => '2022-08-13 16:10:56',
                'updated_at' => '2022-08-13 16:10:56',
            ),
            2 => 
            array (
                'id' => 3,
                'username' => 'adminkeu',
                'password' => '$2y$10$nJe9U3/y5tOd.RRs5IDHtuL2aI8E7GAmz1NAQYQtrumxfN6EhhEBK',
                'role' => 3,
                'created_at' => '2022-08-13 16:11:14',
                'updated_at' => '2022-08-13 16:11:14',
            ),
            3 => 
            array (
                'id' => 4,
                'username' => 'supervisor',
                'password' => '$2y$10$8zWkZjXb7juO4txzQTiKmeTcZ6JvvsZLjLTBYv3kN33aMYTCZhDOK',
                'role' => 4,
                'created_at' => '2022-08-13 16:11:26',
                'updated_at' => '2022-08-13 16:11:26',
            ),
        ));
        
        
    }
}