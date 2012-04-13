<?php

//a small file for us to create an admin user
//THIS FILE SHOULD NEVER EVER BE PUBLICLY ACCESSIBLE!!  OK on git repository but not on PHP Fog where someone could run it to sabotage the app.


require_once 'includes/db.php';
require_once 'includes/users.php';

$email = 'Thomas';

$password = 'password';

user_create($db, $email, $password);

?>