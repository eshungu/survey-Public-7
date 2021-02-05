<?php
  
namespace App\Exports;
  
use App\Models\form;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
Use Illuminate\Support\Facades\Log;
  
class FormsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $formId;

    function __construct($id) {
        $this->formId = $id;
 }


    public function collection()
    {

// public function collection2($formId)
// {

        $form = new form;

        // $formArray[] = array('', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', 'Average');
  
        $formArray[] = array('', 'worst', 'bad', 'fair', 'good', 'best', 'Average');
  
            // $formObject = $form->getForm2(1);

            $formObject = $form->getForm2($this->formId);//1111
     
            foreach ($formObject->formSections as $section) {

                Log::info(" 937 >>> formSectionName: " . $section->formSectionName);       
     
                foreach ($section->questions as $question) {

                    $one = 0;
                    $two = 0;
                    $three = 0;
                    $four = 0;
                    $five = 0;
                    // $six = 0;
                    // $seven = 0;
                    // $eight = 0;
                    // $nine = 0;
                    // $ten = 0;                  
              
                    foreach ($question->responses as $response) {   

                        if($response->responseValue == 1 && $response->percentage !=0 ){

                            $one = $response->percentage;

                        }else if($response->responseValue == 1 && $response->percentage ==0 ){

                            $one = '0.0';
                        }
                        
                        if($response->responseValue == 2 && $response->percentage !=0 ){

                            $two = $response->percentage;

                        }else if($response->responseValue == 2 && $response->percentage ==0 ){

                            $two = '0.0';
                        }
                        
                        if($response->responseValue == 3 && $response->percentage !=0 ){

                            $three = $response->percentage;

                        }else if($response->responseValue == 3 && $response->percentage ==0 ){

                            $three = '0.0';
                        }
                        
                        if($response->responseValue == 4 && $response->percentage !=0 ){

                            $four = $response->percentage;

                        }else if($response->responseValue == 4 && $response->percentage ==0 ){

                            $four = '0.0';

                        }
                        
                        if($response->responseValue == 5 && $response->percentage !=0 ){

                            $five = $response->percentage;

                        }else if($response->responseValue == 5 && $response->percentage ==0 ){

                            $five = '0.0';
                        }
                        
                        // if($response->responseValue == 6 && $response->percentage !=0 ){

                        //     $six = $response->percentage;

                        // }else if($response->responseValue == 6 && $response->percentage ==0 ){

                        //     $six = '0.0';
                        // }
                        
                        // if($response->responseValue == 7 && $response->percentage !=0 ){

                        //     $seven = $response->percentage;

                        // }else if($response->responseValue == 7 && $response->percentage ==0 ){

                        //     $seven = '0.0';
                        // }
                        
                        // if($response->responseValue == 8 && $response->percentage !=0 ){

                        //     $eight = $response->percentage;

                        // }else if($response->responseValue == 8 && $response->percentage ==0 ){

                        //     $eight = '0.0';
                        // }
                        
                        // if($response->responseValue == 9 && $response->percentage !=0 ){

                        //     $nine = $response->percentage;

                        // }else if($response->responseValue == 9 && $response->percentage ==0 ){

                        //     $nine = '0.0';
                        // }
                        
                        // if($response->responseValue == 10 && $response->percentage !=0 ){

                        //     $ten = $response->percentage;

                        // }else if($response->responseValue == 10 && $response->percentage ==0 ){

                        //     $ten = '0.0';
                        // }       

                    }

                    //   $formArray[] = array($question->questionContent, $one, $two, $three, $four, $five, $six, $seven, $eight, $nine, $ten, $question->average);

                      $formArray[] = array($question->questionContent, $one, $two, $three, $four, $five, $question->average);
                
                    }

            }        

        $convertedFormArray = collect($formArray);

        return $convertedFormArray;

    }

}