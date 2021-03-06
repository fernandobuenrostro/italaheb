function initMap() {
  var map = new google.maps.Map(document.getElementById('map'), {
    center: new google.maps.LatLng(27.516827, -99.468197),
    zoom: 12
  });
  var infoWindow = new google.maps.InfoWindow;

  // Change this depending on the name of your PHP or XML file
  downloadUrl('../private/export_xml.php', function(data) {
    var xml = data.responseXML;
    var markers = xml.documentElement.getElementsByTagName('marker');
    Array.prototype.forEach.call(markers, function(markerElem) {
      var id = markerElem.getAttribute('id');
      var name = markerElem.getAttribute('name');
      var address = markerElem.getAttribute('address');
      var line_length = markerElem.getAttribute('line_length');
      var point = new google.maps.LatLng(
          parseFloat(markerElem.getAttribute('lat')),
          parseFloat(markerElem.getAttribute('lng')));

      var infowincontent = document.createElement('div');
      var strong = document.createElement('strong');
      strong.textContent = name;
      infowincontent.appendChild(strong);
      infowincontent.appendChild(document.createElement('br'));

      var text = document.createElement('text');
      text.textContent = address
      infowincontent.appendChild(text);
      var icon = line_length;
      var marker = new google.maps.Marker({
        map: map,
        position: point,
        label: {text: icon, color: "white"}
      });
      marker.addListener('mouseover', function() {
        infoWindow.setContent(infowincontent);
        infoWindow.open(map, marker);
      });
      marker.addListener('click', function(){
        document.getElementById("ol-frame").style.display = "block";
        document.getElementById("storeId").innerHTML = id;
        document.getElementById("addy").innerHTML = address;
        document.getElementById("ll").innerHTML = line_length;
      });
    });
  });
}

function downloadUrl(url, callback) {
  var request = window.ActiveXObject ?
    new ActiveXObject('Microsoft.XMLHTTP') :
    new XMLHttpRequest;

  request.onreadystatechange = function() {
    if (request.readyState == 4) {
        request.onreadystatechange = doNothing;
        callback(request, request.status);
    }
  };

  request.open('GET', url, true);
  request.send(null);
}

function doNothing() {}