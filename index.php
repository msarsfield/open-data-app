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
include 'includes/theme-top.php';
?>

<aside>
      
      <highlights>
      <h1>Garden Highlights</h1>
      </highlights>
    
    
    
   
   <ol class="garden">
		<?php foreach ($results as $garden) : ?>
        
		<?php
        if ($garden['rate_count'] > 0) {
        $rating = round($garden['rate_total'] / $garden['rate_count']);
        } else {
        $rating = 0;
        }
        ?>
        <li itemscope itemtype="http://schema.org/TouristAttraction" data-id="<?php echo $garden['id'];?>">
            <a href="/garden/<?php echo $garden['id']; ?>" itemprop="name"><?php echo $garden['name']; ?></a>
            <span itemprop="geo" itemscope itemtype="http://schema.org/GeoCoordinates">
                <meta itemprop="latitude" content="<?php echo $garden['latitude']; ?>">
                <meta itemprop="longitude" content="<?php echo $garden['longitude']; ?>">
            </span>
        </li>
        <meter value="<?php echo $rating; ?>" min="0" max="5"><?php echo $rating; ?> out of 5</meter>
        
        <ol class="rater">
        
		<?php for ($i = 1; $i <= 5; $i++) : ?>
        <?php $class = ($i <= $rating) ? 'is-rated' : ''; ?>
        <li class="rater-level <?php echo $class; ?>">★</li>
        <?php endfor; ?>
        </ol>
       
	   <?php endforeach; ?>
    </ol>
      
      <div id="map">
      
      </div>
      
</aside>
 
<?php include 'includes/theme-bottom.php';



