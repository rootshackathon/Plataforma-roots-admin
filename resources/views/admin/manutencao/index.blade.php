@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-5 col-8 align-self-center">
            <h4 class="text-themecolor m-b-0 m-t-0">Manutenção</h4>
        </div>
        <div class="col-md-7 col-4 align-self-center col-12">
            <div class="d-flex m-t-10 justify-content-end">
                <div class="d-flex m-r-20 m-l-10">
                    <a href="/manutencao/criar" class="btn btn-info">
                        Novo
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mt-2">
            <form method="get" action="/manutencao">
                <div class="row">
                    <div class="col-md-3">
                        <select class="form-control" id="codigo_tipo_manutencao" name="codigo_tipo_manutencao">
                            <option value="">Selecione tipo manutenção</option>    
                            @foreach ($listaTipoManutencao as $itemTipoManutencao)
                                <option value="{{ $itemTipoManutencao->codigo }}">{{ $itemTipoManutencao->descricao }}</option>    
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select class="form-control" id="status_manutencao" name="status_manutencao">
                            <option value="">Selecione a situação</option>    
                            @foreach ($listaStatusManutencao as $itemStatusManutencao)
                                <option value="{{ $itemStatusManutencao['codigo'] }}">{{ $itemStatusManutencao['descricao'] }}</option>    
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group footable-filtering-search">
                            <div class="input-group">
                                <input type="text" class="form-control" maxlength="80" placeholder="Descrição..."
                                     name="filtro" autocomplete="off">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-info">
                                        Pesquisar
                                    </button>
                                </div>
                                <div class="input-group-append d-none d-sm-block">
                                    <a href="/manutencao" class="btn btn-block btn-outline-secondary">Listar todos</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-12 mt-2">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive m-t-10">
                        <table class="table table-striped" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Descrição</th>
                                    <th>Data</th>
                                    <th>Tipo</th>
                                    <th>Árvore</th>
                                    <th class="text-center">Situação</th>
                                    <th class="text-center">Abir no mapa</th>
                                    <th class="text-center">Opções</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($listaManutencao as $item)
                                    <tr>
                                        <td>{{ $item->descricao }}</td>
                                        <td>{{ \App\Helpers\Util::ConverteData($item->data) }}</td>
                                        <td>{{ $item->tipoManutencao->descricao }}</td>
                                        <td>{{ $item->arvore->descricao }}</td>
                                        <td class="text-center">
                                            {!! \App\Helpers\Util::StatusLabelManutencao($item->status_manutencao)  !!}
                                        </td>
                                        <td class="text-center">
                                            <a href="/monitoramento?lat={{$item->arvore->latitude}}&lng={{$item->arvore->longitude}}" class="text-info" target="_blank">
                                                <i class="fas fa-map-marker-alt"></i>
                                            </a>
                                        </td>
                                        <td class="text-center">
                                            <a href="/manutencao/mostrar/{{ $item->codigo }}" class="btn btn-outline-secondary btn-sm">
                                                Editar
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>    
                        </table>
                    </div>     
                </div>
            </div>
        </div>
    </div>
</div>
@endsection