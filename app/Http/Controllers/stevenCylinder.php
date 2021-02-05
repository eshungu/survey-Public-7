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

class stevenCylinder extends Controller
{

	public function getVolume()
	{

		$volume= null;

		$height = null;

		$radius = null;

		$radius = 34;

		$height =12;

		$pi = 3.14;


		$volume = $height * $radius * $radius* $pi;

		if($volume >= 600 ){

			echo " height: " . $height . " >>> radius: " . $radius . " >>>  Pi : " . $pi . ">>> volume: " . $volume."Mmmm > this is very hard";

		}else if ($volume < 600){

			echo " height: " . $height . " >>> radius: " . $radius . " pi: " . $pi . ">>> volume: " . $volume."hhhhh> this is very easy";

		}
	
	}


}
