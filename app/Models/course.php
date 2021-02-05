<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class course extends Model
{
    protected $table = 'courses';
    protected $fillable = [
        'courseId',
        'courseName',
        'courseField',
        'courseLevel',
        'courseAudience',
        'description',
        'isActive'
];
}
