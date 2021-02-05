<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use App\Models\form;
use App\Models\trainer;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
Use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class RegisterController2 extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    // use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // protected $redirectTo = '/anotherBladePage';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('createTrainingSession');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    
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
    function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        $role = Role::select('id')->where('name', 'user')->first();

        $user->roles()->attach($role);

        return $user;
    }


    // function create2(Request $request)
    // {

    //     Log::info(" create2 >>> name: " . $request->input('name') . " >>> email: " . $request->input('email'));

    //     // $formId = $request->input('formId');

    //     $userId = '';

    //     // return User::create([

    //     $user = User::create([
    //         'name' => $request->input('name'),
    //         'email' => $request->input('email'),
    //         'password' => bcrypt('password@456#897')
    //     ]);        

    //     $role = Role::select('id')->where('name', 'user')->first();

    //     $user->roles()->attach($role);
        
    //     $userId = DB::table('users')
    //     ->select(['id'])
    //     ->where([
    //         ['name', $request->input('name')],
    //         ['email', $request->input('email')]        
    //     ])->first();

    //     Log::info(" 1915 >>> user id: " . $userId->id);

    //     $uzerId = $userId->id;

    //     // return (['formId'=>$formId, 'userId'=>$userId->id]);
    //     return $uzerId;
        
    // }

    public function createTrainingSession(Request $request){

        Log::info(" 1145 ");

        Log::info(" 1150 >>> trainingSubject: " . $request->input('trainingSubject') . " >>> trainerNames: " . $request->input('trainerNames'));

        $form = form::create([
            'formName' => $request->input('trainingSubject')
        ]);

        $trainer = trainer::create([
            'trainerNames' => $request->input('trainerNames')
        ]);

        Log::info('dedans ...');

        echo "dedans";

    }

    // function redirectToAnswerPage(Request $request)
    // {
    //     $formId = $request->input('formId');

    //     return view('auth.register2')->with('formId', $formId);
    // }

    // function showRegistrationPage(Request $request)
    // {
        
    //     $formId = $request->input('formId');

    //     Log::info(" 821am ... formId: " . $formId);

    //     // return view('auth.register2')->with('formId', $formId);

    //     // return view('surveyWelcome2')->with('formId', $formId);

    //     return view('testMetronics');

    // }
}
