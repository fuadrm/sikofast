<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DetailOrdersSzsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('detail_orders_szs')->delete();
        
        \DB::table('detail_orders_szs')->insert(array (
            0 => 
            array (
                'id' => 1,
                'szs_s' => NULL,
                'szs_m' => 5,
                'szs_l' => NULL,
                'szs_xl' => NULL,
                'szs_2xl' => NULL,
                'szs_3xl' => NULL,
                'szs_4xl' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
                'order_id' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'szs_s' => 5,
                'szs_m' => 5,
                'szs_l' => 5,
                'szs_xl' => NULL,
                'szs_2xl' => NULL,
                'szs_3xl' => NULL,
                'szs_4xl' => NULL,
                'created_at' => NULL,
                'updated_at' => '2022-07-19 15:15:04',
                'order_id' => 2,
            ),
            2 => 
            array (
                'id' => 3,
                'szs_s' => 10,
                'szs_m' => NULL,
                'szs_l' => NULL,
                'szs_xl' => NULL,
                'szs_2xl' => NULL,
                'szs_3xl' => NULL,
                'szs_4xl' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
                'order_id' => 3,
            ),
        ));
        
        
    }
}