<?php

namespace Database\Seeders;

use App\Models\FticketSeq;
use DateTime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FticketSeqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dt = new DateTime('now');
        FticketSeq::truncate();
        $f = new FticketSeq();
        $f->prefix = "V";
        $f->on_year = $dt->format('Y');
        $f->last_running = 0;
        $f->is_active = true;
        $f->save();

        $f = new FticketSeq();
        $f->prefix = "C";
        $f->on_year = $dt->format('Y');
        $f->last_running = 0;
        $f->is_active = true;
        $f->save();
    }
}
