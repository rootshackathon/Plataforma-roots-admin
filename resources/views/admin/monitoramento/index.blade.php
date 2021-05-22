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
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAIf4ypG0R7HS28HN83gvfZ8aT9AyHqu1M&callback=initMap&libraries=&v=weekly"
      async
    ></script>

    <script>

let queryPar = queryStringToJSON();
        
        let codigo = null;
        let lat = -7.1936425;
        let lng = -48.2173105;
       
        if(queryPar){
            
            codigo = queryPar.codigo;
            lat = parseFloat(queryPar.lat);
            lng = parseFloat(queryPar.lng);
        
        }

        const beaches = [];
        const latLng = { lat: lat, lng: lng };
            
        let map;
        function initMap() {
            map = new google.maps.Map(document.getElementById("map"), {
                mapTypeId: 'satellite', //hybrid | roadmap | satellite | terrain
                scaleControl: true,
                center: latLng,
                zoom: 16.5, 
            });

            setMarkers(map); 

            function setMarkers(map) {
                
                $.getJSON("/api/arvore", function( retorno ) {
  
                    $.each( retorno.data, function( key, val ) {
                        key = (key + 1);
                        beaches.push([val.descricao, parseFloat(val.latitude), parseFloat(val.longitude), key, val.status, val.codigo]);
                    });

                    for (let i = 0; i < beaches.length; i++) {
                        
                        let beach = beaches[i];

                        let dirUrlIcon = "";
                        
                        if(beach[4] == 1){
                            
                            dirUrlIcon = "/assets/imagens/icone-arvoew.svg";
                            if(beach[5] == codigo){
                                dirUrlIcon = "/assets/imagens/icone-arvoew-vermelho.svg";
                            }
                        }
                        else{

                            if(beach[5] == codigo){
                                dirUrlIcon = "/assets/imagens/icone-arvoew-cinza-vermelho.svg";
                            }

                        }
                        
                        new google.maps.Marker({
                            position: { lat: beach[1], lng: beach[2] },
                            map,
                            icon: {
                                url: dirUrlIcon,
                                anchor: new google.maps.Point(25,50),
                                scaledSize: new google.maps.Size(50,50)
                            },
                            title: beach[0],
                            zIndex: beach[3],
                        });
                    }
                
                });
            };

        };

    </script>

@endsection