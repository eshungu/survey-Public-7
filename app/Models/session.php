<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class session extends Model
{
    protected $table = 'sessions';

    protected $primaryKey = 'sessionId';

    protected $fillable = [
        'sessionId',
        'trainerId',
        'sessionName'
    ];

    public function trainer()
    {
        return $this->belongsTo('app\Models\trainer');
    }

    public function trainees()
    {
        return $this->belongsToMany('app\Models\trainee', 'sessionsTrainees', 'sessionId', 'traineeId');
    }
}
