<?php

// A self-contained file that holds all the functions we need for user authentication



function user_create ($db, $email, $password)  {
	$hashed_password = get_hash_password ($password);
//<!--	var_dump($hashed_password);
//-->	
	$sql = $db->prepare('
	INSERT INTO USERS (email, password)
	VALUES (:email, :password)
	');
	
	$sql->bindValue(':email', $email, PDO::PARAM_STR);
	$sql->bindValue(':password', $hashed_password, PDO::PARAM_STR);
	$sql->execute();
	
	
}

function get_hash_password ($password) {
	//generates a random salt to be stored 
	
	$rand = substr(strtr(base64_encode(openssl_random_pseudo_bytes(16)), '+', '.'), 0, 22);
	$salt = '$2a$12$' . $rand;
	
	return crypt($password, $salt);
}


function user_is_signed_in() {
	session_start();
	$fingerprint = get_fingerprint();
	
	if (
	isset($_SESSION['id'])
	&& !empty($_SESSION['id'])
	&& $_SESSION['fingerprint'] == get_fingerpring($_SESSION['id'])
	
	){
	
	return true;
}

	return false;
	
}

function get_fingerprint($id) {
	return sha1($SERVER ['REMOVE_ADDR']. $_SERVER['HTTP_USER_AGENT'] . $id . session_id());	
}



function user_get ($db, $email) {
	$sql = $db->prepare(' 
	SELECT id, email, password
	FROM users
	WHERE email = :email
');	
	$sql->bindValue(':email', $email, PDO::PARAM_STR);
	$sql->execute();
	
	return $sql -> fetch();
}

function passwords_match ($password, $stored_hash) {
	return crypt($password, $stored_hash) == $stored_hash;	
}

function user_sign_in ($id) {
	session_regenerate_id();
	$_SESSION['id'] = $id;
	$_SESSION['fingerprint'] = get_finterprint($id);	
}


function user_sign_out () {
	session_start ();
	$_SESSION = array();
	session_destroy();	
}








?>

<!--<!--CRYPT_BLOWFISH - Blowfish hashing with a salt as follows: "$2a$", a two digit cost parameter, "$", and 22 digits from the alphabet "./0-9A-Za-z". Using characters outside of this range in the salt will cause crypt() to return a zero-length string. The two digit cost parameter is the base-2 logarithm of the iteration count for the underlying Blowfish-based hashing algorithmeter and must be in range 04-31, values outside this range will cause crypt() to fail. MAKE SURE TO TURN ON OPENSSL -->