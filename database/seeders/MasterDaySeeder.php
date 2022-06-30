<?php

namespace Database\Seeders;

use App\Models\MasterDay;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class MasterDaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = Storage::get('public/mocks/day.json');
        $data = json_decode($json);
        MasterDay::truncate();

        foreach ($data as $r) {
            $obj = new MasterDay();
            $obj->name = $r->name;
            $obj->description = $r->description;
            $obj->is_active = true;
            $obj->save();
            $this->command->info("Insert Master Day: " . $r->name . " successfully");
        }
    }
}
