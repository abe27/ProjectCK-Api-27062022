<?php

namespace Database\Seeders;

use App\Models\Factory;
use App\Models\InvoiceLoading;
use App\Models\ShippingType;
use App\Models\Whs;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class InvoiceLoadingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = Storage::get('public/mocks/loading_area.json');
        $data = json_decode($json);
        ### truncate data
        InvoiceLoading::truncate();

        ### start loop
        foreach ($data as $r) {
            $w = Whs::where('name', $r->zone)->first();
            $s = ShippingType::where('name', $r->shipping)->first();
            $f = Factory::where('name', $r->factory)->first();

            $inv = new InvoiceLoading();
            $inv->whs_id = $w->id;
            $inv->factory_id = $f->id;
            $inv->shipping_id = $s->id;
            $inv->name = $r->loading_area;
            $inv->is_active = true;
            $inv->save();

            $this->command->info("Insert Invoice Loading: " . $inv->name . " successfully.");
        }
    }
}
