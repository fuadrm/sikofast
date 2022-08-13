<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ServicesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('services')->delete();
        
        \DB::table('services')->insert(array (
            0 => 
            array (
                'id' => 1,
                'service_name' => 'Print Press',
                'price_service' => 50000,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'service_name' => 'Full Order',
                'price_service' => 80000,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}