<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Amis extends Model
{
    protected $fillable = [ 'user_id',
       'freind_id','confirm'
      ];
}
