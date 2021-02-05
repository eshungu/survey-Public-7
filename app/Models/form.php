<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\formSection;
use App\Models\question;
use App\Models\response;
use App\Models\rating;

// use App\Models\form;
// use App\Models\form;
// use App\Models\form;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class form extends Model
{

    protected $table = 'forms';
    protected $primaryKey = 'formId';
    protected $fillable = [
		'formName',
		'average'
		// 'overAllAverage'
    ];

    public function questions2() {
	    return $this->hasMany('App\Models\question', 'formId');
    }
    
    public function formSections() {

        return $this->hasMany('App\Models\formSection', 'formId');
        
	}
	
	public function comments() {
        return $this->hasMany('App\Models\comment', 'formId');
    }

    public function questions()
    {
        return $this->hasManyThrough(
                        'app\Models\question',
                        'app\Models\formSection',
                        'formId', 
                        'formSectionId'
        );
	}
	
	//---------------------------------------------------------------------

    public function getForm2($formId)
	{
		$form = $this->find($formId);		
		$form['formSections'] = $this->getFormSections2($form->formId);
		return $form;
	}
    
    function getFormSections2($formId)
	{
		
		$FormSections = formSection::where('formId', 1)->get();

		$j = 0 ; 

		foreach ($FormSections as $key => $FormSection) {

			$j++;

			$FormSections[$key]['questions'] = $this->getQuestionsInFormSection2($FormSection->formSectionId, $formId);
		
		}

		return $FormSections;

    }
    
  function getQuestionsInFormSection2($formSectionId, $formId)
	{
		Log::info(" 2020 >>> formSectionId: " . $formSectionId . " >>> formId: " . $formId);

		$questions =  DB::table('questions AS questions')
		->select([DB::raw('distinct questions.questionId'), 'questions.questionContent'])
		->join('dbrespondentresponses AS dbrespondentresponses', 
		'questions.questionId', '=', 'dbrespondentresponses.questionId')
		->where([
			['dbrespondentresponses.sessionId',$formId],
			['questions.formSectionId', $formSectionId],
			['questions.questionId', '!=', 17]
		])
		->get();
		// ->toArray();

		foreach ($questions as $key => $question) {

			// $i++;

			$responses = $this->getResponses2($question->questionId, $formId);

			$questions[$key]->responses = $responses;

			$questions[$key]->average =  $this->getAverage($question->questionId, $formId);

		}

		// var_dump("191525 >>> # of questions: " . $i);

		return $questions;

	}
    
	public function getResponses2($questionId, $formId)
	{

		$totalNumberOfRatings = $this->getTotalNumberOfRatings($questionId, $formId);

		$responses = response::where('questionId', '=', $questionId)->get();

		foreach ($responses as $key => $response) {
		
			$responses[$key]['subtotal'] = $this->getSubtotal($questionId, $response->responseValue, $formId);
		
			$subtotal = $responses[$key]['subtotal'];

			$responses[$key]['totalNumberOfRatings'] = $totalNumberOfRatings;
		
			$responses[$key]['percentage'] = round(($subtotal / $totalNumberOfRatings) * 100, 1);
		
		}

		return $responses;
	}
    
	public function getSubtotal($questionId, $responseValue, $formId)
	{

		Log::info(" 1140 ... questionId: "  . $questionId);
		Log::info(" 1141 ... responseValue: "  . $responseValue);

		$returnedSubtotal = 0;

		$subtotal = DB::table('dbrespondentresponses')
			->selectRaw('count(responseValue) AS samaki')
			->where([
				['questionId', $questionId],
				['sessionId', $formId]			
			])
			->where('responseValue', '=', $responseValue)
			->groupBy('responseValue')->get();

		if (count($subtotal)) {
			$returnedSubtotal = $subtotal[0]->samaki;
		}

		Log::info(" 1233 ... returnedSubtotal: "  . $returnedSubtotal);

		return $returnedSubtotal;
	}

	public function getTotalNumberOfRatings($questionId, $formId)
	{

		$tnor = 0;

		$TotalNumberOfRatings = DB::table('dbrespondentresponses')
			->selectRaw('count(responseValue) AS totalRatings')
			->where([
				['questionId', $questionId],
				['sessionId', $formId]			
			])
			->groupBy('questionId')
			// ->first();
			->get();

		$tnor = $TotalNumberOfRatings[0]->totalRatings;	

		return $tnor;

	}

		public function getAverage($questionId, $formId)
	{

		$avg = 0;

		$average =  DB::table('dbrespondentresponses')
		->select(DB::raw('AVG(responseValue) as aavvgg'))
		->where([
			['questionId', $questionId],
			['sessionId', $formId]			
		])
		->groupBy('sessionId')
		->get();

		if (count($average)) {

			$avg = round($average[0]->aavvgg, 1);

		}else{

			$avg = '-';

		}		

		return $avg;

	}

	public function getAverage2($formId)
	{

		$avg = 0;

		$average =  DB::table('dbrespondentresponses')
		->select(DB::raw('AVG(responseValue) as aavvgg'))
		->where('sessionId', $formId)
		->groupBy('sessionId')
		->get();

		if (count($average)) {

			$avg = round($average[0]->aavvgg, 1);

		}else{

			$avg = '-';

		}		

		return $avg;

	}



    


}