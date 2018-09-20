<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
    protected $table='noticias_cat';
    public $timestamps = false;
    public function noticias(){
      
        return $this->hasMany('App\Models\Noticias');
    }
    
    public function usuario()
    {
        return $this->belongsTo('App\Models\Usuario', 'user_id');
        
    }
}
