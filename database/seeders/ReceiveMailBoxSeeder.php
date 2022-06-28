<?php

namespace Database\Seeders;

use App\Models\ReceiveMailBox;
use App\Models\Whs;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReceiveMailBoxSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ReceiveMailBox::truncate();
        ///
        $whs = Whs::where('name', "EXPORT")->first();
        $r = new ReceiveMailBox();
        $r->whs_id = $whs->id;
        $r->mail_box_id = "Y32V802";
        $r->mail_box_pwd = "P@SSW5RD";
        $r->is_active = true;
        $r->save();

        $whs = Whs::where('name', "DOMESTIC")->first();
        $r = new ReceiveMailBox();
        $r->whs_id = $whs->id;
        $r->mail_box_id = "Y32V802";
        $r->mail_box_pwd = "P@SSW5RD";
        $r->is_active = true;
        $r->save();
    }
}
