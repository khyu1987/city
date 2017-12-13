<!DOCTYPE html>
<html>
<head>
  <title>Add cit</title>
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
        <h2 class="text-center">Add New City...</h2>
        <br>
        <form class="ajax-form form-inline text-center">
          <input id="autocomplete" class="form-control" placeholder="Enter city name" name="city" type="text"></input>
          <input type="submit" class="btn btn-sm btn-primary" value="SEND"></input>
        </form>
      </div>
    </div>
  </div>


  <script>

    var city_info;

      //Автокомпліт від Google API
     function initAutocomplete() {

       var autocomplete = new google.maps.places.Autocomplete(
        (document.getElementById('autocomplete')),
        {types: ['geocode']});

       autocomplete.addListener('place_changed', function () {
        var place = autocomplete.getPlace(); 

        var lat = place.geometry.location.lat();
        var lng = place.geometry.location.lng();
        var city_name = place.formatted_address;
        var place_id = place.place_id;

        city_info = JSON.stringify({
          "lat":        lat,
          "lng":        lng,
          "city_name": city_name,
          "place_id":  place_id
        });
      }
      )};


       // Якщо дані про місто отримали - можемо відсилати на бекенд
       $('.ajax-form').submit(function(){

        if(city_info == null) {
          alert('Try enter city name again...');
          return false;
        }

        $.ajax({

          url: "index.php?action=create",
          type: 'POST',
          data: {'city': city_info},

          success: function (response) {
            location.replace('index.php?action=show');
          }

        });

        return false;

      });

    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBEIax5p5qMFPRMs2s2JUugr2QRucB1aAo&libraries=places&callback=initAutocomplete"
    async defer></script>
  </body>
  </html>
