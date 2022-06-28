<?php

namespace Database\Seeders;

use App\Models\Country;
use App\Models\Province;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ProvinceSeeder extends Seeder
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
        Province::truncate();

        foreach ($data as $r) {
            $data = Country::where('name', '-')->first();
            $obj = new Province();
            $obj->countries_id = $data->id;
            $obj->name = $r->name;
            $obj->description = $r->description;
            $obj->is_active = true;
            $obj->save();
            $this->command->info("Insert Province: " . $r->name . " successfully");
        }
    }
}
