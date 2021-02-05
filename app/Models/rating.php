<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class rating extends Model
{
    
    protected $table = 'responses';
    protected $primaryKey = 'responseId';
    protected $fillable = [
        'questionId',
        'responseId',
        'subtotal',
        'percentage',
        'totalNumberOfRatings'
    ];

    public function response() {
	    return $this->belongsTo('app\Models\response');
    }
    
}
