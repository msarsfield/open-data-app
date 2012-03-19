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
    
	</ul>
	
</body>
</html>

<?
$total_ratings = (3+2+3+1+5+2+3);
$total_votes = 7;
$average = $total_ratings / $total_votes;
print("The average rating for this gardent is: ");
?>
