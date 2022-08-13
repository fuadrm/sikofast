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
                'customer' => 'aaaaaaaaa',
                'started_at' => '2022-08-12',
                'finished_at' => '2022-08-16',
                'no_po' => 'FP-PO/12/8/2022/001',
                'qty' => '9',
                'phone' => '111111111',
                'address' => 'Bandung',
                'team' => 'JFC Club',
                'design' => 'FP-PO-12-8-2022-001.jpg',
                'add_detail' => 'nama nama nama nama nama nama nama nama nama nama nama',
                'caption' => 'nama nama nama nama nama nama nama nama nama nama nama',
                'created_at' => '2022-08-12 07:14:33',
                'updated_at' => '2022-08-12 11:18:28',
                'mat_material_name' => 1,
                'serv_service_name' => 2,
                'total' => 1170000,
                'status_order' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'customer' => 'bbbbbbbb',
                'started_at' => '2022-08-13',
                'finished_at' => '2022-08-24',
                'no_po' => 'FP-PO/12/8/2022/002',
                'qty' => '10',
                'phone' => '0000000000',
                'address' => 'bandung',
                'team' => 'Persib',
                'design' => 'FP-PO-12-8-2022-002.jpg',
                'add_detail' => 'alalalalalal',
                'caption' => 'lalalalaalalalal',
                'created_at' => '2022-08-12 09:55:37',
                'updated_at' => '2022-08-12 09:55:37',
                'mat_material_name' => 2,
                'serv_service_name' => 1,
                'total' => 1100000,
                'status_order' => 0,
            ),
        ));
        
        
    }
}