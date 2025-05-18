<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Divisions data seeding from divisions.json in file in resources/data folder
        $divisionFile = file_get_contents(base_path('resources/data/divisions.json'));
        $divisions = json_decode($divisionFile, true);
        foreach ($divisions as $division) {
            \App\Models\Division::create($division);
        }

        // Districts data seeding from districts.json in file in resources/data folder
        $districtFile = file_get_contents(base_path('resources/data/districts.json'));
        $districts = json_decode($districtFile, true);
        foreach ($districts as $district) {
            \App\Models\District::create($district);
        }

        // Upazilas data seeding from upazilas.json in file in resources/data folder
        $upazilaFile = file_get_contents(base_path('resources/data/upazilas.json'));
        $upazilas = json_decode($upazilaFile, true);
        foreach ($upazilas as $upazila) {
            \App\Models\Upazila::create($upazila);
        }

    }
}
