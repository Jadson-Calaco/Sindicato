@extends('layouts.Gentelella')

@section('content')
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Gerenciando Colônia de Férias</h3>
    </div>
</div>

    <div class="well">
        <form action="{{ url('/admin/editar_colina/'.$colonia->id)}}" method="post"  enctype="multipart/form-data">
            {!! csrf_field() !!}
            <div class="row">

                <div class="row">
                        <div class="form-group col-md-3">
                            <label for="categoria">Periodos:</label>
                            <div class="controls">
                                <select class="form-control"  id="materia" name="id_periodo">
                                    <option>Selecione a categoria</option>
                                        @foreach($periodo as $periodo)
                                            <option value="{{ $periodo->id }}"
                                                    @if( isset($colonia) && $colonia->periodo_id == $periodo->id)
                                                      selected
                                                    @endif
                                                    > {{$periodo->nome}}
                                            </option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="titulo">Nome</label>
                            <input value="{!! $colonia->nome !!}" name="nome" type="text" class="form-control" id="nome" placeholder="Nome">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="titulo">Matricula</label>
                            <input value="{!! $colonia->matricula !!}" name="matricula" type="text" class="form-control" id="matricula" placeholder="Matricula">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="titulo">Cpf</label>
                            <input value="{!! $colonia->cpf !!}" name="cpf" type="text" class="form-control" id="cpf" placeholder="Cpf">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="categoria">Bancos:</label>
                            <div class="controls">
                                <select class="form-control"  id="materia" name="id_banco">
                                    <option>Selecione o banco</option>
                                        @foreach($bancos as $bancos)
                                            <option value="{{ $bancos->id }}"
                                                    @if( isset($colonia) && $colonia->banco_id == $bancos->id)
                                                      selected
                                                    @endif
                                                    > {{$bancos->nome}}
                                            </option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="titulo">Agência</label>
                            <input value="{!! $colonia->agencia !!}" name="agencia" type="text" class="form-control" id="agencia" placeholder="Agência">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="titulo">Telefone</label>
                            <input value="{!! $colonia->telefone !!}" name="telefone" type="text" class="form-control" id="telefone" placeholder="Telefone">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="titulo">Regional</label>
                            <input value="{!! $colonia->regional !!}" name="regional" type="text" class="form-control" id="regional" placeholder="Regional">
                        </div>
                    </div>
                    
                    <br>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <button type="submit" class="btn btn-default">Salvar</button>
                        </div>
                    </div>
                </div>


            </div>
        </form>
    </div>


<div class="row">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <script>

        $('a[data-target="#delete-modal"]').on('click', function (e) {
            e.preventDefault();
            var id = $(this).data('id');
            $('span.nome').text(id);
            $('#myModal').modal('show');
            return false;
        });

    </script>

    

<script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
<script>
CKEDITOR.replace('summary-ckeditor');
</script>
@endsection
