<?php

namespace Database\Seeders;

use App\Models\Address;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = Storage::get('public/mocks/address.json');
        $data = json_decode($json);
        ### truncate data
        Address::truncate();

        foreach ($data as $r) {
            $c = new Address();
            $c->contact_name = '-';
            $c->company_name = $r->address;
            $c->address_1 = $r->description;
            $c->address_2 = '-';
            $c->zip_code = '-';
            $c->is_active = true;
            $c->save();

            $this->command->info($r->address);
        }
    }
}
