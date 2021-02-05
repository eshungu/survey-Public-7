<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class DBrespondentResponse extends Model
{
	protected $table = 'DBrespondentResponses';
	protected $primaryKey = 'DBrespondentResponseId';
    protected $fillable = [		
		'traineeId',	
		'sessionId',	
		'questionId',
		'responseId',
		'responseValue',
		'responseText'
    ];
}