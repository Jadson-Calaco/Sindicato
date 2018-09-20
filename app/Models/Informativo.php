<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Informativo extends Model
{
   protected  $table='informativo';
   public $timestamps = false;

    public function usuario() {
        return $this->belongsTo('App\Models\Usuario', 'user_id');
        
    }
}

