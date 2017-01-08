<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Messageries extends Model
{
   protected $fillable = [ 'sender_id',
       'recipient_id',
        'message', 'lu'];
}
