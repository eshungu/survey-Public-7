<?php
  
namespace App\Exports;
  
use App\Models\form;
use Maatwebsite\Excel\Concerns\FromCollection;
Use Illuminate\Support\Facades\Log;
  
class FormsExport2 implements FromCollection
{

    protected $formId;

    function __construct($id) {
        $this->formId = $id;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {

        $form = new form;

        // $formArray[] = array('', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', 'Total');
  
        $formArray[] = array('', 'worst', 'bad', 'fair', 'good', 'best', 'Total');
  
            // $formObject = $form->getForm2(1);

            $formObject = $form->getForm2($this->formId);
     
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
                        

                            if($response->responseValue == 1 && $response->subtotal !=0 ){

                                $one = $response->subtotal;
                    
                            }else if($response->responseValue == 1 && $response->subtotal ==0 ){
                    
                                $one = '0.0';
                            }
                            
                            if($response->responseValue == 2 && $response->subtotal !=0 ){
                    
                                $two = $response->subtotal;
                    
                            }else if($response->responseValue == 2 && $response->subtotal ==0 ){
                    
                                $two = '0.0';
                            }
                            
                            if($response->responseValue == 3 && $response->subtotal !=0 ){
                    
                                $three = $response->subtotal;
                    
                            }else if($response->responseValue == 3 && $response->subtotal ==0 ){
                    
                                $three = '0.0';
                            }
                            
                            if($response->responseValue == 4 && $response->subtotal !=0 ){
                    
                                $four = $response->subtotal;
                    
                            }else if($response->responseValue == 4 && $response->subtotal ==0 ){
                    
                                $four = '0.0';
                    
                            }
                            
                            if($response->responseValue == 5 && $response->subtotal !=0 ){
                    
                                $five = $response->subtotal;
                    
                            }else if($response->responseValue == 5 && $response->subtotal ==0 ){
                    
                                $five = '0.0';
                            }
                            
                            // if($response->responseValue == 6 && $response->subtotal !=0 ){
                    
                            //     $six = $response->subtotal;
                    
                            // }else if($response->responseValue == 6 && $response->subtotal ==0 ){
                    
                            //     $six = '0.0';
                            // }
                            
                            // if($response->responseValue == 7 && $response->subtotal !=0 ){
                    
                            //     $seven = $response->subtotal;
                    
                            // }else if($response->responseValue == 7 && $response->subtotal ==0 ){
                    
                            //     $seven = '0.0';
                            // }
                            
                            // if($response->responseValue == 8 && $response->subtotal !=0 ){
                    
                            //     $eight = $response->subtotal;
                    
                            // }else if($response->responseValue == 8 && $response->subtotal ==0 ){
                    
                            //     $eight = '0.0';
                            // }
                            
                            // if($response->responseValue == 9 && $response->subtotal !=0 ){
                    
                            //     $nine = $response->subtotal;
                    
                            // }else if($response->responseValue == 9 && $response->subtotal ==0 ){
                    
                            //     $nine = '0.0';
                            // }
                            
                            // if($response->responseValue == 10 && $response->subtotal !=0 ){
                    
                            //     $ten = $response->subtotal;
                    
                            // }else if($response->responseValue == 10 && $response->subtotal ==0 ){
                    
                            //     $ten = '0.0';
                            // }  

                    }

                    //   $formArray[] = array($question->questionContent, $one, $two, $three, $four, $five, $six, $seven, $eight, $nine, $ten, $response->totalNumberOfRatings);

                      $formArray[] = array($question->questionContent, $one, $two, $three, $four, $five, $response->totalNumberOfRatings);

                }

            }        

        $convertedFormArray = collect($formArray);

        return $convertedFormArray;

    }

}