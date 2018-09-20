<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class SegurancaBancariaController extends Controller
{
    public function index(){
        $pag="Segurança Bancaria";
        
        $ocorrencias = DB::table('seguranca as s')
        ->selectRaw("s.banco as banco")->Distinct()
        ->selectRaw("(SELECT count(*) FROM `seguranca` as s1 WHERE  s1.ocorrencia = 'Arrombamento' and s1.ano = s.ano and s1.banco = s.banco ) as Arrombamento")
        ->selectRaw("(SELECT count(*)FROM `seguranca` as s2 WHERE  s2.ocorrencia = 'Assalto' and s2.ano = s.ano and s2.banco = s.banco) as Assalto")
        ->selectRaw("(SELECT count(*)FROM `seguranca` as s3 WHERE  s3.ocorrencia = 'Explosão' and s3.ano = s.ano and s3.banco = s.banco) as Explosao")
        ->selectRaw("(SELECT count(*)FROM `seguranca` as s4 WHERE  s4.ocorrencia = 'Saidinha' and s4.ano = s.ano and s4.banco = s.banco) as Saidinha")
        ->selectRaw("(SELECT count(*)FROM `seguranca` as s5 WHERE  s5.ocorrencia = 'Tentativa' and s5.ano = s.ano and s5.banco = s.banco)as Tentativa")
        ->selectRaw("(SELECT count(*)FROM `seguranca` as s1 WHERE  s1.ano = s.ano and s1.banco = s.banco ) as PorBanco")
        ->selectRaw("(SELECT count(*)FROM `seguranca` as s1 WHERE  s1.ocorrencia = 'Arrombamento' and s1.ano = s.ano) as GeralArrombamento")
        ->selectRaw("(SELECT count(*)FROM `seguranca` as s2 WHERE  s2.ocorrencia = 'Assalto' and s2.ano = s.ano)as GeralAssalto")
        ->selectRaw("(SELECT count(*)FROM `seguranca` as s3 WHERE  s3.ocorrencia = 'Explosão' and s3.ano = s.ano)as GeralExplosao")
        ->selectRaw("(SELECT count(*)FROM `seguranca` as s4 WHERE  s4.ocorrencia = 'Saidinha' and s4.ano = s.ano)as GeralSaidinha")
        ->selectRaw("(SELECT count(*)FROM `seguranca` as s5 WHERE  s5.ocorrencia = 'Tentativa' and s5.ano = s.ano)as GeralTentativa")
        ->selectRaw("(SELECT count(*)FROM `seguranca` as s6 WHERE s6.ano = s.ano)as Total")
        ->where('s.ano','2014')
        ->orderBy('s.ano','DESC')
        ->get();
       
        
        $modalidades = DB::table('seguranca as s')
        ->selectRaw("s.ocorrencia as ocorrencia")->Distinct()
        ->selectRaw("(SELECT count(*)FROM `seguranca` as s1 WHERE  s1.ano = '2014' and s1.ocorrencia = s.ocorrencia ) as casoOcorrenciasPorAno1 ")
        ->selectRaw("(SELECT count(*)FROM `seguranca` as s1 WHERE  s1.ano = '2015' and s1.ocorrencia = s.ocorrencia ) as casoOcorrenciasPorAno2 ")
        ->selectRaw("(SELECT count(*)FROM `seguranca` as s1 WHERE  s1.ano = '2016' and s1.ocorrencia = s.ocorrencia ) as casoOcorrenciasPorAno3 ")
        ->selectRaw("(SELECT count(*)FROM `seguranca` as s1 WHERE  s1.ano = '2017' and s1.ocorrencia = s.ocorrencia ) as casoOcorrenciasPorAno4 ")
        ->selectRaw("(SELECT count(*)FROM `seguranca` as s1 WHERE  s1.ano = '2018' and s1.ocorrencia = s.ocorrencia ) as casoOcorrenciasPorAno5 ")
        ->selectRaw("(SELECT count(*)FROM `seguranca` as s1 WHERE  s1.ocorrencia = s.ocorrencia and s1.ano >= '2014' ) as PorOcorrencia ")
        ->selectRaw("(SELECT count(*)FROM `seguranca` as s1 WHERE  s1.ano = '2014' ) as casosPorAno1 ")
        ->selectRaw("(SELECT count(*)FROM `seguranca` as s1 WHERE  s1.ano = '2015' ) as casosPorAno2 ")
        ->selectRaw("(SELECT count(*)FROM `seguranca` as s1 WHERE  s1.ano = '2016' ) as casosPorAno3 ")
        ->selectRaw("(SELECT count(*)FROM `seguranca` as s1 WHERE  s1.ano = '2017' ) as casosPorAno4 ")
        ->selectRaw("(SELECT count(*)FROM `seguranca` as s1 WHERE  s1.ano = '2018' ) as casosPorAno5 ")
        ->selectRaw("(SELECT count(*)FROM `seguranca` as s1 WHERE  s1.ano >= '2014')as total")
        ->whereIn('s.ocorrencia', ['Arrombamento' , 'Assalto' , 'Explosão' , 'Saidinha' ,'Tentativa' ])
        ->orderBy('s.ocorrencia','ASC')
        ->get();
        
        $bancos = DB::table('seguranca as s')
        ->selectRaw("s.banco as banco")->Distinct()
        ->selectRaw("(SELECT count(*)FROM `seguranca` as s1 WHERE  s1.ano = '2014' and s1.banco = s.banco ) as casosPorAnoDoBanco1 ")
        ->selectRaw("(SELECT count(*)FROM `seguranca` as s1 WHERE  s1.ano = '2015' and s1.banco = s.banco ) as casosPorAnoDoBanco2 ")
        ->selectRaw("(SELECT count(*)FROM `seguranca` as s1 WHERE  s1.ano = '2016' and s1.banco = s.banco ) as casosPorAnoDoBanco3 ")
        ->selectRaw("(SELECT count(*)FROM `seguranca` as s1 WHERE  s1.ano = '2017' and s1.banco = s.banco ) as casosPorAnoDoBanco4 ")
        ->selectRaw("(SELECT count(*)FROM `seguranca` as s1 WHERE  s1.ano = '2018' and s1.banco = s.banco ) as casosPorAnoDoBanco5 ")
        ->selectRaw("(SELECT count(*)FROM `seguranca` as s1 WHERE  s1.banco = s.banco and s1.ano >= '2014' ) as PorBanco ")
        ->selectRaw("(SELECT count(*)FROM `seguranca` as s1 WHERE  s1.ano = '2014' ) as casosPorAno1 ")
        ->selectRaw("(SELECT count(*)FROM `seguranca` as s1 WHERE  s1.ano = '2015' ) as casosPorAno2 ")
        ->selectRaw("(SELECT count(*)FROM `seguranca` as s1 WHERE  s1.ano = '2016' ) as casosPorAno3 ")
        ->selectRaw("(SELECT count(*)FROM `seguranca` as s1 WHERE  s1.ano = '2017' ) as casosPorAno4 ")
        ->selectRaw("(SELECT count(*)FROM `seguranca` as s1 WHERE  s1.ano = '2018' ) as casosPorAno5 ")
        ->selectRaw("(SELECT count(*)FROM `seguranca` as s1 WHERE  s1.ano >= '2014')as total")
        ->orderBy('s.banco','ASC')
        ->get();
        
        $cidades = DB::table('seguranca as s')
        ->selectRaw("s.id as id , s.banco as banco,s.cidade as cidade,s.ocorrencia as ocorrencia,DATE_FORMAT(s.dataOcorrido, '%d/%m/%Y') as dataOcorrido")
        ->orderBy('s.dataOcorrido','DESC')
        ->get();
        
        return view('site.home.seguranca_bancaria.index',compact('pag',$pag))
        ->with('ocorrencias', $ocorrencias)
        ->with('modalidades', $modalidades)
        ->with('bancos', $bancos)
        ->with('cidades', $cidades);
       
    }
}
