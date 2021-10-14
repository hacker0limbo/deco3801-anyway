<!DOCTYPE html>

<link rel="stylesheet" href="assets/css/mapstyle.css">
<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
<meta charset="utf-8">

<script 
  async 
  defer 
  src="https://maps.googleapis.com/maps/api/js?language=<?php echo strcmp($this->session->userdata('language'), 'english') == 0 ? 'en-US' : 'zh-CN'?>&key=AIzaSyDx0fQTqb3b18e6jy_QIoAO01bPgzAraFk&libraries=places&callback=initMap">
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
      extraPane = document.getElementById('accordion');

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
      var radius = 2500; //2500 in meters
      var openStatus;

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

      // Open now input
      if (document.getElementById('open').value == 'true') {
        openStatus = true;
      } else { openStatus = false;}

      let request = {
        location: position,
        radius: radius,
        keyword: keyword,
        openNow: openStatus,
        // pageToken: 5,
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

      randomString = date + ' ' + time;
      return randomString; 
    }
    // Generate random bill type
    function randomBill() {
      var billList = ['Fees and Bulk Billing', 'Bulk Billing Only', 'No Fee'];
      var bill = billList[Math.floor(Math.random()*billList.length)];
      return bill
    }


    // Extra info function
    function showExtraPanel(placeResult) {
      // Clear the previous details
      while (extraPane.lastChild) {
        extraPane.removeChild(extraPane.lastChild);
      }

      // Address
      let addressHeader = document.createElement('h6');
      addressHeader.textContent = "Address";
      extraPane.appendChild(addressHeader);
      let address = document.createElement('p');
      address.style.cssText = "font-size: 12px;"
      address.textContent = placeResult.formatted_address;
      extraPane.appendChild(address);

      // Contact
      let contactHeader = document.createElement('h6');
      contactHeader.textContent = "Contact";
      extraPane.appendChild(contactHeader);
      if (placeResult.formatted_phone_number) {
        let contact = document.createElement('p');
        contact.style.cssText = "font-size: 12px;"
        contact.textContent = placeResult.formatted_phone_number;
        extraPane.appendChild(contact);
      }
      
      // Description
      let descriptionHeader = document.createElement('h6');
      descriptionHeader.textContent = "Description";
      extraPane.appendChild(descriptionHeader);
      let description = document.createElement('p');
      description.style.cssText = "font-size: 12px;"
      description.textContent = `${placeResult.name} is a medical institution near you.`;
      extraPane.appendChild(description);

      // Type Tag
      let tagHeader = document.createElement('h6');
      tagHeader.textContent = "Tags";
      extraPane.appendChild(tagHeader);
      for (var type of placeResult.types) {
        let tag = document.createElement('span');
        tag.textContent = type;
        tag.style.cssText = "font-size: 12px;"
        extraPane.appendChild(tag);
      }

      // Split line
      let split = document.createElement('hr');
      extraPane.appendChild(split);

      // Opening hours
      // Opening hour heading
      let openTitleContent = document.createElement('a');
      openTitleContent.setAttribute("data-toggle", "collapse");
      openTitleContent.setAttribute("data-parent", "#accordion");
      openTitleContent.setAttribute("href", "#collapseOne");
      openTitleContent.textContent = 'Opening Hours';

      let openTitle = document.createElement('h6');
      openTitle.classList.add('panel-title');
      openTitle.appendChild(openTitleContent);

      let openHead = document.createElement('div');
      openHead.classList.add('panel-heading');
      openHead.appendChild(openTitle);

      // Opening hour body content 
      let openBodyContent = document.createElement('div');
      openBodyContent.classList.add('panel-body');
      openBodyContent.style.cssText = 'font-size: 12px;';
      if(placeResult.opening_hours) {
        for (var time of placeResult.opening_hours.weekday_text) {
          let a = document.createElement('p');
          a.textContent = time;
          openBodyContent.appendChild(a);
        }
      } else {
        let a = document.createElement('p');
          a.textContent = 'Currently unavailable';
        openBodyContent.appendChild(a);
      }

      let openBody = document.createElement('div');
      openBody.classList.add('panel-collapse');
      openBody.classList.add('collapse');
      openBody.classList.add('in');
      openBody.setAttribute("id", "collapseOne");
      openBody.appendChild(openBodyContent);

      let openContainer = document.createElement('div');
      openContainer.classList.add('panel');
      openContainer.classList.add('panel-default');
      openContainer.appendChild(openHead);
      openContainer.appendChild(openBody);

      extraPane.appendChild(openContainer);
      
      // Split line 1
      let split1 = document.createElement('hr');
      extraPane.appendChild(split1);

      // Booking
      // Booking heading
      let bookTitleContent = document.createElement('a');
      bookTitleContent.setAttribute("data-toggle", "collapse");
      bookTitleContent.setAttribute("data-parent", "#accordion");
      bookTitleContent.setAttribute("href", "#collapseTwo");
      bookTitleContent.textContent = 'Booking';

      let bookTitle = document.createElement('h6');
      bookTitle.classList.add('panel-title');
      bookTitle.appendChild(bookTitleContent);

      let bookHead = document.createElement('div');
      bookHead.classList.add('panel-heading');
      bookHead.appendChild(bookTitle);

      // Booking body content 
      let bookBodyContent = document.createElement('div');
      bookBodyContent.classList.add('panel-body');
      bookBodyContent.style.cssText = 'font-size: 12px;';
      bookBodyContent.textContent = "Next available: " + this.randomTime();

      let bookBody = document.createElement('div');
      bookBody.classList.add('panel-collapse');
      bookBody.classList.add('collapse');
      bookBody.classList.add('in');
      bookBody.setAttribute("id", "collapseTwo");
      bookBody.appendChild(bookBodyContent);

      let bookContainer = document.createElement('div');
      bookContainer.classList.add('panel');
      bookContainer.classList.add('panel-default');
      bookContainer.appendChild(bookHead);
      bookContainer.appendChild(bookBody);

      extraPane.appendChild(bookContainer);

      // Split line 2
      let split2 = document.createElement('hr');
      extraPane.appendChild(split2);
      
      // Billking
      // Billking heading
      let billTitleContent = document.createElement('a');
      billTitleContent.setAttribute("data-toggle", "collapse");
      billTitleContent.setAttribute("data-parent", "#accordion");
      billTitleContent.setAttribute("href", "#collapseThree");
      billTitleContent.textContent = 'Billing';

      let billTitle = document.createElement('h6');
      billTitle.classList.add('panel-title');
      billTitle.appendChild(billTitleContent);

      let billHead = document.createElement('div');
      billHead.classList.add('panel-heading');
      billHead.appendChild(billTitle);

      // Booking body content 
      let billBodyContent = document.createElement('div');
      billBodyContent.classList.add('panel-body');
      billBodyContent.style.cssText = 'font-size: 12px;';
      billBodyContent.textContent = "Billing type: " + this.randomBill();

      let billBody = document.createElement('div');
      billBody.classList.add('panel-collapse');
      billBody.classList.add('collapse');
      billBody.classList.add('in');
      billBody.setAttribute("id", "collapseThree");
      billBody.appendChild(billBodyContent);

      let billContainer = document.createElement('div');
      billContainer.classList.add('panel');
      billContainer.classList.add('panel-default');
      billContainer.appendChild(billHead);
      billContainer.appendChild(billBody);

      extraPane.appendChild(billContainer);
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
        document.getElementById('accordion').style.display="none";
      }

      //Create extra information panel button
      let button = document.createElement('button');
      button.classList.add('btn');
      button.classList.add('align-self-end');
      button.style.cssText = 'width: 100px;';
      button.textContent = '☰ More';
      button.setAttribute("onclick", "display('accordion')");
      infoPane.appendChild(button);

      // Place photo
      if (placeResult.photos) {
        let firstPhoto = placeResult.photos[0];
        let photo = document.createElement('img');
        photo.classList.add('hero');
        photo.style.cssText = 'padding: 25px;'
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
      // infoPane.appendChild(opennow);

      // Distance
      var userPos = new google.maps.LatLng(pos.lat, pos.lng);
      var markerPos = new google.maps.LatLng(placeResult.geometry.location.lat(), placeResult.geometry.location.lng());
      var distanceinKM = (google.maps.geometry.spherical.computeDistanceBetween(markerPos, userPos)/1000).toFixed(2);
      let distance = document.createElement('p');
      distance.classList.add('distance');
      distance.classList.add('details');
      distance.textContent = distanceinKM + ' km away ';

      distance.appendChild(opennow);
      infoPane.appendChild(distance);
  

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
    <div id="input_area" class="col-md-10 offset-md-1 mt-5 d-flex flex-row flex-wrap justify-content-center" style="margin-left: 0; max-width: 100%;">
        <p class=" col-md-4 d-flex align-items-center" style="max-width: fit-content;"> <?php echo $filterInstruction?></p>
        <div class="form-group col-md-4 d-flex align-items-center" style="max-width: 140px;">
            <input type="text" id="keyword" name="keyword" class="form-control" placeholder="<?php echo $serviceType?>" style="width: 130px;">
        </div>

        <div class="form-group col-md-4 d-flex align-items-center" style="max-width: 120px;">
            <input type="text" id="radius" name="radius" class="form-control" placeholder="<?php echo $distance?>" style="width: 110px;">
        </div>

        <div class="form-group col-md-4 d-flex align-items-center" style="max-width: 170px;">
            <select id="open" name="open" class="form-control" form="openform" style="width: 160px;">
              <option value="false"><?php echo $availableNow?></option>
              <option value="true"><?php echo $availableLater?></option>
            </select>
        </div>

        <div class="form-group col-md-4 d-flex align-items-center" style="max-width: 160px;">
            <input type="text" class="form-control" name="date" placeholder="<?php echo $openingHours?>" style="width: 150px;">
        </div>


        <div class="form-group col-md-4 d-flex align-items-center" style="max-width: 140px;">
            <input type="text" class="form-control" name="date" placeholder="<?php echo $languages?>" style="width: 130px;">
        </div>

        <div class="form-group col-md-3 d-flex align-items-center" style="max-width: 140px;">
            <!-- <a role="button" class="btn btn-outline-dark btn-block">Search</a> -->
            <button onclick="initMap()" class="btn btn-outline-dark btn-block">
              <?php echo $search?>
            </button>
        </div>

    </div>

    <div class="wrapper d-flex flex-row "> 
      <div id="panel" class="d-flex flex-column justify-content-start" style="height: 500px; width: 20%;">
        <div style="height: 100%; width: 100%; font-size:30px; padding-top: 20px; padding-left: 20px;"> 
          <p style="font-size: 18; max-width: 240px;"><?php echo $panelInstruction?> </p>
        </div>
      </div>
      <div id="accordion" class="extraInfo" style="display: none; z-index: 1; 
                          background-color: white; transition: all .2s ease-out;
                          height: 500px; width: 20%; overflow: scroll; padding: 25px;"></div>
      <div id="map" style="width: 80%; height: 500px;"></div>
    </div>
    
</div>
