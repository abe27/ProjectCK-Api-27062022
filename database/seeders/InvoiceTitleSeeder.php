<?php

namespace Database\Seeders;

use App\Models\InvoiceTitle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InvoiceTitleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        InvoiceTitle::truncate();
        $t = new InvoiceTitle();
        $t->name = "000";
        $t->description = "-";
        $t->is_active = true;
        $t->save();
    }
}
