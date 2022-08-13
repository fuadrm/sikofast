<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MigrationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('migrations')->delete();
        
        \DB::table('migrations')->insert(array (
            0 => 
            array (
                'id' => 1,
                'migration' => '2019_12_14_000001_create_personal_access_tokens_table',
                'batch' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'migration' => '2022_06_28_155715_create_detail_orders_szs_table',
                'batch' => 1,
            ),
            2 => 
            array (
                'id' => 3,
                'migration' => '2022_06_28_160108_create_invoices_table',
                'batch' => 1,
            ),
            3 => 
            array (
                'id' => 4,
                'migration' => '2022_06_28_160240_create_orders_table',
                'batch' => 1,
            ),
            4 => 
            array (
                'id' => 5,
                'migration' => '2022_06_28_160848_create_users_table',
                'batch' => 1,
            ),
            5 => 
            array (
                'id' => 6,
                'migration' => '2022_06_30_101325_create_materials_table',
                'batch' => 1,
            ),
            6 => 
            array (
                'id' => 7,
                'migration' => '2022_06_30_101800_create_services_table',
                'batch' => 1,
            ),
            7 => 
            array (
                'id' => 8,
                'migration' => '2022_06_30_232342_create_foreign_id_material_name',
                'batch' => 1,
            ),
            8 => 
            array (
                'id' => 9,
                'migration' => '2022_06_30_233235_create_foreign_id_service_name',
                'batch' => 1,
            ),
            9 => 
            array (
                'id' => 10,
                'migration' => '2022_07_01_140653_create_add_detail',
                'batch' => 1,
            ),
            10 => 
            array (
                'id' => 11,
                'migration' => '2022_07_05_174405_create_foreignkey_invoices',
                'batch' => 1,
            ),
            11 => 
            array (
                'id' => 12,
                'migration' => '2022_07_07_211735_create_attribute_invoices',
                'batch' => 1,
            ),
            12 => 
            array (
                'id' => 13,
                'migration' => '2022_07_08_184537_create_detail_orders_szl_table',
                'batch' => 1,
            ),
            13 => 
            array (
                'id' => 14,
                'migration' => '2022_07_09_125103_create_foreign_key_detail_orders_szs',
                'batch' => 1,
            ),
            14 => 
            array (
                'id' => 15,
                'migration' => '2022_07_09_125401_create_foreign_key_detail_orders_szl',
                'batch' => 1,
            ),
            15 => 
            array (
                'id' => 16,
                'migration' => '2022_07_17_172525_create_bahanbaku_table',
                'batch' => 1,
            ),
            16 => 
            array (
                'id' => 17,
                'migration' => '2022_07_20_110350_create_attribute_orders',
                'batch' => 1,
            ),
            17 => 
            array (
                'id' => 18,
                'migration' => '2022_07_20_124434_create_attribute_invoices',
                'batch' => 1,
            ),
            18 => 
            array (
                'id' => 19,
                'migration' => '2022_07_21_063202_create_foreign_bahanbaku',
                'batch' => 1,
            ),
            19 => 
            array (
                'id' => 20,
                'migration' => '2022_07_21_125727_create_attributes_bahanbaku',
                'batch' => 1,
            ),
            20 => 
            array (
                'id' => 21,
                'migration' => '2022_07_21_133848_create_foreign_bahanbaku',
                'batch' => 1,
            ),
            21 => 
            array (
                'id' => 22,
                'migration' => '2022_08_06_161617_create_foreignkey_bahanbaku',
                'batch' => 1,
            ),
            22 => 
            array (
                'id' => 23,
                'migration' => '2022_08_06_191601_create_attribute_orders_status',
                'batch' => 1,
            ),
            23 => 
            array (
                'id' => 24,
                'migration' => '2022_08_07_151238_remove_attribute_orders',
                'batch' => 1,
            ),
            24 => 
            array (
                'id' => 25,
                'migration' => '2022_08_12_072806_create_attribute_invoices',
                'batch' => 2,
            ),
            25 => 
            array (
                'id' => 26,
                'migration' => '2022_08_12_080035_remove_attribute_invoices',
                'batch' => 3,
            ),
            26 => 
            array (
                'id' => 27,
                'migration' => '2022_08_12_080256_create_attribute_invoices',
                'batch' => 4,
            ),
            27 => 
            array (
                'id' => 28,
                'migration' => '2022_08_12_110225_remove_column_bahanbaku',
                'batch' => 5,
            ),
        ));
        
        
    }
}