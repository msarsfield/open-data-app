<?php

require_once 'includes/db.php';

$results = $db->query('
	SELECT id, name, longitude, latitude, street_address
	FROM gardens
	ORDER BY name ASC
');

?><!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<title>Gardens</title>
	<link href="css/public.css" rel="stylesheet">
	<script src="js/modernizr.js"></script>
</head>
<body>
      
    <ol class="garden">
    
    <?php foreach ($results as $garden) : ?>
        <li itemscope itemtype="http://schema.org/TouristAttraction">
            <a href="single.php?id=<?php echo $garden['id']; ?>" itemprop="name"><?php echo $garden['name']; ?></a>
            <span itemprop="geo" itemscope itemtype="http://schema.org/GeoCoordinates">
                <meta itemprop="latitude" content="<?php echo $garden['latitude']; ?>">
                <meta itemprop="longitude" content="<?php echo $garden['longitude']; ?>">
            </span>
        </li>
    <?php endforeach; ?>
        
    </ol>
      
      <div id="map"></div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCOSF6EUJHi28FLeCSkKsQsG1gtn4vRkN4&sensor=false"></script> <!--this is Thomas', get my own-->
	<script src="js/gardens.js"></script>

</body>
</html>

