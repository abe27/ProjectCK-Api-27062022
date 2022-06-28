<?php

namespace Database\Seeders;

use App\Models\RequestInformationType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class RequestInformationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = Storage::get('public/mocks/request_type.json');
        $data = json_decode($json);
        RequestInformationType::truncate();
        foreach ($data as $r) {
            $obj = new RequestInformationType();
            $obj->name = $r->name;
            $obj->description = $r->description;
            $obj->is_active = true;
            $obj->save();
            $this->command->info("Insert Request Information Type: " . $r->name . " successfully");
        }
    }
}
