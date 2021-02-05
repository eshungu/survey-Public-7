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

class stevenDecisions extends Controller
{

	public function getDecision()
	{

		$sadi= null;

		$blaise = null;

		$japan = null;

			$averagee = null;
		
		$sadi = rand(0, 20);

		$blaise = rand(0, 20);

		$japan= rand(0, 20);         
		
		$race= 3;

		$averagee = ($sadi + $blaise + $japan)/$race;

		$steven= rand(0, 20);
		
		if($averagee >= $steven) {

			echo " averagee: " . $averagee . " >>> steven: " . $steven ." >>>> stevo n'umuswa";

		}else if ($averagee < $steven){

			echo "average : " . $averagee . " >>> steven: " . $steven ." >>>> stevo yatambutse";

		}
	
	}


}
