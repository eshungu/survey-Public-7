<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class formSection extends Model
{

    protected $table = 'formSections';
    protected $primaryKey = 'formSectionId';
    protected $fillable = [
        'formId',
        'formSectionName'
    ];


    public function questions() {
	    return $this->hasMany('App\Models\question', 'formSectionId');
    }

    public function form() {
        return $this->belongsTo('App\Models\form', 'formId');
	    // return $this->belongsTo(form::class);
        
	}
    
}