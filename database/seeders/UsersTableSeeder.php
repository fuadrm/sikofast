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
        ));
        
        
    }
}