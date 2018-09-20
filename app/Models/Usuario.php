<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table='users';
    
    public function albegue(){
        
        return $this->hasOne('App\Models\Albergue');
    }
    
    public function anuncios(){
        
        return $this->hasOne('App\Models\Anuncios');
    }
    
    public function bancos(){
        
        return $this->hasOne('App\Models\Bancos');
    }
    
    public function categorias(){
        
        return $this->hasOne('App\Models\Categorias');
    }
    
    public function colonia(){
        
        return $this->hasOne('App\Models\Colonia');
    }
    
    public function convenios(){
        
        return $this->hasOne('App\Models\Convenios');
    }
    
    public function diretoria(){
        
        return $this->hasOne('App\Models\Diretoria');
    }
    
    public function noticias(){
        
        return $this->hasOne('App\Models\Noticias');
    }
    
    public function periodo(){
        
        return $this->hasOne('App\Models\Periodo');
    }
    
    public function sindicato(){
        
        return $this->hasOne('App\Models\Sindicato');
    }
    
    public function equipes(){
        
        return $this->hasOne('App\Models\Equipes');
    }
    
    public function regulamento(){
        
        return $this->hasOne('App\Models\Regulamento');
    }
    
    public function eventos(){
        
        return $this->hasOne('App\Models\Eventos');
    }
    
    public function estatuto(){
        
        return $this->hasOne('App\Models\Estatuto');
    }
    
    public function acordos(){
        
        return $this->hasOne('App\Models\Acordo');
    }
    
    public function agendas(){
        
        return $this->hasOne('App\Models\Agenda');
    }
    
    public function informativos(){
        
        return $this->hasOne('App\Models\Informativo');
    }


    public function assessoriaJuridica(){
      
        return $this->hasOne('App\Models\AssessoriaJuridica');
    }

    public function videos(){
      
        return $this->hasOne('App\Models\Video');
    }

    public function galerias(){
        
        return $this->hasOne('App\Models\Galeria');
    }
    
}
