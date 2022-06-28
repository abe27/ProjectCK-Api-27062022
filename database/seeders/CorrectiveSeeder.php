<?php

namespace Database\Seeders;

use App\Models\Corrective;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class CorrectiveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = Storage::get('public/mocks/corrective.json');
        $data = json_decode($json);
        Corrective::truncate();
        foreach ($data as $r) {
            $obj = new Corrective();
            $obj->name = $r->name;
            $obj->description = $r->description;
            $obj->is_active = true;
            $obj->save();
            $this->command->warn("Insert Corrective Type: " . $r->name . " successfully");
        }
    }
}
