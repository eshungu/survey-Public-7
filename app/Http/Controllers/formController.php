<?php

namespace App\Http\Controllers;

use App\Exports\FormsExport;
use App\Exports\compareBanksByServiceChart;
use App\Exports\FormsExport2;
use Illuminate\Http\Request;
use App\Models\form;
use App\Models\formSection;
use App\Models\question;
use App\Models\response;
use App\Models\comment;
// use Maatwebsite\Excel\Excel;
use Maatwebsite\Excel\Facades\Excel;

// use App\Models\form;
// use App\Models\form;
// use App\Models\form;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class formController extends Controller
{


	public function __construct()
	{
		// $this->middleware('auth')->except(['index', 'show']);
		$this->middleware('auth')->except(['getFormss', 'getForm', 'getFormsAndTheirAverages', 'getQuestion']);
	}


	public function getFormss()
	{

		Log::info(" 2277 ... reached getFormss");

		$data = DB::table('forms')->get();

		$formz = [];

		foreach ($data as $key => $value) { // here $value = form

			Log::info(" 774455 >>> key: " . $key);
			Log::info(" 774466 >>> formName: " . $value->formName);
			Log::info(" 774477 >>> FormId: " . $value->formId);

			//here "$value->formName" is the "index" of that array
			$formz[$value->formName] = ['formId' => $value->formId];
		}

		// return  response()->json($data);

		return $formz;

		Log::info(" 2277 ... response sent ");
		
	}

	public function getFormsAndTheirAverages()
	{

		$formzzz = DB::table('forms')->get();

		$forms = [];

		Log::info(" 12*21*20 ... ngeze muri getFormsAndTheirAverages >>> formzzz.size = " . sizeof($formzzz));

		foreach ($formzzz as $key => $form) { // here $value = form

			Log::info(" 52*21*20 >>> end ");

			$forume = new form();
			
			$average = $forume->getAverage2($form->formId);

			Log::info(" 52*21*20 >>> formId: " .  $form->formId . " >>> average: " . $average);

			$forms[$key]['average'] = $average;
			$forms[$key]['formId']= $form->formId;
			$forms[$key]['formName']= $form->formName;

			Log::info(" 52*21*20 >>> end ");

		}

		$keys = array_column($forms, 'average');

		// array_multisort($keys, SORT_ASC, $forms);

		array_multisort($keys, SORT_DESC, $forms);

		return $forms;

	}

	//==========================

	public function getForm($formId)
	{
		// returns the details of the form
		$form = form::find($formId);
		$form['formSections'] = $this->getFormSections($formId);
		return $form;
	}

	//==========================

	function getFormSections($formId)
	{
		// returns the details of the form
		// $FormSections = formSection::where('formId', $formId)->get();

		$FormSections = formSection::where('formId', 1)->get();

		foreach ($FormSections as $key => $FormSection) {

			$FormSections[$key]['questions'] = $this->getQuestionsInFormSection($FormSection->formSectionId);
		}

		return $FormSections;
	}

	function getQuestionsInFormSection($formSectionId)
	{
		// returns the questions in section
		$questions = question::where('formSectionId', $formSectionId)->get();

		// Get answers of question
		foreach ($questions as $key => $question) {

			$responses = $this->getResponses($question->questionId);

			$questions[$key]['responses'] = $responses;
		}

		return $questions;
	}

	public function getQuestion($questionId)
	{

		Log::info(" 1220 ... ngeze muri getQuestion >>> questionId: " . $questionId);

		$questions = question::where('questionId', $questionId)->get();

		Log::info(" 1221 ... ndangije gukurura questions >>> size: " . count($questions) . " >>> content: " . $questions[0]->questionContent);

		foreach ($questions as $key => $question) {

			Log::info(" 1223 ... looping through questions >>>  question id: " . $question->questionId);

			$responses = $this->getResponses($question->questionId);

			$questions[$key]['responses'] = $responses;
		}

		return $questions;
	}

	public function getResponses($questionId)
	{

		Log::info(" 1221 ... ngeze muri getResponses ");

		$responses = response::where('questionId', '=', $questionId)->get();

		return $responses;

	}

	public function getAllFormsAndTheirAverages($questionId)
	{

		$forms = DB::table('forms')->get();

		Log::info(" 1221*20 ... ngeze muri getAllFormsAndTheirAverages ");

		foreach ($forms as $key => $form) { // here $value = form

			$forume = new form();
			
			$average = $forume->getAverage($questionId, $form->formId);

			Log::info(" 21*20 >>> questionId: " . $questionId . " >>>  formId: " .  $form->formId . " >>> average: " . $average);

			$forms[$key]-> average = $average;

		}

		return $forms;
	}

	

	//==============================

	public function relationship()
	{
		$forms = form::all(); //returns array or collection
		return view('testRelationships')->withForms($forms);
	}

	public function relationship2()
	{
		$forume = new form();

		$form = $forume->getForm2(1);

		return view('testRelationships2')->withForm($form);
	}

	public function getResultsSummary($formId)
	{

		Log::info(" 2323 >>> formId: " . $formId);

		$forume = new form();

		$form = $forume->getForm2($formId);

		return view('resultsSummary')->withForm($form);

	}

	public function getResultsDetails($formId)
	{

		$forume = new form();

		$form = $forume->getForm2($formId);

		return view('resultsDetails')->withForm($form);

	}

	public function comparativeSummary($questionId)
	{

		$question = new question;

		Log::info(" 2323*48 >>> formId: " . $questionId);

		$qn = $question->getQuestion3($questionId);

		// return view('comparativeSummary')->withForm($question);

		Log::info(" soccer ... ");

		$question = $qn;
		
		return view('comparativeSummary', compact('question'));

	}

	public function comparativeSummaryForAll()
	{
		
		$fc = new formController();

		$questions = $fc->getAllQuestions3();

		return view('comparativeSummary')->withForm($questions);
		
	}


	public function zanaComments(Request $request)
	{

		$formId = $request->input('formId');
		$questionId = $request->input('questionId');

		$form = form::find($formId);
		$form['comments'] = $this->getFormComments($formId,$questionId);

		// $form = form::find(3);
		// $form['comments'] = $this->getFormComments(3,12);

		return $form;

	}

	public function getFormComments($formId, $questionId)
	{

		Log::info(" 1221*21 ... ngeze muri getResponses ");

		$komments = DB::table('dbrespondentresponses')
			->select(['traineeId', 'responseText'])
			->where([
				['sessionId', $formId],
				['questionId', $questionId]			
			])
			->get();

		$comments = [];

		foreach ($komments as $key => $value) {

			$comments[$key]['traineeId'] = $value->traineeId;
			$comments[$key]['responseText'] = $value->responseText;

			$names = $this->getTraineeNames($value->traineeId);

			$comments[$key]['traineeNames'] = $names['tugakore'];

		}

		return $comments;
		
	}

	function getTraineeNames($traineeId)
	{

		Log::info(" 21200*458 ... traineeId : " . $traineeId);

		$responseValue = DB::table('trainees')
			->select(['traineeNames'])
			->where('traineeId', $traineeId)
			->get();

		$zana ['tugakore'] = $responseValue[0]->traineeNames;

		Log::info(" 212**54 ... traineeNames: " . $responseValue[0]->traineeNames );

		return $zana;

	}


	public function exportToExcelSumV2($formId)
	{
		return Excel::download(new FormsExport($formId), 'users.xlsx');
	}

	public function exportToExcelDetV2($formId)
	{

		return Excel::download(new FormsExport2($formId), 'users.xlsx');
	}

	public function ChartResultsSumV2($fi)
	{

		$formId = $fi;

		return view('resultSumChartView', compact('formId'));
	}

	public function getForm22222(Request $request)
	{

		$formId = $request->input('formId');
		$questionId = $request->input('questionId');

		Log::info("1908 >>> form id: " . $formId . " >>> questionId: " . $questionId);

		// returns the details of the form
		$form = form::find($formId);
		$form['formSections'] = $this->getFormSections2($formId, $questionId);
		return $form;
	}

	public function getFormSections2($formId, $questionId)
	{
		// returns the details of the form
		$FormSections = formSection::where('formId', $formId)->get();

		foreach ($FormSections as $key => $FormSection) {

			$FormSections[$key]['questions'] = $this->getQuestionsInFormSection2($FormSection->formSectionId, $questionId);
		}

		return $FormSections;
	}

	public function getQuestionsInFormSection2($formSectionId, $questionId)
	{
		// returns the questions in section
		// $questions = question::where('formSectionId', $formSectionId)->get();

		$questions = DB::table('questions')
			->where([
				['formSectionId', $formSectionId],
				['questionId', $questionId]
			])
			->get();
		// ->toArray();

		// Get answers of question
		foreach ($questions as $key => $question) {

			Log::info(" 2005 >>> key: " . $key . " >>> question id: " . $question->questionId);

			$responses = $this->getResponses($question->questionId);

			$questions[$key]->responses = $responses;
		}

		return $questions;
	}

	public function getQuestion3($questionId)
	{
	
		$question = DB::table('questions')
			->where('questionId', $questionId)
			->get();

			Log::info(" patate ... ");	

		$question[0]->forms = $this->getAllFormsAndTheirAverages($questionId);	

		Log::info(" zidane ... ");
		return $question;

	}

	public function getServicesList()
	{
	
		$kwestions = DB::table('questions')->get();
	
		return $kwestions;

	}

	public function getAllQuestions3()
	{
	
		$questions = DB::table('questions')
			->get();
	
		foreach ($questions as $key => $question) {

			Log::info(" 2005 >>> key: " . $key . " >>> question id: " . $question->questionId);

			$forms = $this->getAllFormsAndTheirAverages($question->questionId);

			$questions[$key]->forms = $forms;

		}

		return $questions;
	}


	public function showSummaryCharts($formId)
	{

		$FormsExport = new FormsExport($formId);

		$data = $FormsExport->collection();

		return response()->json($data);
	}

	public function showComparativeChartByService($questionId)
	{

		$compareBanksByServiceChart = new compareBanksByServiceChart($questionId);

		$data = $compareBanksByServiceChart->collection();

		// return $data;

		return response()->json($data);
		
	}

}
