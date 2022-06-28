<?php

namespace Database\Seeders;

use App\Models\District;
use App\Models\Province;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = Storage::get('public/mocks/master.json');
        $data = json_decode($json);
        District::truncate();

        foreach ($data as $r) {
            $data = Province::where('name', '-')->first();
            $obj = new District();
            $obj->province_id = $data->id;
            $obj->name = $r->name;
            $obj->description = $r->description;
            $obj->is_active = true;
            $obj->save();
            $this->command->info("Insert District: " . $r->name . " successfully");
        }
    }
}
