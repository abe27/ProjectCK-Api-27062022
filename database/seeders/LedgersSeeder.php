<?php

namespace Database\Seeders;

use App\Models\Colors;
use App\Models\Factory;
use App\Models\Kinds;
use App\Models\Ledgers;
use App\Models\Part;
use App\Models\PartType;
use App\Models\PartVendor;
use App\Models\Sizes;
use App\Models\Stock;
use App\Models\TapGroup;
use App\Models\UnitType;
use App\Models\Whs;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class LedgersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = Storage::get('public/mocks/ledger.json');
        $data = json_decode($json);
        ### truncate data
        Ledgers::truncate();
        Stock::truncate();

        ### start loop
        $arr = ["EXPORT", "DOMESTIC"];
        foreach ($arr as $k) {
            $w = Whs::where('name', $k)->first();
            $row = 0;
            foreach ($data as $r) {
                $this->command->info($row . " Insert Ledger: " . $r->PART_ID . " Whs: " . $k . " successfully");
                $t = TapGroup::where('name', $r->TAP_GROUP_ID)->first();
                $f = Factory::where('name', $r->FACTORY_ID)->first();
                $tt = PartType::where('name', $r->PART_TYPE_ID)->first();
                $p = Part::where('part_no', $r->PART_ID)->first();
                $kind = Kinds::where('name', $r->KIND_ID)->first();
                $size = Sizes::where('name', $r->SIZE_ID)->first();
                $color = Colors::where('name', $r->COLOR_ID)->first();
                $unit = UnitType::where('name', $r->UNIT_ID)->first();
                $part_vendor = PartVendor::where('name', '-')->first();

                $obj = new Ledgers();
                $obj->tap_group_id = $t->id;
                $obj->whs_id = $w->id;
                $obj->factory_id = $f->id;
                $obj->part_type_id = $tt->id;
                $obj->part_id = $p->id;
                $obj->kind_id = $kind->id;
                $obj->size_id = $size->id;
                $obj->color_id = $color->id;
                $obj->unit_id = $unit->id;
                $obj->part_vendor_id = $part_vendor->id;
                $obj->width = $r->WIDTH;
                $obj->length = $r->P_LENGTH;
                $obj->height = $r->HEIGHT;
                $obj->gross_weight = $r->GROSS_WEIGHT;
                $obj->net_weight = $r->NET_WEIGHT;
                $obj->is_active = true;
                $obj->save();

                ### stock
                $stock = new Stock();
                $stock->ledger_id = $obj->id;
                $stock->qty = 0;
                $stock->ctn = 0;
                $stock->is_active = true;
                $stock->save();
                $row++;
            }
        }
    }
}
