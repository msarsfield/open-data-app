<?php

/**
  *Displays the list and map for the Open Data Set
  *
  *@package com.marysarsfield.open-data-app
  *copyright 2012
  *@author Mary Sarsfield <msarsfield@rogers.com>
  *@link http://msarsfield.github.com/open-data-app/
  *@license New BSD License 
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
	<title>Community Gardens of Ottawa</title>
	<link href="css/public.css" rel="stylesheet">
	<script src="js/modernizr.js"></script>
</head>
<body>
	
	<ul>

	<?php foreach ($results as $garden) : ?>
		<li>
			<a href="single.php?id=<?php echo $garden['id']; ?>"><?php echo $garden['name']; ?></a>
		</li>
        
              
	<?php endforeach; ?>
    
    	 <? 
//       $total_ratings = (  +  +  +  +  );
//       $total_votes = 7;
//       $average = $total_ratings / $total_votes;
//       print("This garden rates ?/5 stars")
	?>
    
	</ul>
	
</body>
</html>



