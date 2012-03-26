<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Page View</title>
</head>
<body>
	
<?php
//Track how many times you view this page - how many sessions
session_start ();
$_SESSION['page-view']+=1;


<strong>You have visited this page <?php echo $_SESSION ['page-view'];  times.</strong>
?>

</body>
</html>

