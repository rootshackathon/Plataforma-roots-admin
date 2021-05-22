@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-5 col-8 align-self-center">
            <h4 class="text-themecolor m-b-0 m-t-0">Manutenção</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form action="/manutencao/gravar" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="codigo" value="{{ ($manutencao) ? $manutencao->codigo : null }}" />
                
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
                                    <div class="form-group col-md-8">
                                        <label id="labelDescricao" for="">Descricao <span>*</span></label>
                                        <input type="text" maxlength="100" class="form-control" id="descricao" name="descricao" autocomplete="off" value="{{ ($manutencao) ? $manutencao->descricao : null }}">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label id="labelData" for="">Data <span>*</span></label>
                                        <input type="date" maxlength="10" class="form-control" id="data" name="data" autocomplete="off" value="{{ ($manutencao) ? (\App\Helpers\Util::ConverteData(\App\Helpers\Util::ConverteData($manutencao->data))) : null }}">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label id="labelArvore" for="">Árvore <span>*</span></label>
                                        <select class="form-control" id="codigo_arvore" name="codigo_arvore">
                                            <option value="">Selecione</option>    
                                            @foreach ($listaArvore as $itemArvore)
                                                <option @if(($manutencao) && $itemArvore->codigo == $manutencao->arvore->codigo) selected  @endif value="{{ $itemArvore->codigo }}">{{ $itemArvore->descricao }}</option>    
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label id="labelTipoManutencao" for="">Tipo Manutenção <span>*</span></label>
                                        <select class="form-control" id="codigo_tipo_manutencao" name="codigo_tipo_manutencao">
                                            <option value="">Selecione</option>    
                                            @foreach ($listaTipoManutencao as $itemTipoManutencao)
                                                <option @if(($manutencao) && $itemTipoManutencao->codigo == $manutencao->tipoManutencao->codigo) selected  @endif value="{{ $itemTipoManutencao->codigo }}">{{ $itemTipoManutencao->descricao }}</option>    
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label id="labelStatusManutencao" for="">Situação da Manutenção <span>*</span></label>
                                        <select class="form-control" id="status_manutencao" name="status_manutencao">
                                            <option value="">Selecione</option>    
                                            @foreach ($listaStatusManutencao as $itemStatusManutencao)
                                                <option @if(($manutencao) && $itemStatusManutencao['codigo'] == $manutencao->status_manutencao) selected  @endif value="{{ $itemStatusManutencao['codigo'] }}">{{ $itemStatusManutencao['descricao'] }}</option>    
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label id="labelObservacao" for="">Observação</label>
                                        <textarea type="text" maxlength="255" rows="3" class="form-control" id="observacao" name="observacao" autocomplete="off">{{ ($manutencao) ? $manutencao->observacao : null }}</textarea>
                                    </div>
                                    <div class="form-group col-md-12 btn-acoes-form">
                                        <button type="submit" class="btn btn-info">
                                            Salvar
                                        </button>
                                        <a href="/manutencao" class="btn btn-outline-secondary">Cancelar</a>
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