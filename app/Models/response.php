<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class response extends Model
{
    
    protected $table = 'responses';
    protected $primaryKey = 'responseId';
    protected $fillable = [
        'questionId',
        'responseContent',
        'responseValue',
        'subtotal',
        'percentage',
        'totalNumberOfRatings'
    ];

    public function question() {
	    return $this->belongsTo('app\Models\question');
    }

    public function rating() {
	    return $this->hasOne('app\Models\rating');
    }
    
    public function getRating(){
        // $this->response
    }
}
