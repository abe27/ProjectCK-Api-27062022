<?php

namespace Database\Seeders;

use App\Models\TapGroup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class TapGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = Storage::get('public/mocks/tap_group.json');
        $data = json_decode($json);
        TapGroup::truncate();

        foreach ($data as $r) {
            $obj = new TapGroup();
            $obj->name = $r->name;
            $obj->description = $r->description;
            $obj->is_active = true;
            $obj->save();
            $this->command->info("Insert TAP Group: " . $r->name . " successfully");
        }
    }
}
