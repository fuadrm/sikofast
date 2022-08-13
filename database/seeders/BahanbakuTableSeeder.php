<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BahanbakuTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('bahanbaku')->delete();
        
        \DB::table('bahanbaku')->insert(array (
            0 => 
            array (
                'id' => 1,
                'bahanbaku_name' => 'Kertas',
                'jmlh' => 1,
                'satuan' => 'rim',
                'price' => 50000,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'bahanbaku_name' => 'tinta',
                'jmlh' => 2,
                'satuan' => 'botol',
                'price' => 50000,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'bahanbaku_name' => 'kain',
                'jmlh' => 1,
                'satuan' => 'roll',
                'price' => 100000,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'bahanbaku_name' => 'tinta hitam',
                'jmlh' => 1,
                'satuan' => 'botol',
                'price' => 20000,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'bahanbaku_name' => 'tinta merah',
                'jmlh' => 2,
                'satuan' => 'botol',
                'price' => 50000,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'bahanbaku_name' => 'Kertas buram',
                'jmlh' => 2,
                'satuan' => 'rim',
                'price' => 30000,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'bahanbaku_name' => 'Kertas buram',
                'jmlh' => 2,
                'satuan' => 'rim',
                'price' => 30000,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}