<?php

namespace Database\Seeders;

use App\Models\Kinds;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KindsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kinds::truncate();
        $obj = new Kinds();
        $obj->name = '-';
        $obj->is_active = true;
        $obj->save();
    }
}
