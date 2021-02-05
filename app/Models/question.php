<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
Use Illuminate\Support\Facades\Log;
use App\Models\form;

class question extends Model
{
	protected $table = 'questions';
	protected $primaryKey = 'questionId';
    protected $fillable = [			
		// 'formId',
		'formSectionId',	
		'questionContent',
		'questionType',
		'average'		
	];
	
	public function formSection() {
	    return $this->belongsTo('app\Models\formSection');
	}

	public function responses() {
	    return $this->hasMany('app\Models\response','questionId');
	}

	public function comments() {
	    return $this->hasMany('app\Models\comment', 'questionId');
	}
	
	public function forms() {
	    return $this->hasMany('app\Models\form', 'questionId');
	}
	
	public function getQuestion3($questionId)
	{

		$question = new question();
	
		$question = DB::table('questions')
			->where('questionId', $questionId)
			->get();
			// ->toArray();

			Log::info(" patate*888 ... " . $question[0]->questionContent);	

		$question[0]->forms = $this->getAllFormsAndTheirAverages($questionId);	

		Log::info(" zidane ... ");

		return $question;

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

}