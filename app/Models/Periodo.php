<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Periodo extends Model
{
    protected $table='coloniadeferias_pre';
    public $timestamps = false;
    public function colonia(){
      
        return $this->hasMany('App\Models\Colonia');
    }
    
    public function usuario()
    {
        return $this->belongsTo('App\Models\Usuario', 'user_id');
        
    }
}
