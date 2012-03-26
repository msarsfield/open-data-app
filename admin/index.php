<?php


require_once '../includes/users.php';
	if (!user_is_signed_in()) {
	header('Location: ../includes/sign-in.php');
	exit;
}

require_once '../includes/db.php';

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
	<link href="../css/admin.css" rel="stylesheet">
	<script src="../js/modernizr.js"></script>    
</head>
<body>
	
    <a href="../includes/sign-out.php">Sign Out</a>
    
    <a href="add.php">Add a Garden</a>
    
	<ul>

	<?php foreach ($results as $garden) : ?>
		<li>
			<?php echo $garden['name']; ?>
            <a href="edit.php?id=<?php echo $garden['id']; ?>">Edit</a>
			<a href="delete.php?id=<?php echo $garden['id']; ?>">Delete</a>
		</li>
	<?php endforeach; ?>
   
   
	</ul>
	
</body>
</html>
