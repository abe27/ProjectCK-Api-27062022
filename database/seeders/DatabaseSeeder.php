<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        /// Seed Master
        // $this->call(UserSeeder::class);
        // $this->call(UserPermissionSeeder::class);
        // $this->call(PositionSeeder::class);
        // $this->call(SectionSeeder::class);
        // $this->call(RegionSeeder::class);
        // $this->call(CountrySeeder::class);
        // $this->call(ProvinceSeeder::class);
        // $this->call(DistrictSeeder::class);
        // $this->call(AffiliateSeeder::class);
        // $this->call(CustomerSeeder::class);
        // $this->call(AddressSeeder::class);
        // $this->call(FactorySeeder::class);
        // $this->call(WhsTypeSeeder::class);
        // $this->call(WhsSeeder::class);
        // $this->call(ShippingTypeSeeder::class);
        // $this->call(UnitTypeSeeder::class);
        // $this->call(PartTypeSeeder::class);
        // $this->call(PartVendorSeeder::class);
        // $this->call(PartSeeder::class);
        // $this->call(KindsSeeder::class);
        // $this->call(SizesSeeder::class);
        // $this->call(ColorsSeeder::class);
        // $this->call(TapGroupSeeder::class);
        // $this->call(LedgersSeeder::class);
        // $this->call(LedgerImageSeeder::class);
        // $this->call(ContainerTypeSeeder::class);
        // $this->call(ContainerSizeSeeder::class);
        // $this->call(PalletTypeSeeder::class);
        // $this->call(PalletPlacingTypeSeeder::class);
        // $this->call(FticketSeqSeeder::class);
        // $this->call(InvoiceTitleSeeder::class);
        // $this->call(InvoiceLoadingSeeder::class);
        // $this->call(OrderZoneTypeSeeder::class);
        // $this->call(OrderTypeSeeder::class);
        // $this->call(ReviseTypeSeeder::class);
        // $this->call(CorrectiveSeeder::class);
        // $this->call(CommercialSeeder::class);
        // $this->call(LocationSeeder::class);
        // $this->call(ReceiveMailBoxSeeder::class);
        // $this->call(CompanySeeder::class);
        // $this->call(RequestInformationTypeSeeder::class);
        // $this->call(ProfileSeeder::class);
        // $this->call(ConsigneeSeeder::class);
        // $this->call(ConditionGroupSeeder::class);
        $this->call(ConsigneeConditionSeeder::class);
        Schema::enableForeignKeyConstraints();
    }
}
