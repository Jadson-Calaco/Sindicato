<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Convenios extends Model
{
    protected $table='convenios';
    public $timestamps = false;
    
    public function usuario()
    {
        return $this->belongsTo('App\Models\Usuario', 'user_id');
        
    }
}
