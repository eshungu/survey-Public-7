<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class sessionTrainee extends Model
{
    protected $table = 'sessionsTrainees';
    protected $primaryKey = 'sessionTraineeId';
    protected $fillable = [
        'sessionId',
        'traineeId'
    ];
}