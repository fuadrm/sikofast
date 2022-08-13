<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DetailOrdersSzlTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('detail_orders_szl')->delete();
        
        \DB::table('detail_orders_szl')->insert(array (
            0 => 
            array (
                'id' => 1,
                'szl_s' => 10,
                'szl_m' => 10,
                'szl_l' => 10,
                'szl_xl' => NULL,
                'szl_2xl' => NULL,
                'szl_3xl' => NULL,
                'szl_4xl' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
                'order_id' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'szl_s' => 5,
                'szl_m' => 5,
                'szl_l' => NULL,
                'szl_xl' => NULL,
                'szl_2xl' => NULL,
                'szl_3xl' => NULL,
                'szl_4xl' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
                'order_id' => 2,
            ),
            2 => 
            array (
                'id' => 3,
                'szl_s' => NULL,
                'szl_m' => NULL,
                'szl_l' => 10,
                'szl_xl' => NULL,
                'szl_2xl' => NULL,
                'szl_3xl' => NULL,
                'szl_4xl' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
                'order_id' => 3,
            ),
        ));
        
        
    }
}