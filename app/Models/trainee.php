<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class trainee extends Model
{
    protected $table = 'trainees';

    protected $primaryKey = 'traineeId';

    protected $fillable = [
        'traineeNames',
        'email'
    ];

    public function sessions() {
		return $this->belongsToMany('app\Models\session', 'sessionsTrainees', 'traineeId', 'sessionId');
	}
    
}