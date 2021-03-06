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
	SELECT id, name, longitude, latitude, street_address, rate_count, rate_total
	FROM gardens
	ORDER BY name ASC
');

?>
<!DOCTYPE HTML>
<html lang=en-ca>
<head>
<meta charset=utf-8>
<title><?php if (isset($title)) { echo $title . ' · '; } ?> Ottawa Community Veggie Gardens!</title>
<link href="css/public.css" rel="stylesheet">
<script src="js/modernizr.dev.js"></script>
</head>
<body>
    <article id="wrapper"> 
        <header>
          <img src="images/primary_banner.png" alt="banner of 4 images of fruit and vegetable"> 
        </header>
        
             
            <button id="geo">Find Me</button>
            <form id="geo-form">
                <label for="adr">Address</label>
                <input id="adr">
            </form>
            
         <section class="main clearfix">   
            <ol class="garden">
            <?php foreach ($results as $garden) : ?>
                <?php
                    if ($garden['rate_count'] > 0) {
                        $rating = round($garden['rate_total'] / $garden['rate_count']);
                    } else {
                        $rating = 0;
                    }
                ?>
                <li itemscope itemtype="http://schema.org/TouristAttraction" data-id="<?php echo $garden['id']; ?>">
                    <strong class="distance"></strong>
                    <a href="single.php?id=<?php echo $garden['id']; ?>" itemprop="name"><?php echo $garden['name']; ?></a>
                    <span itemprop="geo" itemscope itemtype="http://schema.org/GeoCoordinates">
                        <meta itemprop="latitude" content="<?php echo $garden['latitude']; ?>">
                        <meta itemprop="longitude" content="<?php echo $garden['longitude']; ?>">
                    </span>
                    
                    <ol class="rater">
                    <?php for ($i = 1; $i <= 5; $i++) : ?>
                        <?php $class = ($i <= $rating) ? 'is-rated' : ''; ?>
                        <li class="rater-level <?php echo $class; ?>">★</li>
                    <?php endfor; ?>
                    </ol>
                </li>
            <?php endforeach; ?>
            </ol>
            
            <div id="map"></div>
        </section>	    
              
        <footer>
            <p>I hope you that you like using my community veggie garden application.  Share the fruit of your labour with your friends, and remember to <strong>support your local farmers!</strong></p>
        </footer>
	</article>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCOSF6EUJHi28FLeCSkKsQsG1gtn4vRkN4&sensor=false"></script>
<script src="js/gardens.js"></script>
<script src="js/latlng.js"></script>

</body>
</html>