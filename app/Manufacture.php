<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Manufacture extends Model
{
    //
    use SoftDeletes;
    protected $table = 'manufacture';
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'manufacture',
        'url',
        'phone',
        'email',
        'created_by',
    ];
}
