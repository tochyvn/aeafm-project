<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inscription extends Model {

    protected $fillable = [
        'formation_id', 'email'
    ];

    public function TypeFormation() {
        //relation entre formation et type de formation (1-n)
        return $this->hasMany('App\TypeFormation');
    }

    public function Formation() {
        //relation entre formation et type de formation (1-n)
        return $this->hasMany('App\Formation');
    }

}
