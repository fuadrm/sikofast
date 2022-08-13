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
                'szl_s' => 1,
                'szl_m' => 1,
                'szl_l' => 1,
                'szl_xl' => 1,
                'szl_2xl' => 1,
                'szl_3xl' => NULL,
                'szl_4xl' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
                'order_id' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'szl_s' => 1,
                'szl_m' => NULL,
                'szl_l' => 1,
                'szl_xl' => 1,
                'szl_2xl' => 1,
                'szl_3xl' => 1,
                'szl_4xl' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
                'order_id' => 2,
            ),
        ));
        
        
    }
}