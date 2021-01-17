<?php
require_once $_SERVER['DOCUMENT_ROOT'] .'/webforum/app/database/database.php';
session_start();

//This class handles the insertion, and authentication registered to database

class AuthMod extends Database
{	
	//This handles the registration of users to the database
	protected function registration($username,$password,$email,$firstname,$middlename,$lastname,$number,$token)
	{

		//checks if email and username exist in the database
		$chckEmail = "SELECT * FROM users WHERE email = '$email' OR username = '$username' LIMIT 1";
		$chck = $this->connection()->query($chckEmail);
		$res = $chck->fetchAll();
		if($res)
		{
			echo "Username or Email already exist!";
		}else
		{
			//if email does not exist, the user will be register to the database
			$sql = "INSERT INTO users(username,password,email,firstname,middlename,lastname,number,token) VALUES(?,?,?,?,?,?,?,?)";
			$stmt = $this->connection()->prepare($sql);
			$stmt->execute([$username,$password,$email,$firstname,$middlename,$lastname,$number,$token]);

			header('location: ../public/login.php');
		}
		
	}

	//checks the credibility of the user
	protected function credentials($username, $password)
	{	
		$sql = "SELECT username,password FROM users";
		$stmt = $this->connection()->query($sql);
		while($rows = $stmt->fetch())
		{	
			if($rows['username'] == $username && $rows['password'] == $password)
			{
				$_SESSION['user'] = $rows['username'];
				header('location: ../public/home.php');
			}
			else
			{
				echo "Invalid credentials!";
			}
		}
	}
}
?>