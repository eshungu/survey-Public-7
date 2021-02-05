<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DBrespondentResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;


class ResponseController extends Controller
{

	public function respForumu()
	{
		return view('surveyWelcome');
	}

	public function statisticalTables()
	{

		return view('ViewMaResult');

	}

	public function showChartsAndComments()
	{
		return view('ViewMaChartsAndComments');
	}

	public function comparePerformances()
	{
		return view('CompareBanksByServices');
	}

	public function RecNewTraining()
	{
		return view('NewTraining');		
	}

	//
	public function answerForm(Request $request)
	{
		$finalCmt = $request->input('finalComment');

		$questions = $request->input('questions');

		$formId = $request->input('formId');

		$userId = $request->input('userId');

		$responseValue = null;

		foreach ($questions as $questionIdd => $responseIdd) {

			Log::info(" 2176 ... questionIdd: " . $questionIdd . " >>> responseIdd: " . $responseIdd);

			if ($questionIdd == 0 OR $responseIdd == null ) {

				continue;

			} else {

				if ($questionIdd == 17){

					$responseIdd = 81;

				} 

				Log::info(" 2177 ... questionIdd: " . $questionIdd . " >>> responseIdd: " . $responseIdd);

				$responseValue =  $this->getResponseValue($responseIdd);

				$responseValue2 = $responseValue['hano'];

				Log::info(" 21788 .... responseValue2: " . $responseValue2);

				$responseId = null;

				$responseText = null;

				if (is_numeric($responseIdd)) {
					$responseId = $responseIdd;
				} else {
					$responseText = $responseIdd;
				}

				if ($questionIdd == 17){

					$responseText = $finalCmt;

				}

				Log::info(" 2199 ... responseValue: " . $responseValue2);

				DBrespondentResponse::create([

					'traineeId' => $userId,
					'sessionId'  => $formId,
					'questionId' => $questionIdd,
					'responseId' => $responseId,
					'responseValue' => $responseValue2,
					'responseText' => $responseText,
					
				]);
			}
		}

		echo "Done";
	}

	function getResponseValue($responseId)
	{

		Log::info(" 21200 ... responseId : " . $responseId);

		$responseValue = DB::table('responses')
			->select(['responseValue'])
			->where('responseId', $responseId)
			->get();

		$igisubizo ['hano'] = $responseValue[0]->responseValue;

		Log::info(" 21211 ... responseValue: " . $responseValue[0]->responseValue );

		return $igisubizo;

	}
	
}
