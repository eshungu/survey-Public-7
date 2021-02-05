<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class UIquestionaire extends Model
{
        protected $fillable = [
            'questionId',
            'questionContent',
            'response0Content',
            'response1Content',
            'response2Content',
            'response3Content',
            'response4Content',
            'response5Content'
        ];
}