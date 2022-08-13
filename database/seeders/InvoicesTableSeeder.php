<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class InvoicesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('invoices')->delete();
        
        \DB::table('invoices')->insert(array (
            0 => 
            array (
                'id' => 1,
                'no_inv' => 'INV-FP/12/8/2022/001',
                'down_payment' => 1000000,
                'created_at' => NULL,
                'updated_at' => '2022-08-12 08:34:29',
                'order_no_po' => 1,
                'price_invoice' => 170000,
                'status_inv' => NULL,
                'started_at_inv' => '2022-08-12',
            ),
            1 => 
            array (
                'id' => 4,
                'no_inv' => 'INV-FP/12/8/2022/002',
                'down_payment' => 1000000,
                'created_at' => NULL,
                'updated_at' => '2022-08-12 10:00:53',
                'order_no_po' => 2,
                'price_invoice' => 100000,
                'status_inv' => 1,
                'started_at_inv' => '2022-08-12',
            ),
        ));
        
        
    }
}