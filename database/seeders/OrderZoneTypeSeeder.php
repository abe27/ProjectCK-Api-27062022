<?php

namespace Database\Seeders;

use App\Models\Factory;
use App\Models\OrderZoneType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class OrderZoneTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = Storage::get('public/mocks/order_zone_type.json');
        $data = json_decode($json);
        OrderZoneType::truncate();

        foreach ($data as $r) {
            $factory = Factory::where('name', $r->factory)->first();
            $obj = new OrderZoneType();
            $obj->factory_id = $factory->id;
            $obj->zone_id = $r->bioat;
            $obj->zone_name = $r->zone;
            $obj->is_active = true;
            $obj->save();
            $this->command->info("Insert Order Zone: " . $r->zone . " successfully");
        }
    }
}
