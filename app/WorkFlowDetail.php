<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WorkFlowDetail extends Model
{
    //
    use SoftDeletes;
    protected $table = 'work_flow_detail';
    protected $fillable = [
        'id_work_flow',
        'step_number',
        'status',
        'author',
        'sentBack',
        'check',
        'approve',
        'reject'
        ];
    public $timestamps = true;
    protected $dates = ['deleted_at'];
}
