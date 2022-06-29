<?php

namespace Database\Seeders;

use App\Models\ConditionGroup;
use App\Models\OrderZoneType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ConditionGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = Storage::get('public/mocks/condition_group.json');
        $data = json_decode($json);
        ### truncate data
        ConditionGroup::truncate();

        foreach ($data as $r) {
            $order_zone = OrderZoneType::where('zone_name', $r->order_zone_type_id)->first();
            $c = new ConditionGroup();
            $c->order_zone_type_id = $order_zone->id;
            $c->name = $r->name;
            $c->substr_digits = $r->substr_digits;
            $c->description = $r->description;
            $c->is_active = true;
            $c->save();
            $this->command->info($c->id);
        }
    }
}
