<!DOCTYPE html>
<html>
<head>
  <title>Show cities</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>

  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <h2 class="text-center">Show Cities...</h2>
        <br>
        <p class="text-center"><a href="index.php" class="btn btn-sm btn-primary" > + Add City</a></p>
        <br>
    </div>
</div>
</div>


<div id="map" style="width: 100%; height: 500px;"></div>
<script>

    // Ініціалізуємо карту
    function initMap() {
      var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 2,
        center: {lat: 30, lng: 0}
    });


      // Показуємо масив маркерів міст з БД
      for (var i = 0; i < <?php echo(count($resultShow));?>; i++){

        <?php foreach ($resultShow as $city):

        $city_info = json_decode($city['city']);
        $lat = $city_info    -> lat;
        $lng = $city_info    -> lng;
        $title = $city_info  -> city_name;
        ?>

        var marker = new google.maps.Marker({
          position: {lat: <?php echo $lat; ?>, lng: <?php echo $lng; ?> },
          map: map,
          title: '<?php echo $title; ?>'
      });

        <?php endforeach; ?>

    }
}
</script>
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBEIax5p5qMFPRMs2s2JUugr2QRucB1aAo&callback=initMap">
</script>

</body>
</html>
