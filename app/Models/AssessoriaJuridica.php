<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AssessoriaJuridica extends Model
{
	public $timestamps = false;
    protected  $table="assessoriajuridicas";

    public function usuario(){
        return $this->belongsTo('App\Models\Usuario', 'user_id');
        
    }

    public function getJuridico($idUser){

        
    	//$assessoriajuridica=AssessoriaJuridica::where('user_id',idUser)->get();
         $assessoriajuridica=DB::table('assessoriajuridicas')->where('user_id',$idUser)->first();
         return $assessoriajuridica;
    }
}
