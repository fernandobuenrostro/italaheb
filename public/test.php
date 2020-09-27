<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="stylesheets/styles.css">
    <script src="code.js"></script>
    <?php require_once('../private/initialize.php');?>
  </head>
  <body>
  	<div id="overlay-frame">
  		<div id="close-button" onclick="overlayOff()">&times;</div>
  		<div id="overlay-card">
        <div id="overlay-contents">
    			<h2>H-E-B</h2>
          <h2>Address</h2>
          <h2 id="line-length">Line length:</h2>
          <button id="update-button">Update</button>
        </div>
  		</div>
  	</div>
	<div id="fake-map">
  		<h1 onclick="overlayOn()">Map</h1>
  	</div>
  </body>
</html>