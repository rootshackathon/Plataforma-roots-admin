@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-5 col-8 align-self-center">
            <h4 class="text-themecolor m-b-0 m-t-0">Árvores</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form action="/arvores/gravar" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="codigo" value="{{ ($arvore) ? $arvore->codigo : null }}" />
                
                <div class="row">
                    <div class="col-md-2">
                        <div class="card mt-2">
                            <div class="card-body">
                                <div class="row justify-content-center">
                                    <div class="text-center">
                                        <object style="width: 120px; max-width: 120px;" data="/assets/imagens/icone-arvoew.svg" type="image/svg+xml"></object>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="card mt-2">
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label id="labelDescricao" for="">Descricao <span>*</span></label>
                                        <input type="text" required maxlength="100" class="form-control" id="descricao" name="descricao" autocomplete="off" value="{{ ($arvore) ? $arvore->descricao : null }}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label id="labelEspecie" for="">Espécie <span>*</span></label>
                                        <select class="form-control" id="codigo_especie" name="codigo_especie">
                                            <option value="">Selecione</option>    
                                            @foreach ($listaEspecie as $itemEspecie)
                                                <option @if(($arvore) && $itemEspecie->codigo == $arvore->especie->codigo) selected  @endif value="{{ $itemEspecie->codigo }}">{{ $itemEspecie->descricao }}</option>    
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label id="labelRegiao" for="">Região <span>*</span></label>
                                        <select class="form-control" id="codigo_regiao" name="codigo_regiao">
                                            <option value="">Selecione</option>    
                                            @foreach ($listaRegiao as $itemRegiao)
                                                <option @if(($arvore) && $itemRegiao->codigo == $arvore->regiao->codigo) selected  @endif value="{{ $itemRegiao->codigo }}">{{ $itemRegiao->descricao }}</option>    
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label id="labelLatitude" for="">Latitude</label>
                                        <input type="text" required maxlength="60" class="form-control" id="latitude" name="latitude" autocomplete="off" value="{{ ($arvore) ? $arvore->latitude : null }}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label id="labelLongitude" for="">Longitude</label>
                                        <input type="text" required maxlength="60" class="form-control" id="longitude" name="longitude" autocomplete="off" value="{{ ($arvore) ? $arvore->longitude : null }}">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label id="labelPessoa" for="">Pessoa <span>*</span></label>
                                        <select class="form-control" id="codigo_pessoa" name="codigo_pessoa">
                                            <option value="">Selecione</option>    
                                            @foreach ($listaUsuario as $itemUsuario)
                                                <option @if(($arvore) && $itemUsuario->pessoa->codigo == $arvore->pessoa->codigo) selected  @endif value="{{ $itemUsuario->pessoa->codigo }}">{{ $itemUsuario->nome }}</option>    
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label id="labelPontoReferencia" for="">Ponto de Referência</label>
                                        <textarea type="text" required maxlength="255" rows="3" class="form-control" id="ponto_referencia" name="ponto_referencia" autocomplete="off">{{ ($arvore) ? $arvore->ponto_referencia : null }}</textarea>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label id="labelRegiao" for="">Status <span>*</span></label>
                                        <select class="form-control" id="status" name="status">
                                            <option value="">Selecione</option>    
                                            <option @if(($arvore) && $arvore->status == 0) selected  @endif value="0">Inativo</option>
                                            <option @if(($arvore) && $arvore->status == 1) selected  @endif value="1">Ativo</option>    
                                        </select>
                                    </div>
                                    <div class="form-group col-md-12 btn-acoes-form">
                                        <button type="submit" class="btn btn-info">
                                            Salvar
                                        </button>
                                        <a href="/arvores" class="btn btn-outline-secondary">Cancelar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection