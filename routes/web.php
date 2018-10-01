<?php

Auth::routes();
/*Rotas simples do site-BANCARIOSPI*/

Route::group(['namespace'=>'Site'], function(){
    
    Route::get('/','SiteController@index');
    //busca
    Route::get('search','NoticiasController@search');
    //Route::get('teste','SiteController@teste');
    
    /*SEGURANCA BANCARIA*/
    Route::get('seguranca-bancaria','SegurancaBancariaController@index');
    
    /*ASSEDIO MORAL*/
    Route::get('assedio','AssedioController@index');
    Route::post('assedio','AssedioController@store');
    
    /*PUBLICACOES/INFORMATIVOS*/
    Route::get('ver-noticia/{id}/{titulo}','NoticiasController@ver_noticia');
    
    /*PUBLICACOES/INFORMATIVOS
    Route::get('teste','SiteController@teste');
    
    /*GALERIA DE VIDEOS
    Route::get('teste','SiteController@teste');
    
    /*GALERIA DE FOTOS
    Route::get('teste','SiteController@teste');
    /*ACESSORIA JURIDICA [ATENDIMENTOS]
    Route::get('teste','SiteController@teste');
    
    /*CONVENIOS*/
    //INFORMATIVOS
    Route::get('/informativos','InformativoController@index');
    
    //O sindicato
    Route::get('diretoria','SiteController@diretoria');
    Route::get('estatuto','SiteController@estatuto');
    Route::get('sindicato','SiteController@sindicato');
    
    Route::get('associe-se','AssociadoController@associe');
    Route::post('associe-se','AssociadoController@store');
    Route::post('buscarSocio','AssociadoController@buscarDados');
    
    Route::get('imposto','ImpostoController@imposto');
    Route::post('imposto','ImpostoController@store');
    Route::get('imposto_sindical_pdf', 'ImpostoController@gerarPdfImposto');
    
    Route::get('reatituicao','ReatituicaoController@index');
    Route::post('reatituicao','ReatituicaoController@store');
    Route::get('reatituicao_pdf','ReatituicaoController@gerarPdfReatituicao');
       
    Route::get('contato','SiteController@contato');
    Route::post('contato','SiteController@storeContato');

    //post = noticias
    Route::get('noticias','NoticiasController@geral');
    Route::get('noticias-nacionais','NoticiasController@nacionais');
    Route::get('noticias-locais','NoticiasController@local');
    Route::get('esportes','NoticiasController@esporte');
    Route::get('eventos','NoticiasController@eventos');
    /* Servicos*/
    Route::get('atendimentos','SiteController@atendimentos');
    Route::get('homologacoes','SiteController@homologar');
    Route::get('assedio-moral','SiteController@assedio');
    Route::get('agenda-advogadas','SiteController@agenda_adv');
    //colonia de ferias
    Route::get('/inscreva-se','ColoniaController@index');
    Route::post('/buscarDados','ColoniaController@buscarDados');
    Route::post('/inscreva-se','ColoniaController@store');
    
    //  Route::resource('/index', 'ColoniaController@store');
    Route::get('convenios','SiteController@convenios');
    Route::get('agenda-cultural','SiteController@agenda');
    Route::get('albergue','SiteController@albergue');
    Route::get('auditorio','SiteController@auditorio');
    Route::get('espaco-cultural','SiteController@espaco_cultural');
    // Route::get('espaco-cultural','SiteController@espaco_cultural');
    /*ouvidoria geral do seebfpi*/
    Route::get('/ouvidoria','OuvidoriaController@ouvidoria');
    Route::post('/ouvidoria','OuvidoriaController@store');
    //
    
    Route::get('galeria-videos', 'GaleriaController@getVideos');
    Route::get('fotos/{id}', 'GaleriaController@getFotos');
    Route::get('galeria-fotos', 'GaleriaController@getGalerias');
});
    /*rotas do painel*/
    $this->group(['middleware' =>['auth'], 'namespace' => 'Admin','prefix' => 'admin'], function() {
        Route::get('/', 'PainelController@index')->name('painel.index');
        
        //update,delete,create eand show - ACORDOS E
        //Route::get('/acordos', 'SindicatoController@acordos');
        
        //update,delete,create eand show - ACESSORIA JURIDICA
        //Route::get('/juridico', 'SindicatoController@juridico');
        
        //update,delete,create eand show - ASSEDIOS
        Route::get('/assedios', 'SindicatoController@assedios');
        
        //update,delete,create eand show - OUVIDORIA GERAL
        Route::get('/ouvidoria', 'SindicatoController@ouvidoria');
        
        //update,delete,create eand show - SEGURANCA-BANCARIA
        Route::get('/seguranca-bancaria', 'SindicatoController@segurancaBancaria');
        Route::post('/seguranca-bancaria', 'SindicatoController@storeSegurancaBancaria');
        Route::get('/deletar_seguranca/{id}', 'SindicatoController@destroySegurancaBancaria');
        Route::get('/editar_seguranca/{id}', 'SindicatoController@editSegurancaBancaria');
        Route::post('/editar_seguranca/{id}', 'SindicatoController@updateSegurancaBancaria');
        
        //update,delete,create eand show - FOTOS
        //Route::get('/fotos', 'FotoController@index');
        //update,delete,create e show - VIDEOS
        // Route::get('/videos', 'VideoController@index');
        //update,delete,create e show - AGENDA
        // Route::get('/agenda', 'AgendaController@index');
        
        ////update,delete,create e  show - sindicato
        Route::get('/historia', 'SindicatoController@index');
        
        ////update,delete,create e  show - Estatuto
        Route::get('/estatuto', 'SindicatoController@estatuto');
        
        ////update,delete,create e  show - Convocacao
        //Route::get('historia', 'SindicatoController@index');
        
        // CRUD DE BANCO
        Route::get('/bancos', 'BancoController@index');
        Route::get('/deletar_bancos/{id}', 'BancoController@destroy');
        Route::get('/editar_bancos/{id}', 'BancoController@edit');
        Route::post('/bancos', 'BancoController@store');
        Route::post('/editar_bancos/{id}', 'BancoController@update');
        Route::get('/status_bancos/{id}', 'BancoController@mudarStatus');
        
        // CRUD DE CATEGORIA
        Route::get('/categoria', 'CategoriaController@index');
        Route::get('/deletar_categoria/{id}', 'CategoriaController@destroy');
        Route::get('/editar_categoria/{id}', 'CategoriaController@edit');
        Route::post('/categoria', 'CategoriaController@store');
        Route::post('/editar_categoria/{id}', 'CategoriaController@update');
        Route::get('/status_categoria/{id}', 'CategoriaController@mudarStatus');
        
        // CRUD DE COLONIA
        Route::get('/colonia', 'ColoniaController@index');
        Route::get('/deletar_colonia/{id}', 'ColoniaController@destroy');
        Route::get('/editar_colonia/{id}', 'ColoniaController@edit');
        Route::post('/colonia', 'ColoniaController@store');
        Route::post('/editar_colonia/{id}', 'ColoniaController@update');
        
        // CRUD DE PERIODO
        Route::get('/periodo', 'PeriodoController@index');
        Route::get('/deletar_periodo/{id}', 'PeriodoController@destroy');
        Route::get('/editar_periodo/{id}', 'PeriodoController@edit');
        Route::post('/periodo', 'PeriodoController@store');
        Route::post('/editar_periodo/{id}', 'PeriodoController@update');
        Route::get('/status_periodo/{id}', 'PeriodoController@mudarStatus');
        
        // CRUD DE NOTICIAS
        Route::get('/noticias','NoticiasController@noticias');
        Route::post('/criar_noticia', 'NoticiasController@criar_noticia');
        Route::post('/editar_noticia/{id}', 'NoticiasController@update');
        Route::get('visualizar_noticia/{id}','NoticiasController@show');
        Route::get('/index_noticias', 'NoticiasController@index');
        Route::get('/editar_noticia/{id}', 'NoticiasController@edit')->name('admin.edit');
        Route::get('/deletar_noticia/{id}', 'NoticiasController@destroy')->name('admin.destroy');
        Route::get('/status_noticia/{id}', 'NoticiasController@mudarStatus')->name('admin.mudarStatus');
        Route::post('/dadosNoticias', 'NoticiasController@getDados');
        
        // CRUD DE DIRETORIA
        Route::get('/diretoria', 'DiretoriaController@index');
        Route::get('/deletar_diretoria/{id}', 'DiretoriaController@destroy');
        Route::get('/editar_diretoria/{id}', 'DiretoriaController@edit');
        Route::post('/diretoria', 'DiretoriaController@store');
        Route::post('/editar_diretoria/{id}', 'DiretoriaController@update');
        Route::get('/status_diretoria/{id}', 'DiretoriaController@mudarStatus');
        
        // CRUD DE CONVENIOS
        Route::get('/convenio', 'ConveniosController@index');
        Route::get('/deletar_convenio/{id}', 'ConveniosController@destroy');
        Route::get('/editar_convenio/{id}', 'ConveniosController@edit');
        Route::post('/convenio', 'ConveniosController@store');
        Route::post('/editar_convenio/{id}', 'ConveniosController@update');
        Route::get('/status_convenio/{id}', 'ConveniosController@mudarStatus');
        
        // CRUD DE ALBERGUE
        Route::get('/albergue', 'AlbergueController@albergue');
        Route::get('/deletar_albergue/{id}', 'AlbergueController@destroy');
        Route::get('/editar_albergue/{id}', 'AlbergueController@edit');
        Route::post('/albergue', 'AlbergueController@store');
        Route::post('/editar_albergue/{id}', 'AlbergueController@update');
        
        // CRUD DE SINDICATO
        Route::get('/sindicato', 'SindicatoController@index');
        Route::get('/deletar_sindicato/{id}', 'SindicatoController@destroy');
        Route::get('/editar_sindicato/{id}', 'SindicatoController@edit');
        Route::post('/sindicato', 'SindicatoController@store');
        Route::post('/editar_sindicato/{id}', 'SindicatoController@update');
        
        //update,delete,create eand show - ANUNCIOS/PROGANDA
        Route::get('/anuncios', 'AnunciosController@index');
        Route::get('/deletar_anuncios/{id}', 'AnunciosController@destroy');
        Route::get('/editar_anuncios/{id}', 'AnunciosController@edit');
        Route::post('/anuncios', 'AnunciosController@store');
        Route::post('/editar_anuncios/{id}', 'AnunciosController@update');
        Route::get('/status_anuncios/{id}', 'AnunciosController@mudarStatus');
        
        // CRUD DE EQUIPE
        Route::get('/equipe', 'EsportesController@equipe');
        Route::get('/deletar_equipe/{id}', 'EsportesController@destroyEquipe');
        Route::get('/editar_equipe/{id}', 'EsportesController@editEquipe');
        Route::post('/equipe', 'EsportesController@storeEquipe');
        Route::post('/editar_equipe/{id}', 'EsportesController@updateEquipe');
        Route::get('/status_equipe/{id}', 'EsportesController@mudarStatusEquipe');
        
        // CRUD DE REGULAMENTO ESPORTE
        Route::get('/regulamento', 'EsportesController@regulamento');
        Route::get('/deletar_regulamento/{id}', 'EsportesController@destroyRegulamento');
        Route::get('/editar_regulamento/{id}', 'EsportesController@editRegulamento');
        Route::post('/regulamento', 'EsportesController@storeRegulamento');
        Route::post('/editar_regulamento/{id}', 'EsportesController@updateRegulamento');
        
        // CRUD DE EVENTOS ESPORTE
        Route::get('/eventos', 'EsportesController@eventos');
        Route::get('/deletar_eventos/{id}', 'EsportesController@destroyEventos');
        Route::get('/editar_eventos/{id}', 'EsportesController@editEventos');
        Route::post('/eventos', 'EsportesController@storeEventos');
        Route::post('/editar_eventos/{id}', 'EsportesController@updateEventos');
        Route::get('/status_eventos/{id}', 'EsportesController@mudarStatusEventos');
        
        // Ouvidoria
        Route::get('/ouvidoria','SindicatoController@indexOuvidoria');
        Route::get('/deletar_ouvidoria/{id}', 'SindicatoController@destroyOuvidoria');
        
        // CRUD ESTATUTO SEEBFPI
        Route::get('/estatuto', 'EstatutoController@index');
        Route::get('/deletar_estatuto/{id}', 'EstatutoController@destroy');
        Route::get('/editar_estatuto/{id}', 'EstatutoController@edit');
        Route::post('/estatuto', 'EstatutoController@store');
        Route::post('/editar_estatuto/{id}', 'EstatutoController@update');
        
        // Assedio
        Route::get('/assedios','SindicatoController@assedios');
        Route::get('/deletar_assedio/{id}', 'SindicatoController@destroyAssedio');
        
        // S�cio
        Route::get('/associados','SindicatoController@socios');
        Route::get('/deletar_socio/{id}', 'SindicatoController@destroySocio');
        Route::get('/gerar_pdf_socio/{id}', 'SindicatoController@gerarPdfSocio');
        
        
        //update,delete,create eand show - ACORDOS E
        //   Route::get('/acordos', 'SindicatoController@acordos');
        Route::get('/acordos', 'AcordoController@create');
        Route::get('/acordo/editar/{id}', 'AcordoController@edit');
        Route::post('/acordo/salvar','AcordoController@store');
        Route::post('/acordo/atualizar/{id}','AcordoController@update');
        Route::get('/acordo/excluir/{id}', 'AcordoController@destroy');
        Route::get('/acordo/{id}', 'AcordoController@mudarStatus');
        
        //update,delete,create eand show - AGENDA
        Route::get('/agendas', 'AgendaController@create');
        Route::get('/agendas/editar/{id}', 'AgendaController@edit');
        Route::post('/agendas/salvar','AgendaController@store');
        Route::post('/agendas/atualizar/{id}','AgendaController@update');
        Route::get('/agendas/excluir/{id}', 'AgendaController@destroy');
        Route::get('/agendas/{id}', 'AgendaController@mudarStatus');
        
        //update,delete,create eand show - ACESSORIA JURIDICA
        // Route::get('/juridico', 'SindicatoController@juridico');
        Route::get('/juridico', 'AssessoriaJuridicaController@create');
        Route::get('/juridico/editar/{id}', 'AssessoriaJuridicaController@edit');
        Route::post('/juridico/salvar','AssessoriaJuridicaController@store');
        Route::post('/juridico/atualizar/{id}','AssessoriaJuridicaController@update');
        Route::get('/juridico/excluir/{id}', 'AssessoriaJuridicaController@destroy');
        Route::get('/juridico/{id}', 'AssessoriaJuridicaController@mudarStatus');
        
        //update,delete,create eand show - Informativo
        Route::get('/informativos', 'InformativoController@create');
        Route::post('/informativos/salvar', 'InformativoController@store');
        Route::post('/informativos/atualizar/{id}', 'InformativoController@update');
        Route::get('/informativos/editar/{id}', 'InformativoController@edit');
        Route::get('/informativos/excluir/{id}', 'InformativoController@destroy');
        Route::get('/informativos/{id}', 'InformativoController@mudarStatus');
        
        //update,delete,create eand show - Video
        Route::get('/galeria/videos', 'VideoController@create');
        Route::post('/galeria/videos/salvar', 'VideoController@store');
        Route::post('/galeria/videos/atualizar/{id}', 'VideoController@update');
        Route::get('/galeria/videos/editar/{id}', 'VideoController@edit');
        Route::get('/galeria/videos/excluir/{id}', 'VideoController@destroy');
        Route::get('/galeria/videos/{id}', 'VideoController@mudarStatus');
        
        
        //update,delete,create eand show - Video
        Route::get('/galeria/fotos', 'GaleriaController@create');
        Route::post('/galeria/fotos/salvar', 'GaleriaController@store');
        Route::post('/galeria/fotos/atualizar', 'GaleriaController@update');
        Route::get('/galeria/fotos/editar/{id}', 'GaleriaController@edit');
        Route::get('/galeria/fotos/excluir/{id}', 'GaleriaController@destroy');
        Route::get('/galeria/fotos/{id}', 'GaleriaController@mudarStatus');
        Route::get('/galeria/fotos/adicionarFotos/{id}', 'FotoController@index');
        Route::post('/galeria/fotos/salvarFotos', 'FotoController@store');
        Route::post('/galeria/fotos/fotoCapa/{id}', 'FotoController@fotoCapa');
        Route::post('/galeria/fotos/excluirFoto/{id}', 'FotoController@destroy');
        
        
        
        
        
        //update,delete,create e and show -Auditorio
        // Route::get('/juridico', 'SindicatoController@juridico');
        Route::get('/auditorios', 'AuditorioController@create');
        Route::get('/auditorios/editar/{id}', 'AuditorioController@edit');
        Route::post('/auditorios/salvar','AuditorioController@store');
        Route::post('/auditorios/atualizar/{id}','AuditorioController@update');
        Route::get('/auditorios/excluir/{id}', 'AuditorioController@destroy');
        Route::get('/auditorios/{id}', 'AuditorioController@mudarStatus');
        
        // Contato
        Route::get('/contato','ContatoController@indexContato');
        Route::get('/deletar_contato/{id}', 'ContatoController@destroyContato');
        
        // Imposto
        Route::get('/imposto','ImpostoController@impostos');
        Route::get('/deletar_imposto/{id}', 'ImpostoController@destroy');
        Route::get('/gerar_pdf_imposto/{id}', 'ImpostoController@gerarPdf');
        Route::get('/detalhar_imposto/{id}', 'ImpostoController@detalhar');
        
        // Reatituicao
        Route::get('/reatituicao','ReatituicaoController@reatituicao');
        Route::get('/deletar_reatituicao/{id}', 'ReatituicaoController@destroy');
        Route::get('/gerar_pdf_reatituicao/{id}', 'ReatituicaoController@gerarPdf');
        Route::get('/detalhar_reatituicao/{id}', 'ReatituicaoController@detalhar');
        
        
    });
        //Route::get('/home', 'HomeController@index');
        //Route::get('/admin', 'Admin\PainelController@index')->name('painel.index');
        /*Route::get('/home', 'Painel\PainelController@index');
         */
        Route::get('error', function () {
            return response()->view('error.404', [], 404);
        });
            
            Route::get('error', function () {
                return response()->view('errors.503', [], 503);
            });