// 구글맵
// function initialize() {
//     var myLatlng = new google.maps.LatLng(37.5718, 126.9841);
//     var myOptions = {
//      zoom: 15,
//      center: myLatlng
//     }
//     var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
//     var marker = new google.maps.Marker({
//      position: myLatlng,
//      map: map,
//      title:"(주)하나투어"
//     });  
//     var infowindow = new google.maps.InfoWindow({
//      content: "(주)하나투어 서울특별시 종로구 공평동 인사동5길 41 4층"
//     });
//     infowindow.open(map,marker);
//    }
//    window.onload=function(){
//     initialize();
//    }


// 카카오맵
window.onload = function() {
    var container = document.getElementById('map_canvas');
    var options = {
        center: new daum.maps.LatLng(37.57186272087327, 126.98412740174082),
        level: 4
    };

    var map = new daum.maps.Map(container, options);
    
    var mapTypeControl = new daum.maps.MapTypeControl();
    map.addControl(mapTypeControl, daum.maps.ControlPosition.TOPRIGHT);

    var zoomControl = new daum.maps.ZoomControl();
    map.addControl(zoomControl, daum.maps.ControlPosition.RIGHT);
    
    var markerPosition  = new daum.maps.LatLng(37.57186272087327, 126.98412740174082); 
    var marker = new daum.maps.Marker({
        position: markerPosition
    });

    marker.setMap(map);
    
    var overlay = new daum.maps.CustomOverlay({
        map: map,
        position: marker.getPosition()       
    });
}