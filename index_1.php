<?php
$data = array(); // в этот массив запишем то, что выберем из базы

try {
            $dbh = new PDO('mysql:host=localhost;dbname=testua_site', 'root', '');
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();}
$i=0;
$ta = $dbh->query("SELECT * FROM `service`"); // сделаем запрос в БД
while($row = $ta->fetch(PDO::FETCH_ASSOC)){ // оформим каждую строку результата
                                      // как ассоциативный массив
    $data[] = $row;
    $i=$i+1;
    //echo "1";
    //echo $row;
     // допишем строку из выборки как новый элемент результирующего массива
}



$current = "{'titl':";
$current .=json_encode($data, JSON_UNESCAPED_SLASHES);
$current .="}";
file_put_contents('obj.json', $current);


?>










<!DOCTYPE>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>Page title</title>
    <meta name="description" content="Description of page">
     <link href="css/bootstrap.css" rel="stylesheet">
    

    <!--<link href="css/bootstrap-responsive.css" rel="stylesheet">-->
   <link rel="stylesheet" type="text/css" href="Sindex.css">  

   
</head>
<body>
<?php include 'header.php';?>
<br>
<br>
<br>

	<!--<div class="semilayer"></div>
	<div class="semilayer hor1"></div>
	<div class="semilayer verL"></div>
	<div class="semilayer verR"></div>-->
	<div id="map">	</div>
     <div id="prev"></div>
     <br>
    <button  type="button" class="btn btn-success" style="margin-left:500px" onclick="cleans()">Очистити маршути</button>
     <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://hpneo.github.io/gmaps/prettify/prettify.js"></script>

     <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>
    <script type="text/javascript" src="gmaps.js"></script>
    <script>

    function LoadObjects() {
      var xhr = new XMLHttpRequest();

      xhr.open('GET', 'obj.json', false);
      xhr.send();
    

      if (xhr.status != 200) {
        // обработать ошибку
        alert('Ошибка ' + xhr.status + ': ' + xhr.statusText);
      } else {
    //var contentType = xhr.getResponseHeader('Content-Type');
   //alert(contentType);
        // вывести результат
       // alert(xhr.responseText);
       // var zm =xhr.responseText;
       var zm = eval('(' + xhr.responseText + ')');
      // alert(zm);
        //alert(zm.titl[0].name);
        //alert(zm.titl.length)
       


        //var Objects = JSON.parse(zm);
       // alert(Objects.length);
         return zm;

      }
    }
    var obj = LoadObjects();
      var k_obj = obj.titl.length;
   



        var map = new GMaps({
          div: "#map",
          lat: 48.469,
          lng: 35.048,
          width: 1200,
          height: 600,
          zoom:12,
        });

         var path = [[48.45095176, 35.07177114], [48.45553427, 35.07486105], [48.46020174, 35.07520437], [48.46148238, 35.07614851],[48.46461268, 35.07224321],[48.46569401, 35.06722212],[48.46705987, 35.06134272],[48.47232378, 35.04237413],[48.47696126, 35.03413439],[48.47960699, 35.02636671],[48.47380327, 35.02392054],[48.47243759, 35.03082991]];
         var path1 = [[48.46334635, 35.04751325],[48.44793448, 35.02902746],[48.43723023, 35.01941442],[48.43290233, 35.01673222],[48.42475806, 35.02385616],[48.42552698, 35.02898455],[48.42948532, 35.04018545],[48.44024814, 35.05048513],[48.44262534, 35.05075336],[48.44950007, 35.05944371],[ 48.4541681, 35.06489396]]

        var path2 = [[48.46334635, 35.04751325], [48.44793448, 35.02902746],[48.43723023, 35.01941442],[48.43290233, 35.01673222],[48.42145442, 35.00911474],[48.42163955, 35.00822425],[48.42163955, 35.00749469],[48.42121234, 35.00663638],[48.4211981, 34.99964118],[48.42218067, 34.99734521],[48.42250819, 34.99526381],[48.42306355, 34.99459863],[48.43708787, 35.00193715],[48.43852568, 34.995929],[48.45388348, 35.00401855],[48.46687491, 35.01090646],[48.46818383, 35.01082063], [48.46915127, 35.01109958],[48.4696919, 35.00927567],[48.47149866 , 35.00704408],[48.47333382, 35.0086534],[ 48.47528271, 35.01597047],[48.47259408, 35.0304544]]

        polygon = map.drawPolygon({
          paths: path, // pre-defined polygon shape
          strokeColor: '#BBD8E9',
          strokeOpacity: 1,
          strokeWeight: 3,
          fillColor: '#BBD8E9',
          fillOpacity: 0.6,
          });

        polygon1 = map.drawPolygon({
          paths: path1, // pre-defined polygon shape
          strokeColor: '#01F5D1',
          strokeOpacity: 1,
          strokeWeight: 3,
          fillColor: '#01F5D1',
          fillOpacity: 0.6,
          });

        polygon2 = map.drawPolygon({
          paths: path2, // pre-defined polygon shape
          strokeColor: '#9BBC57',
          strokeOpacity: 1,
          strokeWeight: 3,
          fillColor: '#9BBC57',
          fillOpacity: 0.4,
          });

