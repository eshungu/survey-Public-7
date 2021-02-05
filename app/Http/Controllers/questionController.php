<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\question;
use App\Models\response;
use Illuminate\Support\Facades\Log;
use FFI\Exception;
use Illuminate\Support\Facades\DB;

class questionController extends Controller
{

    public function questForumu()
    {

        return view('questionFormm');
    }

    public function saveQuestion(Request $request)
    {

        Log::info(" >>> reached saveQuestion ... ");
        Log::info(" >>> request.formId >>> " . $request->formId);
        Log::info(" >>> request.formSectionId >>> " . $request->formSectionId);

        try {

            $this->validate($request, [
                
                // 'formId' => 'required',
                'formSectionId' => 'required',
                'questionType' => 'required',
                'questionContent' => 'required',
                'response1content' => 'required',
                //'response1value' => 'required',	
                'response2content' => 'required',
                //'response2value' => 'required',	
                'response3content' => 'required',
                //'response3value' => 'required',
                'response4content' => 'required',	
                //'response4value' => 'required',	
                'response5content' => 'required',
                //'response5value' => 'required'

            ]);

            // $create = question::create($request->all());

            DB::table('questions')->insert(

                array('formSectionId' => $request->formSectionId, 
                'questionContent' => $request->questionContent,
                'questionType' => $request->questionType)        
            );


            $questionId = DB::table('questions')->max('questionId');


            // $create2 = response::create($request->all());

            DB::table('responses')->insert(array(

                array('questionId' => $questionId, 
                'responseContent' => $request->response1content,
                'responseValue' => 1.0),
        
                array('questionId' => $questionId, 
                'responseContent' => $request->response2content,
                'responseValue' => 2.0),

                array('questionId' => $questionId, 
                'responseContent' => $request->response3content,
                'responseValue' => 3.0),

                array('questionId' => $questionId, 
                'responseContent' => $request->response4content,
                'responseValue' => 4.0),

                array('questionId' => $questionId, 
                'responseContent' => $request->response5content,
                'responseValue' => 5.0),
        
            ));

            return response()->json(['status' => 'success', 'msg' => 'question created successfully']);
        
        } catch (Exception $e) {

            echo 'Caught exception: ',  $e->getMessage(), "\n";

            Log::info(" >>> error inside question.store >>> " . $e->getMessage());

        }

    }

}
