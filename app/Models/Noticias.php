<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Noticias extends Model
{
    public $timestamps = false;
     public function categorias()
    {
        return $this->belongsTo('App\Models\Categorias', 'categoria_id');
        
    }
    public function bancos()
    {
        return $this->belongsTo('App\Models\Bancos', 'banco_id');
        
    }
    
    public function usuario()
    {
        return $this->belongsTo('App\Models\Usuario', 'user_id');
        
    }
}
