<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = Storage::get('public/mocks/customer.json');
        $data = json_decode($json);
        Customer::truncate();

        foreach ($data as $r) {
            $obj = new Customer();
            $obj->name = $r->cust_code;
            $obj->description = $r->cust_name;
            $obj->is_active = true;
            $obj->save();
            $this->command->info("Insert Customer: " . $r->cust_code . " successfully");
        }
    }
}
