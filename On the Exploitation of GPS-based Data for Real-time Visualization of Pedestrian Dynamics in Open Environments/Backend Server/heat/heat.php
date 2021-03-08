<!DOCTYPE html>
<html>
<head>
    <title> </title>
    <link rel="stylesheet" href="../leaflet/leaflet.css" />
    <script src="../leaflet/leaflet.js"></script>
    <style>
        #map {   height: 600px; }
        body { font: 16px/1.4 "Helvetica Neue", Arial, sans-serif; }
        .ghbtns { position: relative; top: 4px; margin-left: 5px; }
        a { color: #0077ff; }
    </style>
</head>
<body>

 
    
   
 
<div id="map"></div>

<!-- <script src="node_modules/simpleheat/simpleheat.js"></script>
<script src="src/HeatLayer.js"></script> -->
<script type="text/javascript" src="../jquery-3.4.1.min.js"></script>
<script src="dist/leaflet-heat.js"></script>

<!--<script src="http://leaflet.github.io/Leaflet.markercluster/example/realworld.10000.js"></script>-->

<script>

 var map = L.map('map').setView([50.927487378939986,6.365816993638873], 18);   

   var tiles = L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors',
      });
     tiles.addTo(map);


 
 var scale = L.control.scale().addTo(map); 
            var metres = scale._getRoundNum(map.containerPointToLatLng([0, map.getSize().y / 2 ]).distanceTo( map.containerPointToLatLng([scale.options.maxWidth,map.getSize().y / 2 ])))
  label = metres < 1000 ? metres + ' m' : (metres / 1000) + ' km';


 
 // Get the y,x dimensions of the map
var y = map.getSize().y,
    x = map.getSize().x;
// calculate the distance the one side of the map to the other using the haversine formula
var maxMeters = map.containerPointToLatLng([0, y]).distanceTo( map.containerPointToLatLng([x,y]));
// calculate how many meters each pixel represents
var MeterPerPixel = maxMeters/x ;
 document.write(MeterPerPixel);
// var reg=10/MeterPerPixel; 
  document.write("<br/>"+MeterPerPixel);

         
 
 
     
  
 
      

    $(function(){
    $.ajax({
        type:'GET',
        url: '../getdata.php',
        success: function (data){
            //The content
        
          
        
            var x=JSON.parse(data);
            
          
          
             var points=[[0,0]];
           
            
        
              
              for (var i=0;i<x.length;i++){
               points[i]=[x[i].LAT,x[i].LANG,0.2];
             } 
             
              
        points = points.map(function (p) { return [p[0], p[1],p[2]]; });
        
        if (typeof heat === typeof undefined) {
        
            heat = L.heatLayer(points);
            
             map.addLayer(heat);
             heat.setOptions({
            scaleRadius:false,
            radius:10,
            maxZoom:17,
           // gradient:{0.4: 'green', 0.65: 'yellow', 1: 'red'},
            gradient:{0.4: 'blue', 0.65: 'yellow', 1: 'red'},
            blur: 15, 
          
           
        minOpacity: 0.5
        }).addTo(map);
       
        }
        
        else
        {
            heat.setOptions({
            scaleRadius:false,
            radius:10,
            maxZoom:17,
            gradient:{0.4: 'blue', 0.65: 'yellow', 1: 'red'},
            //gradient:{0.4: 'blue', 0.65: 'lime', 1: 'red'},
            blur:15,              
           
        minOpacity: 0.5
        }).addTo(map); 
        
        heat.setLatLngs(points)
        }
        
        
         
      //heat.setLatLngs(points).addTo(map);
           
   //End of heat map
        }//end the content
    });
});

            
 

           
  
  


</script>
</body>
</html>
