<!DOCTYPE html >
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=yes"/>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <title>Is there a line at H-E-B</title>

    <link rel="stylesheet" type="text/css" href="stylesheets/styles.css">
    <link rel="stylesheet" type="text/css" href="stylesheets/overlay.css">

    <script src="gMap.js"></script>
    <script src="code.js"></script>

    <?php require_once('../private/initialize.php'); ?>

  </head>
<html>
  <body>
   
    <div id="map"></div>

    <div id="ol-frame">
      <div id="ol-card">
        <div id="close-button" onclick="overlayOff()">&times;</div>
        <div id="ol-contents">
          <h2>H-E-B</h2>
          <span id="storeId"></span>
          <h2><span id="addy"></span></h2>
          <span id="ll"></span>
          
          <form id="update-form">
            <h2>Line length: <input id="formll" type="int" name="line_length" value="stock"/></h2>
            <input id="update-button" type="button" value="Update"/>
          </form>

          <script>
            document.getElementById("update-button").addEventListener("click", post);

            var myFormObj = document.forms['update-form'];
            myFormObj.elements["formll"].value = document.getElementById("ll").innerHTML;

            function post(){
            const xhr = new XMLHttpRequest();
            xhr.onload = function(){location.reload();};

            xhr.open("POST", "updateLineCount.php");
            xhr.setRequestHeader("content-type", "application/x-www-form-urlencoded");
            xhr.send("id="+document.getElementById("storeId").innerHTML+"&line_length="+myFormObj.elements["formll"].value);
          }
          </script>
          
        </div>
      </div>
    </div>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY&callback=initMap">
    </script>

  </body>
</html>
