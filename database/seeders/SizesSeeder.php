<?php

namespace Database\Seeders;

use App\Models\Sizes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SizesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sizes::truncate();
        $obj = new Sizes();
        $obj->name = '-';
        $obj->is_active = true;
        $obj->save();
    }
}
