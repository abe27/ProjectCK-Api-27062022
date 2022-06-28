<?php

namespace Database\Seeders;

use App\Models\Part;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class PartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = Storage::get('public/mocks/part.json');
        $data = json_decode($json);
        Part::truncate();

        foreach ($data as $r) {
            $obj = new Part();
            $obj->part_no = $r->PARTNO;
            $obj->part_name = $r->PARTNAME;
            $obj->is_active = true;
            $obj->save();
            $this->command->info("Insert Part: " . $r->PARTNO . " successfully");
        }
    }
}
