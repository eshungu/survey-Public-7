<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use App\Models\form;
use App\Models\trainer;
use App\Models\trainee;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
Use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class traineeController extends Controller
{
    

    public function __construct()
    {
        $this->middleware('guest')->except('createTrainingSession');
    }

    function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
   


    public function create3(Request $request)
    {

        Log::info(" create2 >>> name: " . $request->input('name') . " >>> email: " . $request->input('email'));

        // $formId = $request->input('formId');

        $userId = '';

        // return User::create([

        $trainee = trainee::create([
            'traineeNames' => $request->input('name'),
            'email' => $request->input('email')
        ]);        

       
        
        $traineeId = DB::table('trainees')
        ->select(['traineeId'])
        ->where([
            ['traineeNames', $request->input('name')],
            ['email', $request->input('email')]        
        ])->first();

        Log::info(" 0655 >>> trainee id: " . $traineeId->traineeId);

        $treni = $traineeId->traineeId;

        // return (['formId'=>$formId, 'userId'=>$userId->id]);
        return $treni;
        
    }   

}
