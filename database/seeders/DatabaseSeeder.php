<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(JobTypesTableSeeder::class);
        $this->call(UserTypesTableSeeder::class);
        $this->call(UsersTableSeeder::class);

        $this->call(PrefecturesTableSeeder::class);
        $this->call(AreaBranchesTableSeeder::class);
        $this->call(CitiesTableSeeder::class);
        $this->call(TradeAreasTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(BooksTableSeeder::class);
        $this->call(SpotPlansTableSeeder::class);
        $this->call(PriceRangesTableSeeder::class);
        $this->call(PriceGenresTableSeeder::class);
        $this->call(SpacesTableSeeder::class);
        $this->call(SpotIconTypesTableSeeder::class);
        $this->call(SpotIconGenresTableSeeder::class);
        $this->call(SpotIconItemsTableSeeder::class);
        $this->call(AreaSectionsTableSeeder::class);
        $this->call(AreaLabelsTableSeeder::class);

        $this->call(AreasTableSeeder::class);
        $this->call(AreaCentersTableSeeder::class);

        $this->call(CompaniesTableSeeder::class);
        $this->call(SpotsTableSeeder::class);
        $this->call(NewsTableSeeder::class);
        $this->call(ContactsTableSeeder::class);

        $this->call(SpotDetailsTableSeeder::class);
        $this->call(SpotImagesTableSeeder::class);
        $this->call(SpotPricesTableSeeder::class);
        $this->call(SpotIconGenreCommentsTableSeeder::class);

        $this->call(SpotIconStatusesTableSeeder::class);

        $this->call(BookSpotTableSeeder::class);

        $this->call(CompanyUserTableSeeder::class);
        $this->call(SpotUserTableSeeder::class);
        $this->call(ResetPasswordsTableSeeder::class);
        $this->call(LogsTableSeeder::class);

    }
}
