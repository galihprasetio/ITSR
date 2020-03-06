<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Assets extends Model
{
    //
    use SoftDeletes;
    protected $table = 'assets';

    protected $fillable = [
        'id_manufacture',
        'asset_tag',
        'id_category',
        'serial',
        'asset_name',
        'order_number',
        'qty',
        'min_qty',
        'id_location',
        'created_by',
    ];
    protected $dates = ['deleted_at'];
}
