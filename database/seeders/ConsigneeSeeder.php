<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Affiliate;
use App\Models\Consignee;
use App\Models\Customer;
use App\Models\Factory;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ConsigneeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = Storage::get('public/mocks/consignee.json');
        $data = json_decode($json);
        ### truncate data
        Consignee::truncate();

        foreach ($data as $r) {
            $user = User::where('empcode', $r->profile_id)->first();
            $profile = Profile::where('user_id', $user->id)->first();
            $factory = Factory::where('name', $r->factory_id)->first();
            $affiliate = Affiliate::where('name', $r->affiliates_id)->first();
            $customer = Customer::where('name', $r->customer_id)->first();
            $address = Address::where('contact_name', $r->address_id)->first();
            if ($address == null) {
                $address = Address::where('contact_name', '-')->first();
            }
            $c = new Consignee();
            $c->profile_id = $profile->id;
            $c->factory_id = $factory->id;
            $c->affiliates_id = $affiliate->id;
            $c->customer_id = $customer->id;
            $c->customer_address_id = $address->id;
            $c->prefix = $r->prefix;
            $c->last_running_no = 0;
            $c->is_active = true;
            $c->save();
            $this->command->warn("Insert Consignee: " . $c->id . " successfully.");
        }
    }
}
