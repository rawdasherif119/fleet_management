<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;

class CitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = $this->getEgyptCities();
        foreach ($cities as $city) {
            City::firstOrCreate(['name' => $city]);
        }
    }

    public function getEgyptCities()
    {
        return [
            'Cairo',
            'Alexandria',
            'Gizeh',
            'Shubra El-Kheima',
            'Port Said',
            'Suez',
            'Luxor',
            'al-Mansura',
            'El-Mahalla El-Kubra',
            'Tanta',
            'Asyut',
            'Ismailia',
            'Fayyum',
            'Zagazig',
            'Aswan',
            'Damietta',
            'Damanhur',
            'al-Minya',
            'Beni Suef',
            'Qena',
            'Sohag',
            'Hurghada',
            '6th of October City',
            'Shibin El Kom',
            'Banha',
            'Kafr el-Sheikh',
            'Arish',
            'Mallawi',
            '10th of Ramadan City',
            'Bilbais',
            'Marsa Matruh',
            'Idfu',
            'Mit Ghamr',
            'Al-Hamidiyya',
            'Desouk',
            'Qalyub',
            'Abu Kabir',
            'Kafr el-Dawwar',
            'Girga',
            'Akhmim',
            'Matareya',
        ];
    }
}
