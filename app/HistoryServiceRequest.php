<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistoryServiceRequest extends Model
{
    //
    protected $lable = 'service_request_history';
    protected $fillable = [
        'id_service_request',
        'id_user',
        'activity',
        'commentar',
        'activity_date'
    ];
}
