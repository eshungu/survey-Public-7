<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\form;
use App\Models\formSection;
use App\Models\question;
use App\Models\response;

// use App\Models\form;
// use App\Models\form;
// use App\Models\form;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class stevenController extends Controller
{

	public function getPower()
	{

		$power = null;

		$resistance = null;

		$intensite = null;

		$resistance = rand(4, 150);

		$intensite = rand(100, 780);


		$power = $resistance * $intensite * $intensite;

		if($power >= 999999 ){

			echo " resistance: " . $resistance . " >>> intensite: " . $intensite . " >>> power: " . $power . " Mmmmm ... this is a very powerful engine";

		}else if ($power < 999999){

			echo " resistance: " . $resistance . " >>> intensite: " . $intensite . " >>> power: " . $power . " wapi kabisa  ... iyi moteri ni fake";


		}
	
		// echo " resistance: " . $resistance . " >>> intensite: " . $intensite . " >>> power: " . $power;

	}


}
