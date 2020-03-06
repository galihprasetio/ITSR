<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Location extends Model
{
    //
    use SoftDeletes;
    protected $table = 'location';
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'location',
        'created_by',
    ];
}
