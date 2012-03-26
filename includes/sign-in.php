<?php
require_once 'users.php';
require_once 'db.php';

if (user_is_signed_in()) {
	header('Location: ../admin/index.php');
	exit;	
}


$errors = array();
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$password = filter_input(INPUT_POST, 'password', FILTER_UNSAFE_RAW);

IF ($_SERVER ['REQUEST_METHOD'] == "POST") {
	if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
		$errors ['email'] = true;
	
	}
	
	if (empty ($password)) {
		$errors['password'] = true;	
			
			}

	if (empty($errors)) {
		
		 $user = user_get($db, $email);
		 
		 if(!empty($user)) {
			if (passwords_match($password, $user ['password'])) {
				user_sign_in($user['id']);
				header('Location: inex.php');
				exit;			
			} else {
					$errors['password-no-match'] = true;	
				}
		 } else {
			$errors['user-non-existent'] = true;
			
		}
	}
}
?>


	<form method="post" action="sing_in.php">
    	<div>
        	<label for="email"> E-mail Address</label>   
            <input type="email" id="email" name="required">	
        </div>
        
        <div>
        	<label for="password">Password</label>   
            <input type="password" id="password" name="required">	
        </div>
		<button type="submit">Sign In</button>
        
        
     </form>
</body>
</html>