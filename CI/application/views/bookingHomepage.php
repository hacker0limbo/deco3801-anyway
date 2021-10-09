<!DOCTYPE html>

<link rel="stylesheet" href="assets/css/mapstyle.css">
<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
<meta charset="utf-8">

<script 
  async 
  defer 
  src="https://maps.googleapis.com/maps/api/js?language=en-AU&key=AIzaSyDx0fQTqb3b18e6jy_QIoAO01bPgzAraFk&libraries=places&callback=initMap">
</script>

<script type="text/javascript" 
src="http://maps.google.com/maps/api/js?sensor=false&v=3&libraries=geometry"></script>

<script>
    let pos;
    let map;
    let bounds;
    let infoWindow;
    let currentInfoWindow;
    let service;
    let infoPane;
    let extraPane;

    function display(id){  
        var traget=document.getElementById(id);  
        if(traget.style.display=="none"){  
            traget.style.display="";  
        } else {  
            traget.style.display="none";  
      }  
    }  

    function initMap() {
      // Initialize variables
      bounds = new google.maps.LatLngBounds();
      infoWindow = new google.maps.InfoWindow;
      currentInfoWindow = infoWindow;
      infoPane = document.getElementById('panel');
      extraPane = document.getElementById('extra');

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
        zoom: 15,
        disableDefaultUI:true //关闭默认控件
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
      // User input 
      var keyword = ['health'];
      var radius = 5000;
      var openNow;

      // Type keywords input ps: must use space to split
      if (document.getElementById('keyword').value != '') {
        var type_input = document.getElementById('keyword').value.split(" ");
        keyword = [];
        keyword.push(type_input);
      }

      // Radius input ps: must use numbers
      if (document.getElementById('radius').value != '') {
        var radius_input = parseInt(document.getElementById('radius').value);
        radius = radius_input;
      }

      let request = {
        location: position,
        radius: radius,
        keyword: keyword
        // openNow: open_input,
        // rankBy: google.maps.places.RankBy.DISTANCE,
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
              'website', 'photos', 'opening_hours', 'types', 'icon', 
              'business_status','formatted_phone_number',]
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
        showExtraPanel(placeResult);
        console.log(placeResult);
      } else {
        console.log('showDetails failed: ' + status);
      }
    }

    // Extra info function
    function showExtraPanel(placeResult) {
      // Clear the previous details
      while (extraPane.lastChild) {
        extraPane.removeChild(extraPane.lastChild);
      }

      // Address
      let addressHeader = document.createElement('h5');
      addressHeader.classList.add('details');
      addressHeader.textContent = "Address:";
      extraPane.appendChild(addressHeader);

      let address = document.createElement('p');
      address.classList.add('details');
      address.textContent = placeResult.formatted_address;
      extraPane.appendChild(address);

      // Description
      let descriptionHeader = document.createElement('h5');
      descriptionHeader.classList.add('details');
      descriptionHeader.textContent = "Description:";
      extraPane.appendChild(descriptionHeader);

      let description = document.createElement('p');
      description.classList.add('description');
      description.classList.add('details');
      description.textContent = `${placeResult.name} is a medical institution near you.`;
      extraPane.appendChild(description);

      // Type Tag
      let tagHeader = document.createElement('h5');
      tagHeader.classList.add('details');
      tagHeader.textContent = "Tags:";
      extraPane.appendChild(tagHeader);

      for (var type of placeResult.types) {
        let tag = document.createElement('span');
        tag.classList.add('details');
        tag.classList.add('label');
        tag.classList.add('label-default');
        tag.textContent = type;
        tag.style.cssText = 'margin: 10px; background-color: grey;'
        extraPane.appendChild(tag);
      }


      // Opening hours
      let openTimeHeader = document.createElement('h5');
      openTimeHeader.classList.add('details');
      openTimeHeader.textContent = "Opening Times:";
      extraPane.appendChild(openTimeHeader);

      if(placeResult.opening_hours) {
        for (var time of placeResult.opening_hours.weekday_text) {
          let opentime = document.createElement('p');
          opentime.classList.add('details');
          opentime.textContent = time;
          extraPane.appendChild(opentime);
        }
      }

      // Booking
      let bookingHeader = document.createElement('h5');
      bookingHeader.classList.add('details');
      bookingHeader.textContent = "Booking";
      extraPane.appendChild(bookingHeader);
      let booking = document.createElement('p');
      booking.classList.add('details');
      booking.textContent = this.randomTime();
      extraPane.appendChild(booking);
    }
    
    // Generate random time and date
    function randomTime() {
      var dateList = ['Today', 'Tomorrow', 'Next Monday', 'Next Tuesday', 'Next Wednesday',
      'Next Thursday', 'Next Friday', 'Next Saturday', 'Next Sunday', 'Unknown']
      var date = dateList[Math.floor(Math.random()*dateList.length)];
      var time;

      if(date == 'Today' || date == 'Unknown') {
        time = '';
      } else {
        hrs = Math.round(Math.random()*12);
        mins = Math.round(Math.random()*60);    
        var hFormat = (hrs<10 ? "0" : "");
        var mFormat = (mins<10 ? "0" : "");
        var amPm = (hrs<12 ? "AM" : "PM");
        time = hFormat+hrs+ ":" +mFormat+mins+ " " +amPm;
      }

      randomTime = date + ' ' + time;
      console.log(randomTime);
      return randomTime; 
    }

    // Info display long long long function 
    function showPanel(placeResult) {

      // If infoPane is open, close it
      if (infoPane.classList.contains("open")) {
        infoPane.classList.remove("open");
      }

      // Clear the previous details
      while (infoPane.lastChild) {
        infoPane.removeChild(infoPane.lastChild);
        document.getElementById('extra').style.display="none";
      }

      //Create extra information panel button
      let button = document.createElement('button');
      button.classList.add('btn');
      button.classList.add('btn-block');
      button.classList.add('align-self-end');
      button.style.cssText = 'width: 50px;';
      button.textContent = '☰';
      button.setAttribute("onclick", "display('extra')");
      infoPane.appendChild(button);

      // Place photo
      if (placeResult.photos) {
        let firstPhoto = placeResult.photos[0];
        let photo = document.createElement('img');
        photo.classList.add('hero');
        // photo.style.cssText = 'width: 50px; height: 50px;'
        photo.src = firstPhoto.getUrl();
        infoPane.appendChild(photo);
      }

      // Place name 
      let name = document.createElement('h4');
      name.classList.add('place');
      name.textContent = placeResult.name;
      infoPane.appendChild(name);

      // Open now indicator
      let opennow = document.createElement('span');
        opennow.classList.add('opennow');
        opennow.classList.add('label');
        opennow.classList.add('label-default');

      if (placeResult.opening_hours) {
        if (placeResult.opening_hours.open_now) {
          opennow.textContent = 'OPEN';
          opennow.style.cssText = 'color: #426200; background-color: #F9EDDE;'
        } else {
          opennow.textContent = 'CLOSE';
          opennow.style.cssText = 'color: #83231e; background-color: #FDE6E3;'
        }
      } else {
        opennow.textContent = 'Unavailable now';
        opennow.style.cssText = 'color: white; background-color: grey;'
      } 
      infoPane.appendChild(opennow);

      // Distance
      var userPos = new google.maps.LatLng(pos.lat, pos.lng);
      var markerPos = new google.maps.LatLng(placeResult.geometry.location.lat(), placeResult.geometry.location.lng());
      var distanceinKM = (google.maps.geometry.spherical.computeDistanceBetween(markerPos, userPos)/1000).toFixed(2);
      let distance = document.createElement('p');
      distance.classList.add('distance');
      distance.classList.add('details');
      distance.textContent = distanceinKM + ' km away';
      infoPane.appendChild(distance)

      // Address
      let address = document.createElement('p');
      address.classList.add('details');
      address.textContent = placeResult.formatted_address;
      infoPane.appendChild(address);

      // Contact phone
      if (placeResult.formatted_phone_number) {
        let phone = document.createElement('p');
        phone.classList.add('details');
        phone.textContent = placeResult.formatted_phone_number;
        infoPane.appendChild(phone);
      }

      // Website
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

      // Rating
      if (placeResult.rating) {
        let rating = document.createElement('p');
        rating.classList.add('details');
        rating.textContent = `Rating: ${placeResult.rating} \u272e`;
        infoPane.appendChild(rating);
      }

      // Open the infoPane
      infoPane.classList.add("open");
    }
