@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-5 col-8 align-self-center">
            <h4 class="text-themecolor m-b-0 m-t-0">Região</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form action="/regiao/gravar" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="codigo" value="{{ ($regiao) ? $regiao->codigo : null }}" />
                <div class="card mt-2">
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label id="labelDescricao" for="">Descricao <span>*</span></label>
                                <input type="text" maxlength="100" class="form-control" id="descricao" name="descricao" autocomplete="off" value="{{ ($regiao) ? $regiao->descricao : null }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label id="labelDistanciaMaximaRaio" for="">Distância Máxima do Raio <span>*</span></label>
                                <input type="number" maxlength="60" class="form-control" id="distancia_maxima_raio" name="distancia_maxima_raio" autocomplete="off" value="{{ ($regiao) ? $regiao->distancia_maxima_raio : 0 }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label id="labelLatitude" for="">Latitude</label>
                                <input type="text" maxlength="60" class="form-control" id="latitude" name="latitude" autocomplete="off" value="{{ ($regiao) ? $regiao->latitude : null }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label id="labelLongitude" for="">Longitude</label>
                                <input type="text" maxlength="60" class="form-control" id="longitude" name="longitude" autocomplete="off" value="{{ ($regiao) ? $regiao->longitude : null }}">
                            </div>
                            <div class="form-group col-md-12">
                                <label id="labelPontoReferencia" for="">Ponto de Referência</label>
                                <textarea type="text" maxlength="255" rows="3" class="form-control" id="ponto_referencia" name="ponto_referencia" autocomplete="off">{{ ($regiao) ? $regiao->ponto_referencia : null }}</textarea>
                            </div>
                            <div class="form-group col-md-12 btn-acoes-form">
                                <button type="submit" class="btn btn-info">
                                    Salvar
                                </button>
                                <a href="/regiao" class="btn btn-outline-secondary">Cancelar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection