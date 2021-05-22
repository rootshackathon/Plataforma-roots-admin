@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-5 col-8 align-self-center">
            <h4 class="text-themecolor m-b-0 m-t-0">Espécie</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form action="/especie/gravar" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="codigo" value="{{ ($especie) ? $especie->codigo : null }}" />
                <div class="card mt-2">
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label id="labelDescricao" for="">Descricao <span>*</span></label>
                                <input type="text" maxlength="100" class="form-control" id="descricao" name="descricao" autocomplete="off" value="{{ ($especie) ? $especie->descricao : null }}">
                            </div>
                            <div class="form-group col-md-3">
                                <label id="labelNomeCientifico" for="">Nome Cientifico <span>*</span></label>
                                <input type="text" maxlength="100" class="form-control" id="nome_cientifico" name="nome_cientifico" autocomplete="off" value="{{ ($especie) ? $especie->nome_cientifico : null }}">
                            </div>
                            <div class="form-group col-md-3">
                                <label id="labelDiasIntervaloPoda" for="">Dias Intervalo Poda <span>*</span></label>
                                <input type="number" maxlength="10" class="form-control" id="dias_intervalo_poda" name="dias_intervalo_poda" autocomplete="off" value="{{ ($especie) ? $especie->dias_intervalo_poda : 0 }}">
                            </div>
                            <div class="form-group col-md-12 btn-acoes-form">
                                <button type="submit" class="btn btn-info">
                                    Salvar
                                </button>
                                <a href="/especie" class="btn btn-outline-secondary">Cancelar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection