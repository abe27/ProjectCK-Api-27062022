<?php

namespace Database\Seeders;

use App\Models\Factory;
use App\Models\PalletPlacingType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class PalletPlacingTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = Storage::get('public/mocks/pallet_placing.json');
        $data = json_decode($json);
        PalletPlacingType::truncate();

        foreach ($data as $r) {
            $f = Factory::where('name', $r->factory)->first();
            $obj = new PalletPlacingType();
            $obj->factory_id = $f->id;
            $obj->name = $r->name;
            $obj->description = "สำหรับ Part ขนาด(" . $r->box_width . "mm X " . $r->box_length . "mm X ". $r->box_height . "mm)";
            $obj->width = $r->pallet_width;
            $obj->length = $r->pallet_length;
            $obj->height = $r->pallet_height;
            $obj->per_pallet = $r->box_per_pallet;
            $obj->carton_size_width = $r->box_width;
            $obj->carton_size_length = $r->box_length;
            $obj->carton_size_height = $r->box_height;
            $obj->is_active = true;
            $obj->save();
            $this->command->info("Insert Pallet Placing Type: " . $r->name . " successfully");
        }
    }
}
