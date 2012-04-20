<?php
/**
  *Displays the list and map for the Open Data Set
  *
  *@package com.marysarsfield.open-data-app
  *copyright 2012
  *@author Mary Sarsfield <msarsfield@rogers.com>
  *@link http://msarsfield.github.com/open-data-app/
  *@license New BSD License <https://github.com/msarsfield/open-data-app/blob/master/copyright_license.txt>
  *version 1.0.0
  */

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
	<title>Ottawa's Veggie Gardens</title>
	<link href="/css/public.css" rel="stylesheet">
	<script src="/js/modernizr.js"></script>
</head>
<body>

<aside>
      
    
    
      <highlights>
      <h1>Garden Highlights</h1>
      </highlights>
    
    <ol class="garden">
    
    <?php foreach ($results as $garden) : ?>
        <li itemscope itemtype="http://schema.org/TouristAttraction" data-id="<?php echo $garden['id'];?>">
            <a href="/garden/<?php echo $garden['id']; ?>" itemprop="name"><?php echo $garden['name']; ?></a>
            <span itemprop="geo" itemscope itemtype="http://schema.org/GeoCoordinates">
                <meta itemprop="latitude" content="<?php echo $garden['latitude']; ?>">
                <meta itemprop="longitude" content="<?php echo $garden['longitude']; ?>">
            </span>
        </li>
    <?php endforeach; ?>
        
    </ol>
      
      <div id="map">
     
      </div>
      


</aside>
 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCOSF6EUJHi28FLeCSkKsQsG1gtn4vRkN4&sensor=false"></script> <!--this is Thomas', get my own-->
	<script src="/js/gardens.js"></script>
<footer>
	<p>I hope you enjoy this site.  Remember to share the fruit of your labour and tosupport your local farmers!</p>
</footer>

</body>
</html>


