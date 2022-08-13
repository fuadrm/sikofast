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
                'szs_s' => 1,
                'szs_m' => 1,
                'szs_l' => 1,
                'szs_xl' => NULL,
                'szs_2xl' => 1,
                'szs_3xl' => 0,
                'szs_4xl' => NULL,
                'created_at' => NULL,
                'updated_at' => '2022-08-12 07:17:43',
                'order_id' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'szs_s' => 1,
                'szs_m' => 1,
                'szs_l' => 1,
                'szs_xl' => 1,
                'szs_2xl' => NULL,
                'szs_3xl' => NULL,
                'szs_4xl' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                'order_id' => 2,
            ),
        ));
        
        
    }
}