<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MaterialsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('materials')->delete();
        
        \DB::table('materials')->insert(array (
            0 => 
            array (
                'id' => 1,
                'material_name' => 'Milano',
                'price_material' => 50000,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'material_name' => 'Jersey',
                'price_material' => 60000,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}