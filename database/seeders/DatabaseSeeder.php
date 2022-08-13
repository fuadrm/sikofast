<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call(UsersTableSeeder::class);
        $this->call(BahanbakuTableSeeder::class);
        $this->call(DetailOrdersSzlTableSeeder::class);
        $this->call(DetailOrdersSzsTableSeeder::class);
        $this->call(InvoicesTableSeeder::class);
        $this->call(MaterialsTableSeeder::class);
        $this->call(OrdersTableSeeder::class);
        $this->call(ServicesTableSeeder::class);
    }
}