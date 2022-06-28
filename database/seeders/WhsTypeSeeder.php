<?php

namespace Database\Seeders;

use App\Models\WhsType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class WhsTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = Storage::get('public/mocks/whs_type.json');
        $data = json_decode($json);
        WhsType::truncate();

        foreach ($data as $r) {
            $obj = new WhsType();
            $obj->name = $r->name;
            $obj->description = $r->description;
            $obj->is_active = true;
            $obj->save();
            $this->command->info("Insert Whs Type: " . $r->name . " successfully");
        }
    }
}
