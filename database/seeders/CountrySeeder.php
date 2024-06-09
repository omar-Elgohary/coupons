<?php
namespace Database\Seeders;
use Carbon\Carbon;
use App\Models\Country;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    public function run(): void
    {
        $json = file_get_contents(database_path("seeders/json/countries.json"));
        $counties = json_decode($json, true);

        foreach ($counties as $country) {
            DB::table("countries")->insert([
                "name"          => $country["name"],
                "nameAr"        => $country["nameAr"],
                "code"          => $country["code"],
                "continent"     => $country["continent"],
                "created_at"    => now(),
                "updated_at"    => now(),
            ]);
        }
    }
}
