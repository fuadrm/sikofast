<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('orders')->delete();
        
        \DB::table('orders')->insert(array (
            0 => 
            array (
                'id' => 1,
                'customer' => 'mama',
                'finished_at' => '2022-07-23 00:00:00',
                'no_po' => 'FP-PO/19/7/2022/001',
                'qty' => '40',
                'phone' => '0000000000',
                'team' => 'JFC Club',
                'design' => 'FP-PO/19/7/2022/001.jpg',
                'add_detail' => NULL,
                'caption' => NULL,
                'created_at' => '2022-07-19 00:00:00',
                'updated_at' => '2022-07-19 14:09:09',
                'material_name' => 1,
                'service_name' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'customer' => 'kakang',
                'finished_at' => '2022-07-22 00:00:00',
                'no_po' => 'FP-PO/19/7/2022/002',
                'qty' => '25',
                'phone' => '08560000245',
                'team' => 'Persib',
                'design' => 'FP-PO/19/7/2022/002.jpg',
                'add_detail' => 'tes',
                'caption' => 'tes',
                'created_at' => '2022-07-19 00:00:00',
                'updated_at' => '2022-07-19 15:15:04',
                'material_name' => 1,
                'service_name' => 1,
            ),
            2 => 
            array (
                'id' => 3,
                'customer' => 'papa',
                'finished_at' => '2022-07-22 00:00:00',
                'no_po' => 'FP-PO/19/7/2022/003',
                'qty' => '20',
                'phone' => '0000000000',
                'team' => 'JFC Club',
                'design' => 'FP-PO-19-7-2022-003.jpg',
                'add_detail' => 'tes',
                'caption' => 'tes',
                'created_at' => '2022-07-19 00:00:00',
                'updated_at' => '2022-07-19 15:31:24',
                'material_name' => 1,
                'service_name' => 1,
            ),
        ));
        
        
    }
}