</script>


<div class="h-100">

    <div id="input_area" class="col-md-10 offset-md-1 mt-5 d-flex flex-row flex-wrap justify-content-center">
        
        <div class="form-group col-md-4 d-flex align-items-center">
            <img class="img-fluid img-thumbnail mr-3" style="width: 50px; height: 50px;" src="assets/img/logo.png"/>
            <input type="text" id="keyword" name="keyword" class="form-control" placeholder="Service Type">
        </div>

        <div class="form-group col-md-4 d-flex align-items-center">
            <img class="img-fluid img-thumbnail mr-3" style="width: 50px; height: 50px;" src="assets/img/logo.png"/>
            <input type="text" id="radius" name="radius" class="form-control" placeholder="Search Radius">
        </div>

        <div class="form-group col-md-4 d-flex align-items-center">
            <img class="img-fluid img-thumbnail mr-3" style="width: 50px; height: 50px;" src="assets/img/logo.png"/>
            <select id="open" name="open" class="form-control" form="openform">
              <option value="true">True</option>
              <option value="false">False</option>
            </select>
        </div>

        <!-- <div class="form-group col-md-3 d-flex align-items-center">
            <img class="img-fluid img-thumbnail mr-3" style="width: 50px; height: 50px;" src="assets/img/logo.png"/>
            <input type="text" class="form-control" name="date" placeholder="10/04/2000">
        </div>


        <div class="form-group col-md-3 d-flex align-items-center">
            <img class="img-fluid img-thumbnail mr-3" style="width: 50px; height: 50px;" src="assets/img/logo.png"/>
            <input type="text" class="form-control" name="date" placeholder="10/04/2000">
        </div> -->

        <div class="form-group col-md-3 d-flex align-items-center">
            <img class="img-fluid img-thumbnail mr-3" style="width: 50px; height: 50px;" src="assets/img/logo.png"/>
            <!-- <a role="button" class="btn btn-outline-dark btn-block">Search</a> -->
            <button onclick="initMap()" class="btn btn-outline-dark btn-block">
              Search
            </button>
        </div>

    </div>

    <!-- <div class="col-md-10 offset-md-1 mt-2 h3"> Avaliable Results: </div> -->

    <div id="panel" class="d-flex flex-column justify-content-start"></div>
    <div id="extra" class="extraInfo" style="display: none; margin-left: 250px; z-index: 1; 
                        position: fixed; background-color: white; transition: all .2s ease-out;
                        width: 250px; height: 100%;"></div>

    <div id="map" style="width: 100%; height: 500px;"></div>
    
</div>
