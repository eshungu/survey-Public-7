<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\formSection;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class formSectionController extends Controller
{

  public function getFormSectionss(Request $request)
  {

    Log::info(" 2210 ... reached getFormSectionss" . ' >>> ' . $request->formIddd);

    $data = DB::table('formSections')->where('formId', '=', $request->formIddd)->get();

    $formSectionz = [];

    foreach ($data as $key => $value) {//here $value = formSection

      Log::info(" 77** >>> formSectionName: " . $value->formSectionName);
      Log::info(" 77## >>> formSectionId: " . $value->formSectionId);

      $formSectionz[$value->formSectionName] = ['formSectionId' => $value->formSectionId];

    }

    // return  response()->json($data);

    return $formSectionz;

    // return  response()->json($data);

    Log::info(" 2211 ... response sent ");
    
  }

}
