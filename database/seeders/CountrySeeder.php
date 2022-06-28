<?php

namespace Database\Seeders;

use App\Models\Country;
use App\Models\Region;
use Dotenv\Util\Regex;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class CountrySeeder extends Seeder
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
        Country::truncate();

        foreach ($data as $r) {
            $data = Region::where('name', '-')->first();
            $obj = new Country();
            $obj->region_id = $data->id;
            $obj->name = $r->name;
            $obj->description = $r->description;
            $obj->is_active = true;
            $obj->save();
            $this->command->info("Insert Country: " . $r->name . " successfully");
        }
    }
}
