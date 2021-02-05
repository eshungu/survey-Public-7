<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\State;

class CountryStateController extends Controller
{
    /**
     * Retrieve countries data
     *
     * @return void
     */

     public function ibihugu(){

        return view('app');
     }

    


    
    public function getCountries()
    {
        $data = Country::get();

        return response()->json($data);
    }

    /**
     * Retrieve states data
     */
    public function getStates(Request $request)
    {
        $data = State::where('country_id', $request->country_id)->get();

        return response()->json($data);
    }
}