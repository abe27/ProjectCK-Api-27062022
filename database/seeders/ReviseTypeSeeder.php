<?php

namespace Database\Seeders;

use App\Models\ReviseType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ReviseTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = Storage::get('public/mocks/revise.json');
        $data = json_decode($json);
        ReviseType::truncate();

        foreach ($data as $r) {
            $obj = new ReviseType();
            $obj->revise_code = $r->name;
            $obj->description = $r->description;
            $obj->is_revise = $r->revise;
            $obj->is_active = true;
            $obj->save();
            $this->command->info("Insert Order Revise: " . $r->name . " successfully");
        }
    }
}
