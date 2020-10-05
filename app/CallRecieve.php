<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CallRecieve extends Model
{
    //
    protected $fillable = [
        'location', 'equipment', 'idNumber', 'problem', 'ticket_number'
    ];
}
