<?php

namespace Database\Seeders;

use App\Models\ConsigneeCondition;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ConsigneeConditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = Storage::get('public/mocks/consignee_condition.json');
        $data = json_decode($json);
        ### truncate data
        ConsigneeCondition::truncate();
        $z = ["-", "A", "B", "T"];
        foreach ($z as $i) {
            $this->command->info($i);
            // foreach ($data as $r) {
            //     $obj = new ConsigneeCondition();
            //     $obj->consignee_id = "";
            //     $obj->condition_group_id = "";
            //     $obj->condition_prefix = "";
            //     $obj->is_active = true;
            //     $obj->save();
            //     $this->command->info($obj->id);
            // }
        }
    }
}
