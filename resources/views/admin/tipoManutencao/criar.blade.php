@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-5 col-8 align-self-center">
            <h4 class="text-themecolor m-b-0 m-t-0">Tipo Manutenção</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form action="/tipoManutencao/gravar" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="codigo" value="{{ ($tipoManutencao) ? $tipoManutencao->codigo : null }}" />
                <div class="card mt-2">
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label id="labelDescricao" for="">Descricao <span>*</span></label>
                                <input type="text" maxlength="100" class="form-control" id="descricao" name="descricao" autocomplete="off" value="{{ ($tipoManutencao) ? $tipoManutencao->descricao : null }}">
                            </div>
                            <div class="form-group col-md-12 btn-acoes-form">
                                <button type="submit" class="btn btn-info">
                                    Salvar
                                </button>
                                <a href="/tipoManutencao" class="btn btn-outline-secondary">Cancelar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection