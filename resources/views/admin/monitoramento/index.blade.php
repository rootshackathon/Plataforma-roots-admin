@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div id="map"></div>
</div>
@endsection

@section('js')

    <!-- Google Maps JS -->
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script
      src="https://maps.googleapis.com/maps/api/js?key={{env('API_KEY_GOOGLE')}}&callback=initMap&libraries=&v=weekly"
      async
    ></script>
    <script src="/assets/js/maps.js?"></script>

@endsection