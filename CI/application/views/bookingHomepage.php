<!DOCTYPE html>

<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
<meta charset="utf-8">

<style>
#map {
    height: 100%;
    background-color: grey;
}

html,
body {
    height: 100%;
    margin: 0;
    padding: 0;
}

#panel {
    height: 100%;
    width: null;
    background-color: white;
    position: fixed;
    z-index: 1;
    overflow-x: hidden;
    transition: all .2s ease-out;
}

.open {
    width: 250px;
}

.hero {
    width: 100%;
    height: auto;
    max-height: 166px;
    display: block;
}

.place,
p {
    font-family: 'open sans', arial, sans-serif;
    padding-left: 18px;
    padding-right: 18px;
}

.details {
    color: darkslategrey;
}

a {
    text-decoration: none;
    color: cadetblue;
}
</style>

<script 
async 
defer 
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDx0fQTqb3b18e6jy_QIoAO01bPgzAraFk&libraries=places&callback=initMap">
</script>

<script>
    let pos;
    let map;
    let bounds;
    let infoWindow;
    let currentInfoWindow;
    let service;
    let infoPane;

    function initMap() {
      // Initialize variables
      bounds = new google.maps.LatLngBounds();
      infoWindow = new google.maps.InfoWindow;
      currentInfoWindow = infoWindow;
      infoPane = document.getElementById('panel');

      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(position => {
          pos = {
            lat: position.coords.latitude,
            lng: position.coords.longitude
          };
          map = new google.maps.Map(document.getElementById('map'), {
            center: pos,
            zoom: 15
          });
          bounds.extend(pos);

          infoWindow.setPosition(pos);
          infoWindow.setContent('Location found.');
          infoWindow.open(map);
          map.setCenter(pos);

          // Call Places Nearby Search on user's location
          getNearbyPlaces(pos);
        }, () => {
          // Browser supports geolocation, but user has denied permission
          handleLocationError(true, infoWindow);
        });
      } else {
        // Browser doesn't support geolocation
        handleLocationError(false, infoWindow);
      }
    }

    function handleLocationError(browserHasGeolocation, infoWindow) {
      // Default location to Sydney, Australia
      pos = { lat: -33.856, lng: 151.215 };
      map = new google.maps.Map(document.getElementById('map'), {
        center: pos,
        zoom: 15
      });

      infoWindow.setPosition(pos);
      infoWindow.setContent(browserHasGeolocation ?
        'Geolocation permissions denied. Using default location.' :
        'Error: Your browser doesn\'t support geolocation.');
      infoWindow.open(map);
      currentInfoWindow = infoWindow;

      // Call Places Nearby Search on the default location
      getNearbyPlaces(pos);
    }

    // Perform a Places Nearby Search Request
    function getNearbyPlaces(position) {
      // var searchkeyword = document.getElementById("keyword").value;
      let request = {
        location: position,
        rankBy: google.maps.places.RankBy.DISTANCE,
        keyword: ['hospital']
      };

      service = new google.maps.places.PlacesService(map);
      service.nearbySearch(request, nearbyCallback);
    }

    function nearbyCallback(results, status) {
      if (status == google.maps.places.PlacesServiceStatus.OK) {
        console.log("123")
        createMarkers(results);
      }
    }

    // Set markers at the location of each place result
    function createMarkers(places) {
      places.forEach(place => {
        let marker = new google.maps.Marker({
          position: place.geometry.location,
          map: map,
          title: place.name
        });

        google.maps.event.addListener(marker, 'click', () => {
          let request = {
            placeId: place.place_id,
            fields: ['name', 'formatted_address', 'geometry', 'rating',
              'website', 'photos']
          };

          service.getDetails(request, (placeResult, status) => {
            showDetails(placeResult, marker, status)
          });
        });

        // Adjust the map bounds to include the location of this marker
        bounds.extend(place.geometry.location);
      });

      map.fitBounds(bounds);
    }

    function showDetails(placeResult, marker, status) {
      if (status == google.maps.places.PlacesServiceStatus.OK) {
        let placeInfowindow = new google.maps.InfoWindow();
        let rating = "None";
        if (placeResult.rating) rating = placeResult.rating;
        placeInfowindow.setContent('<div><strong>' + placeResult.name +
          '</strong><br>' + 'Rating: ' + rating + '</div>');
        placeInfowindow.open(marker.map, marker);
        currentInfoWindow.close();
        currentInfoWindow = placeInfowindow;
        showPanel(placeResult);
      } else {
        console.log('showDetails failed: ' + status);
      }
    }

    function showPanel(placeResult) {
      // If infoPane is open, close it
      if (infoPane.classList.contains("open")) {
        infoPane.classList.remove("open");
      }

      // Clear the previous details
      while (infoPane.lastChild) {
        infoPane.removeChild(infoPane.lastChild);
      }

      if (placeResult.photos) {
        let firstPhoto = placeResult.photos[0];
        let photo = document.createElement('img');
        photo.classList.add('hero');
        photo.src = firstPhoto.getUrl();
        infoPane.appendChild(photo);
      }

      let name = document.createElement('h1');
      name.classList.add('place');
      name.textContent = placeResult.name;
      infoPane.appendChild(name);
      if (placeResult.rating) {
        let rating = document.createElement('p');
        rating.classList.add('details');
        rating.textContent = `Rating: ${placeResult.rating} \u272e`;
        infoPane.appendChild(rating);
      }
      let address = document.createElement('p');
      address.classList.add('details');
      address.textContent = placeResult.formatted_address;
      infoPane.appendChild(address);
      if (placeResult.website) {
        let websitePara = document.createElement('p');
        let websiteLink = document.createElement('a');
        let websiteUrl = document.createTextNode(placeResult.website);
        websiteLink.appendChild(websiteUrl);
        websiteLink.title = placeResult.website;
        websiteLink.href = placeResult.website;
        websitePara.appendChild(websiteLink);
        infoPane.appendChild(websitePara);
      }

      // Open the infoPane
      infoPane.classList.add("open");
    }
