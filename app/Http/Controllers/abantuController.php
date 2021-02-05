<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
Use Illuminate\Support\Facades\Log;

class abantuController extends Controller
{
    public function abantu(){

        //$users = User::all();

        //$users = User::paginate(10);

        /* .........21

        $users = [

            '0' => [
                'first name' => '1111111111',
                'last name' => '222222222',
                'location' => '3333333333'
            ],
            '1' => [
                'first name' => '444444444',
                'last name' => '5555555555',
                'location' => '66666666666'
            ]
    
        ];

        .........21 */
    
        //return $users;

        //return view('admin.users.index', compact('users'));

        Log::info(" 66xx ... ngeze muri abantu ");


        return view('abantu');

        Log::info(" 66xx ... nsohotse muri abantu ");

    }

    //------------------------------------------

    public function create(){

        //return 'create';
        return view('admin.users.create');

    }

    public function store(Request $request){

        User::create($request->all());

        return 'success';
        
        return $request->all();

    }

 

}
