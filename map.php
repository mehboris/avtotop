<?php


 session_start();
  function loadUser() {
    return !empty($_SESSION['isLogin']);
  }

  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
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


	<!--<div class="semilayer"></div>
	<div class="semilayer hor1"></div>
	<div class="semilayer verL"></div>
	<div class="semilayer verR"></div>-->
	
<div class="container-fluid ">
  <div class="row-fluid">
      <div id="map">	</div>
  </div>
</div>
    
    <button  type="button" class="btn btn-success" style="margin-left:40%" onclick="cleans()">Очистити маршути</button>
    <button  type="button" class="btn btn-info" onclick="me_on()">Ви тут!</button>
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
          height: 500,
          zoom:13,
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

function me_on() {

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