<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\District;
use App\Models\Factory;
use App\Models\Position;
use App\Models\Profile;
use App\Models\Section;
use App\Models\User;
use App\Models\UserPermission;
use App\Models\Whs;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = Storage::get('public/mocks/user.json');
        $data = json_decode($json);
        Profile::truncate();

        foreach ($data as $r) {
            $user = User::where('empcode', $r->empcode)->first();
            $whs = Whs::where('name', $r->whs_id)->first();
            $factory = Factory::where('name', $r->factory_id)->first();
            $section = Section::where('name', $r->section_id)->first();
            $position = Position::where('name', $r->position_id)->first();
            $permission = UserPermission::where('name', $r->permission_id)->first();
            $district = District::where('name', $r->district_id)->first();
            $company = Company::where('company_name', $r->company_id)->first();

            $p = new Profile();
            $p->user_id = $user->id;
            $p->whs_id = $whs->id;
            $p->factory_id = $factory->id;
            $p->section_id = $section->id;
            $p->position_id = $position->id;
            $p->permission_id = $permission->id;
            $p->district_id = $district->id;
            $p->company_id = $company->id;
            $p->full_name = $r->full_name;
            $p->address_1 = $r->address_1;
            $p->address_2 = $r->address_2;
            $p->zip_code = $r->zip_code;
            $p->exp_no = $r->exp_no;
            $p->mobile_no = $r->mobile_no;
            $p->fax_no = $r->fax_no;
            $p->avatar_url = $r->avatar_url;
            $p->description = $r->description;
            $p->is_active = true;
            $p->save();

            // Command
            $this->command->warn("Insert Profile: " . $user->id . " successfully.");
        }
    }
}
