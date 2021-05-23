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
};