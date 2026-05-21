<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;

class CountryController extends Controller
{
    // Практика 8 - Задание 11-12
    public function task12()
    {
        $taskNumber = '12';
        $countries = Country::all();
        return view('task8.task12', compact('taskNumber', 'countries'));
    }

    // Практика 8 - Задание 15-20
    public function show()
    {
        // Задание 20
        $cities = City::all()->where('population', '>', 100000);

        foreach ($cities as $city) {
            dump("Город: " . $city->name);
            dump("Страна: " . $city->country->name);
        }
    }
}
