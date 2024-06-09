<?php
namespace App\Http\Controllers;
use App\Models\Country;

class CountryController extends Controller
{
    public function countries()
    {
        $countries = Country::get();
        return view('dashboard.countries', compact('countries'));
    }

    public function showCountry($id)
    {
        $country = Country::find($id);
        return view('dashboard.showCountry', get_defined_vars());
    }
}
