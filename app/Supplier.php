<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Supplier extends Model
{
    //
    use SoftDeletes;
    protected $table = 'supplier';
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'supplier_name',
        'address' ,
        'zip' ,
        'contact_name' ,
        'phone' ,
        'email', 
        'city' ,
        'state',
        'country' ,
        'created_by'
    ];
}
