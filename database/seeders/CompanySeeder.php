<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\District;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Company::truncate();
        $district = District::where('name', '-')->first();
        $obj = new Company();
        $obj->district_id = $district->id;
        $obj->company_name ="SEIWA PIONEER LOGISTICS CO.,LTD.";
        $obj->contact_name ="-";
        $obj->address_1 ="";
        $obj->address_2 ="";
        $obj->zip_code ="-";
        $obj->tel_no ="-";
        $obj->fax_no ="-";
        $obj->company_log_url ="-";
        $obj->description ="-";
        $obj->is_active = true;
        $obj->save();
    }
}
