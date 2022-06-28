<?php

namespace Database\Seeders;

use App\Models\PartVendor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PartVendorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PartVendor::truncate();
        $p = new PartVendor();
        $p->name = '-';
        $p->is_active = true;
        $p->save();
    }
}
