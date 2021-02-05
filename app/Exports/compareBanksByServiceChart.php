<?php
  
namespace App\Exports;
  
use App\Models\form;
use App\Models\question;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
Use Illuminate\Support\Facades\Log;
  
class compareBanksByServiceChart implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $questionId;

    function __construct($id) {
        $this->questionId = $id;
 }


    public function collection()
    {

// public function collection2($formId)
// {

        $question = new question;

        $questionArray[] = array();

        // $questionArray[] = array('','Access Bank Rwanda', 'Bank of Kigali', 
        // 'Commercial Bank of Rwanda', 'Banque Populaire du Rwanda SA (BPR)', 
        // 'Compagnie Générale de Banque (Cogebanque)', 'Ecobank', 'Equity Bank', 
        // 'Fina Bank', 'Banque de l’Habitat du Rwanda', 'Rwanda Development Bank', 
        // 'Kenya Commercial Bank', 'Urwego Opportunity Bank (UOB)');


        Log::info(" 77bp ... ");
  
            $questionObject = $question->getQuestion3($this->questionId);//1111

            Log::info(" 88sa ... ");

            $one = 0;
            $two = 0;
            $three = 0;
            $four = 0;
            $five = 0;
            $six = 0;
            $seven = 0;
            $eight = 0;
            $nine = 0;
            $ten = 0;
            $eleven = 0;
            $twelve = 0;   

            $questionContent = $questionObject[0]->questionContent;
     
            foreach ($questionObject[0]->forms as $key => $form) {

                Log::info(" 937 >>> formId: " . $form->formId . " >>> average: " . $form->average );       
     
     
                        if($form->formId == 1 && $form->average !=0 ){

                            $one = $form->average;

                        }else if($form->formId == 1 && $form->average ==0 ){

                            $one = '0.0';

                        }
                        
                        if($form->formId == 2 && $form->average !=0 ){

                            $two = $form->average;

                        }else if($form->formId == 2 && $form->average ==0 ){

                            $two = '0.0';
                        }
                        
                        if($form->formId == 3 && $form->average !=0 ){

                            $three = $form->average;

                        }else if($form->formId == 3 && $form->average ==0 ){

                            $three = '0.0';
                        }
                        
                        if($form->formId == 4 && $form->average !=0 ){

                            $four = $form->average;

                        }else if($form->formId == 4 && $form->average ==0 ){

                            $four = '0.0';

                        }
                        
                        if($form->formId == 5 && $form->average !=0 ){

                            $five = $form->average;

                        }else if($form->formId == 5 && $form->average ==0 ){

                            $five = '0.0';
                        }
                        
                        if($form->formId == 6 && $form->average !=0 ){

                            $six = $form->average;

                        }else if($form->formId == 6 && $form->average ==0 ){

                            $six = '0.0';
                        }
                        
                        if($form->formId == 7 && $form->average !=0 ){

                            $seven = $form->average;

                        }else if($form->formId == 7 && $form->average ==0 ){

                            $seven = '0.0';
                        }
                        
                        if($form->formId == 8 && $form->average !=0 ){

                            $eight = $form->average;

                        }else if($form->formId == 8 && $form->average ==0 ){

                            $eight = '0.0';
                        }
                        
                        if($form->formId == 9 && $form->average !=0 ){

                            $nine = $form->average;

                        }else if($form->formId == 9 && $form->average ==0 ){

                            $nine = '0.0';
                        }
                        
                        if($form->formId == 10 && $form->average !=0 ){

                            $ten = $form->average;

                        }else if($form->formId == 10 && $form->average ==0 ){

                            $ten = '0.0';
                        }   

                        if($form->formId == 11 && $form->average !=0 ){

                            $eleven = $form->average;

                        }else if($form->formId == 11 && $form->average ==0 ){

                            $eleven = '0.0';
                        }     

                        if($form->formId == 12 && $form->average !=0 ){

                            $twelve = $form->average;

                        }else if($form->formId == 12 && $form->average ==0 ){

                            $twelve = '0.0';

                        }

                        // Log::info(" sun >>> questionContent: " . $question[0]->questionContent);

            }    
            
            

            $questionArray[] = array($questionContent, $one, $two, $three, $four, $five, $six, $seven, $eight, $nine, $ten, $eleven, $twelve);


        $convertedQuestionArray = collect($questionArray);

        return $convertedQuestionArray;

    }

}