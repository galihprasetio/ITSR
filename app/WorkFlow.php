<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WorkFlow extends Model
{
    //
    use SoftDeletes;
    protected $table = 'work_flow';
    protected $fillable = [
        'name',
        'id_department',
        
    ];
    public $timestamps = true;
    protected $dates = ['deleted_at'];
}
