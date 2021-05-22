@extends('layouts.app')

@section('content')

<div class="container-fluid">
    
    <div class="row">
        <div class="col-md-3">
            <div class="card bg-info mb-3">
                <div class="card-header bg-info text-white">Quantidade de árvores</div>
                <div class="card-body">
                  <h5 class="card-title text-white">7681</h5>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-info mb-3">
                <div class="card-header bg-info text-white">Quantidade de espécies</div>
                <div class="card-body">
                  <h5 class="card-title text-white">640</h5>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-info mb-3">
                <div class="card-header bg-info text-white">Quantidade de Manutenções</div>
                <div class="card-body">
                  <h5 class="card-title text-white">45</h5>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-info mb-3">
                <div class="card-header bg-info text-white">Manutenções em execuçõa</div>
                <div class="card-body">
                  <h5 class="card-title text-white">19</h5>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card bg-transparent  mb-3">
                <div class="card-header bg-info text-white">Gráfico po espécie</div>
                    <div class="card-body">
                        <div class="chart-bar text-center" style="width:100%;">
                            <canvas id="chart-bar"></canvas>
                        </div>
                    </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card bg-transparent  mb-3">
                <div class="card-header bg-info text-white">Gráfico po região</div>
                    <div class="card-body">
                        <div class="chart-pie text-center">
                            <canvas id="chart-pie" style="width:100%; height: 323px; max-height: 323px;"></canvas>
                        </div>
                    </div>
            </div>
        </div>
    </div>

</div>
@endsection

@section('js')

    <!-- Chart JS -->
    <script src="/assets/plugin/chart/chart.js?"></script>

    <script>
        initChart();
    </script>

@endsection