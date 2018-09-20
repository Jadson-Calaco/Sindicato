<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
     public $timestamps = false;



      public function usuario(){
        return $this->belongsTo('App\Models\Usuario', 'user_id');
        
    }

}
