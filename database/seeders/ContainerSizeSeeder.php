<?php

namespace Database\Seeders;

use App\Models\ContainerSize;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ContainerSizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = Storage::get('public/mocks/container_size.json');
        $data = json_decode($json);
        ContainerSize::truncate();
        foreach ($data as $r) {
            $obj = new ContainerSize();
            $obj->name = $r->name;
            $obj->dim_width = $r->w;
            $obj->dim_length = $r->h;
            $obj->dim_height = $r->l;
            $obj->unit = $r->unit;
            $obj->description = $r->description;
            $obj->is_active = true;
            $obj->save();
            $this->command->warn("Insert Container Size: " . $r->name . " successfully");
        }
    }
}