</script>


<div class="h-100">

    <div id="input_area" class="col-md-10 offset-md-1 mt-5 d-flex flex-row flex-wrap justify-content-center">
        
        <div class="form-group col-md-4 d-flex align-items-center">
            <img class="img-fluid img-thumbnail mr-3" style="width: 50px; height: 50px;" src="<?php echo base_url(); ?>assets/img/logo.png"/>
            <input type="text" class="form-control" name="provider" placeholder="Specialty or provider name">
            <?php echo form_error('username'); ?>
        </div>

        <div class="form-group col-md-4 d-flex align-items-center">
            <img class="img-fluid img-thumbnail mr-3" style="width: 50px; height: 50px;" src="assets/img/logo.png"/>
            <input type="text" id="keyword" class="form-control" name="suburb" placeholder="Suburb or postcode">
            <?php echo form_error('username'); ?>
        </div>

        <div class="form-group col-md-4 d-flex align-items-center">
            <img class="img-fluid img-thumbnail mr-3" style="width: 50px; height: 50px;" src="assets/img/logo.png"/>
            <input type="text" class="form-control" name="sex" placeholder="Doctor's sex">
            <?php echo form_error('username'); ?>
        </div>

        <div class="form-group col-md-3 d-flex align-items-center">
            <img class="img-fluid img-thumbnail mr-3" style="width: 50px; height: 50px;" src="assets/img/logo.png"/>
            <input type="text" class="form-control" name="date" placeholder="10/04/2000">
            <?php echo form_error('username'); ?>
        </div>


        <div class="form-group col-md-3 d-flex align-items-center">
            <img class="img-fluid img-thumbnail mr-3" style="width: 50px; height: 50px;" src="assets/img/logo.png"/>
            <input type="text" class="form-control" name="date" placeholder="10/04/2000">
            <?php echo form_error('username'); ?>
        </div>

        <div class="form-group col-md-3 d-flex align-items-center">
            <img class="img-fluid img-thumbnail mr-3" style="width: 50px; height: 50px;" src="assets/img/logo.png"/>
            <a role="button" class="btn btn-outline-dark btn-block">Search</a>
        </div>

    </div>

    <div class="col-md-10 offset-md-1 mt-2 h3"> Avaliable Results: </div>


    <div id="panel"></div>
    <div id="map" style="width: 100%; height: 500px;"></div>
    <!-- <div id="filter_result" class="col-md-10 offset-md-1 mt-4 h-50">

        <div class="card card-body mb-3">
            <div class="media align-items-center text-center text-lg-left">
                <div class="mr-2 mb-3 mb-lg-0"> <img src="assets/img/logo.png" width="150" height="150" alt=""> </div>
                <div class="media-body">
                    <h6 class="media-title font-weight-semibold"> <a href="?">Queen Elizabeth II Jubilee Hospital</a> </h6>
                    <ul class="list-inline list-inline-dotted mb-3 mb-lg-2">
                        <li class="list-inline-item"><a href="#" class="text-muted" data-abc="true"># vaccine</a></li>
                        <li class="list-inline-item"><a href="#" class="text-muted" data-abc="true"># queensland</a></li>
                        <li class="list-inline-item"><a href="#" class="text-muted" data-abc="true"># 8:00 - 16:00</a></li>
                    </ul>
                    <p class="mb-3">The Queen Elizabeth II Jubilee Hospital is a medium metropolitan adult facility providing a range of inpatient and outpatient services and a 24-hour emergency department. Our endoscopy unit is Australia’s most advanced diagnostic facility and has the capacity to see more than 5000 patients a year. </p>
                    <ul class="list-inline list-inline-dotted mb-0">
                        <li class="list-inline-item"><a href="#">Find out more</a></li>
                    </ul>
                </div>
                <div class="mt-3 mt-lg-0 ml-lg-3 text-center">
                    <h3 class="mb-0 font-weight-semibold">23.1 Km</h3>
                    <div> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </div>
                    <div class="text-muted">Today full booked</div> 
                    <button type="button" class="btn btn-primary mt-4 text-white">Book Now</button>
                </div>
            </div>
        </div>

        <div class="card card-body mb-3">
            <div class="media align-items-center text-center text-lg-left">
                <div class="mr-2 mb-3 mb-lg-0"> <img src="assets/img/logo.png" width="150" height="150" alt=""> </div>
                <div class="media-body">
                    <h6 class="media-title font-weight-semibold"> <a href="?">Queen Elizabeth II Jubilee Hospital</a> </h6>
                    <ul class="list-inline list-inline-dotted mb-3 mb-lg-2">
                        <li class="list-inline-item"><a href="#" class="text-muted" data-abc="true"># vaccine</a></li>
                        <li class="list-inline-item"><a href="#" class="text-muted" data-abc="true"># queensland</a></li>
                        <li class="list-inline-item"><a href="#" class="text-muted" data-abc="true"># 8:00 - 16:00</a></li>
                    </ul>
                    <p class="mb-3">The Queen Elizabeth II Jubilee Hospital is a medium metropolitan adult facility providing a range of inpatient and outpatient services and a 24-hour emergency department. Our endoscopy unit is Australia’s most advanced diagnostic facility and has the capacity to see more than 5000 patients a year. </p>
                    <ul class="list-inline list-inline-dotted mb-0">
                        <li class="list-inline-item"><a href="#">Find out more</a></li>
                    </ul>
                </div>
                <div class="mt-3 mt-lg-0 ml-lg-3 text-center">
                    <h3 class="mb-0 font-weight-semibold">23.1 Km</h3>
                    <div> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </div>
                    <div class="text-muted">Today full booked</div> 
                    <button type="button" class="btn btn-primary mt-4 text-white">Book Now</button>
                </div>
            </div>
        </div>


        
    </div> -->
    
</div>
