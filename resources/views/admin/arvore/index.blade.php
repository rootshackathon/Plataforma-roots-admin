@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-5 col-8 align-self-center">
            <h4 class="text-themecolor m-b-0 m-t-0">Árvores</h4>
        </div>
        <div class="col-md-7 col-4 align-self-center col-12">
            <div class="d-flex m-t-10 justify-content-end">
                <div class="d-flex m-r-20 m-l-10">
                    <a href="/arvores/criar" class="btn btn-info">
                        Novo
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mt-2">
            <form method="get" action="/arvores">
                <div class="row">
                    <div class="col-md-2">
                        <select class="form-control" id="codigo_especie" name="codigo_especie">
                            <option value="">Selecione a espécie</option>    
                            @foreach ($listaEspecie as $itemEspecie)
                                <option value="{{ $itemEspecie->codigo }}">{{ $itemEspecie->descricao }}</option>    
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <select class="form-control" id="codigo_regiao" name="codigo_regiao">
                            <option value="">Selecione a região</option>    
                            @foreach ($listaRegiao as $itemRegiao)
                                <option value="{{ $itemRegiao->codigo }}">{{ $itemRegiao->descricao }}</option>    
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-8">
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
                                    <a href="/arvores" class="btn btn-block btn-outline-secondary">Listar todos</a>
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
                                    <th></th>
                                    <th>Descrição</th>
                                    <th>Espécie</th>
                                    <th>Região</th>
                                    <th>Latitude</th>
                                    <th>Longitude</th>
                                    <th class="text-center">Abir no mapa</th>
                                    <th class="text-center">Opções</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($listaArvore as $item)
                                    <tr>
                                        <td style="max-width: 40px;">
                                            <object 
                                                style="width: 38px; max-width: 38px;" 
                                                data="{{ ($item->status) ? '/assets/imagens/icone-arvoew.svg' : '/assets/imagens/icone-arvoew-cinza.svg' }}" 
                                                type="image/svg+xml">
                                            </object>
                                        </td>
                                        <td>{{ $item->descricao }}</td>
                                        <td>{{ $item->especie->descricao }}</td>
                                        <td>{{ $item->regiao->descricao }}</td>
                                        <td>{{ $item->latitude }}</td>
                                        <td>{{ $item->longitude }}</td>
                                        <td class="text-center">
                                            <a href="/monitoramento?codigo={{$item->codigo}}&lat={{$item->latitude}}&lng={{$item->longitude}}" class="text-info" target="_blank">
                                                <i class="fas fa-map-marker-alt"></i>
                                            </a>
                                        </td>
                                        <td class="text-center">
                                            <a href="/arvores/mostrar/{{ $item->codigo }}" class="btn btn-outline-secondary btn-sm">
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