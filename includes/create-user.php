<?php

//a small file for us to create an admin user
//THIS FILE SHOULD NEVER EVER BE PUBLICLY ACCESSIBLE!!


require_once 'includes/db.php';
require_once 'includes/users.php';

$email = 'Thomas';

$password = 'password';

user_create($db, $email, $password);

?>