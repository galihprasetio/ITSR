<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiceRequest extends Model
{
    //
    use SoftDeletes;
    protected $table = 'service_request';
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'doc_number',
        'id_department',
        'id_requestor',
        'submit_date',
        'doc_status',
        'id_author',
        'subject',
        'description',
        'id_approver1',
        'date_approver1',
        'id_approver2',
        'date_approver2',
        'created_by'
    ];
}