for(i=0;i<=k_obj;i++){


   map.addMarker({

  lat: obj.titl[i].lat,
  lng: obj.titl[i].lng,
  title: obj.titl[i].p_name,
  icon: obj.titl[i].icon_link,
  infoWindow: { 
    content: obj.titl[i].content
        }

});
}
 
function way(k) {

GMaps.geolocate({
          success: function(position) {
            map.setCenter(position.coords.latitude, position.coords.longitude);
              map.addMarker({
                  lat: position.coords.latitude,
                  lng: position.coords.longitude,
                  title: 'You',
                  infoWindow: {
                      content: '<p>Ви тут!</p>'
                    }
             });
              map.drawRoute({
                origin: [position.coords.latitude, position.coords.longitude],
                destination: [obj.titl[k].lat, obj.titl[k].lng],
                travelMode: 'driving',
                strokeColor: '#00E600',
                strokeOpacity: 0.6,
                strokeWeight: 6
              });
          },
          error: function(error) {
            alert('Geolocation failed: '+error.message);
          },
          not_supported: function() {
            alert("Your browser does not support geolocation");
          }
      });

}
function cleans(){
map.removePolylines({})
}

function preview (p) {
echo(p.title)
$('#prev').append('<h2><a href="service/'+p+'php" class="">'+p+'</a></h2');}

















var map;


// Update center
$(document).on('click', '.pan-to-marker', function(e) {
  e.preventDefault();

  var lat, lng;

  var $index = $(this).data('marker-index');
  var $lat = $(this).data('marker-lat');
  var $lng = $(this).data('marker-lng');

  if ($index != undefined) {
    // using indices
    var position = map.markers[$index].getPosition();
    lat = position.lat();
    lng = position.lng();
  }
  else {
    // using coordinates
    lat = $lat;
    lng = $lng;
  }

  map.setCenter(lat, lng);
});

$(document).ready(function(){
  prettyPrint();
  map = new GMaps({
    div: '#map',
    lat: -12.043333,
    lng: -77.028333
  });

  GMaps.on('marker_added', map, function(marker) {
    $('#markers-with-index').append('<li><a href="#" class="pan-to-marker" data-marker-index="' + map.markers.indexOf(marker) + '">' + marker.title + '</a></li>');

    $('#markers-with-coordinates').append('<li><a href="#" class="pan-to-marker" data-marker-lat="' + marker.getPosition().lat() + '" data-marker-lng="' + marker.getPosition().lng() + '">' + marker.title + '</a></li>');
  });

  GMaps.on('click', map.map, function(event) {
    var index = map.markers.length;
    var lat = event.latLng.lat();
    var lng = event.latLng.lng();

    var template = $('#edit_marker_template').text();

    var content = template.replace(/{{index}}/g, index).replace(/{{lat}}/g, lat).replace(/{{lng}}/g, lng);

    map.addMarker({
      lat: lat,
      lng: lng,
      title: 'Marker #' + index,
      infoWindow: {
        content : content
      }
    });
  });
});



    </script>
	
</body>
</html>