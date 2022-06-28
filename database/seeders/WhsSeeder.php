<?php

namespace Database\Seeders;

use App\Models\Whs;
use App\Models\WhsType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class WhsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = Storage::get('public/mocks/whs.json');
        $data = json_decode($json);
        Whs::truncate();

        foreach ($data as $r) {
            $t = WhsType::where('name', $r->type)->first();
            $obj = new Whs();
            $obj->whs_type_id = $t->id;
            $obj->name = $r->name;
            $obj->description = $r->description;
            $obj->is_active = true;
            $obj->save();
            $this->command->info("Insert Whs: " . $r->name . " successfully");
        }
    }
}
