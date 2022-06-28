<?php

namespace Database\Seeders;

use App\Models\UserPermission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class UserPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = Storage::get('public/mocks/permission.json');
        $data = json_decode($json);
        UserPermission::truncate();
        foreach ($data as $r) {
            $obj = new UserPermission();
            $obj->name = $r->name;
            $obj->description = $r->description;
            $obj->is_administrator = $r->is_admin;
            $obj->is_active = true;
            $obj->save();
            $this->command->warn("Insert Position: " . $r->name . " successfully");
        }
    }
}
