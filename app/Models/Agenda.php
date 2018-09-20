<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    
    //protected $fillable=['local','nome','descricao','datal','hora','destaque','visitas','status'];
       public $timestamps = false;

      public function usuario(){
        return $this->belongsTo('App\Models\Usuario', 'user_id');
        
    }
}
