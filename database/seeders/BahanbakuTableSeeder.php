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
                'bb_name1' => 'Milano',
                'tgl_belanja' => '2022-08-12',
                'nota' => '.jpg',
                'jmlh1' => 2,
                'total_price' => 400000,
                'created_at' => NULL,
                'updated_at' => NULL,
                'order_no_po' => 1,
                'status_bb' => NULL,
                'invoice_no_inv' => 1,
            ),
        ));
        
        
    }
}