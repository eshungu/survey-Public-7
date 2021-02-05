<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class trainer extends Model
{
	protected $table = 'trainers';
	
	protected $primaryKey = 'trainerId';

    protected $fillable = [

	'trainerNames'
	
	];

	public function sessions() {
		return $this->hasMany('app\Models\session');
	}

}
