<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    
       <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" />
    <style>
        #mapid { height: 700px; }
    </style>


</head>
<body>
    <div id="mapid"></div>
    <script type="text/javascript" src="jquery-3.4.1.min.js"></script>
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"></script>
   <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"></script>

     <script >
       
      var map = L.map('mapid').setView([32.227956522256136,35.22212731651962], 18);
     L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

    
  var greenIcon = L.icon({
    iconUrl: 'ma.png',
   // shadowUrl: 'ma.png',

    iconSize:     [2, 2], // size of the icon
   // shadowSize:   [50, 64], // size of the shadow
   // iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
   // shadowAnchor: [4, 62],  // the same for the shadow
   // popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
});
   

   
     

    $(function(){
    $.ajax({
        type:'GET',
        url: 'getdata.php',
        success: function (data){
            //The content
           var x=JSON.parse(data);
          
            var markers;
           $(".leaflet-marker-icon").remove();
           //$(".leaflet-popup").remove();

           for (var i=0;i<x.length;i++){
               markers= L.marker([x[i].LAT,x[i].LANG],{icon: greenIcon}).addTo(map);
               
     
   
           } 
   
          
        }//end the content
    });
     
 
 
});
     

          
    </script>
    
   
     


</body>
</html>