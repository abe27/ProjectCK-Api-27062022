<?php

namespace Database\Seeders;

use App\Models\ShippingType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ShippingTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = Storage::get('public/mocks/shipping.json');
        $data = json_decode($json);
        ShippingType::truncate();

        foreach ($data as $r) {
            $obj = new ShippingType();
            $obj->name = $r->prefix_code;
            $obj->description = $r->name;
            $obj->is_active = true;
            $obj->save();
            $this->command->info("Insert ShippingType: " . $r->name . " successfully");
        }
    }
}
