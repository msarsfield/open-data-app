<?php
/**
  *Displays the selected individual location of City of Ottawa Community Garden on my open-data-app
  *
  *@package com.marysarsfield.open-data-app
  *copyright 2012
  *@author Mary Sarsfield <msarsfield@rogers.com>
  *@link http://msarsfield.github.com/open-data-app/
  *@license New BSD License <https://github.com/msarsfield/open-data-app/blob/master/copyright_license.txt>
  *version 1.0.0
  */
ini_set('display_errors', 1); 
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

if (empty($id)) {
	header('Location: index.php');
	exit;
}

require_once 'includes/db.php';
require_once 'includes/functions.php';

$sql = $db->prepare('
	SELECT id, name, longitude, latitude, street_address, rate_count, rate_total
	FROM gardens
	WHERE id = :id
');

$sql->bindValue(':id', $id, PDO::PARAM_INT);
$sql->execute();
$garden = $sql->fetch();

if (empty($garden)) {
	header('Location: index.php');
	exit;
}

$title = $garden['name'];

if ($garden['rate_count'] > 0) {
	$rating = round($garden['rate_total'] / $garden['rate_count']);
} else {
	$rating = 0;
}

$cookie = get_rate_cookie();



?>
<!DOCTYPE HTML>
<html lang=en-ca>
<head>
<meta charset=utf-8>
<title><?php if (isset($title)) { echo $title . ' · '; } ?>Ottawa Community Veggie Gardens!</title>
<link href="css/public.css" rel="stylesheet">
<script src="js/modernizr.dev.js"></script>
</head>
<body>


<h1><?php echo $garden['name']; ?></h1>

<dl>
	<dt>Average Rating</dt><dd><meter value="<?php echo $rating; ?>" min="0" max="5"><?php echo $rating; ?> out of 5</meter></dd>
	<dt>Address</dt><dd><?php echo $garden['street_address']; ?></dd>
	<dt>Longitude</dt><dd><?php echo $garden['longitude']; ?></dd>
	<dt>Latitude</dt><dd><?php echo $garden['latitude']; ?></dd>
</dl>

<?php if (isset($cookie[$id])) : ?>

<h2>Your rating </h2>
<ol class="rater rater-usable">
	<?php for ($i = 1; $i <= 5; $i++) : ?>
		<?php $class = ($i <= $cookie[$id]) ? 'is-rated' : ''; ?>
		<li class="rater-level <?php echo $class; ?>"><img src="images/rater_carrot.png" width="24" height="40" alt="image of vote carrot  1-5 carrots"></li>
	<?php endfor; ?>
</ol>

<?php else : ?>

<h2>Rate</h2>
<ol class="rater rater-usable">
	<?php for ($i = 1; $i <= 5; $i++) : ?>
	<li class="rater-level"><a href="rate.php?id=<?php echo $garden['id']; ?>&rate=<?php echo $i; ?>"><img src="images/rater_carrot.png" width="24" height="40" alt="image of vote carrot  1-5 carrots"></a></li>
	<?php endfor; ?>
</ol>

<?php endif; ?>
<footer>
	<p><strong>I hope you that enjoy this using this application to find community growing gardens.  Please share the fruit of your labour with your friends and neighbours and remember to support your local farmers!</strong></p>
</footer>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCOSF6EUJHi28FLeCSkKsQsG1gtn4vRkN4&sensor=false"></script>
<script src="js/gardens.js"></script>
<script src="js/latlng.js"></script>

</body>
</html>

	
	

