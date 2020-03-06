<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class License extends Model
{
    //
    use SoftDeletes;
    protected $table  = 'licenses';
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'software_name',
        'id_category',
        'product_key',
        'seats',
        'id_manufacture',
        'license_name',
        'license_email',
        'id_supplier',
        'purchase_order',
        'purchase_cost',
        'purchase_date',
        'expiration_date',
        'termination_date',
        'notes',
        'created_by',
    ];
}
