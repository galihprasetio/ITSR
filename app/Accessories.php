<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Accessories extends Model
{
    //
    use SoftDeletes;
    
    protected $table = 'accessories';
    protected $fillable = [
        'id_manufacture',
        'accessories_name',
        'order_number',
        'warranty',
        'qty',
        'min_qty',
        'notes',
        'id_location',
        'image',
        'created_by',
    ];
    
}
