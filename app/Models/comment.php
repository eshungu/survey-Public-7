<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class comment extends Model
{
    
    protected $fillable = [
        'traineeId',
        'responseText',
        'traineeNames'
    ];

    public function question() {
	    return $this->belongsTo('app\Models\question');
    }

    public function form() {
	    return $this->belongsTo('app\Models\form');
    }

   
}
