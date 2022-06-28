<?php

namespace Database\Seeders;

use App\Models\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class FactorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = Storage::get('public/mocks/factory.json');
        $data = json_decode($json);
        Factory::truncate();
        foreach ($data as $r) {
            $obj = new Factory();
            $obj->name = $r->name;
            $obj->prefix = $r->prefix;
            $obj->description = $r->description;
            $obj->is_active = true;
            $obj->save();
            $this->command->warn("Insert Factory: " . $r->name . " successfully");
        }
    }
}
