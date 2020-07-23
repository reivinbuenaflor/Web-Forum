<?php
require_once $_SERVER['DOCUMENT_ROOT'] .'/webforum/app/model/AuthMod.php';

//This class will handle all the authentication and verification of users

class AuthCont extends AuthMod
{	
	//This access the AuthMod
	public function toRegister($username, $password, $email,$firstname,$middlename,$lastname,$number)
	{
		//generates unique tokens for email verification
		$token = bin2hex(random_bytes(50));

		$this->registration($username,$password,$email,$firstname,$middlename,$lastname,$number,$token);

	}

	public function toLogin($username,$password)
	{
		$this->credentials($username, $password);
	}
}
?>