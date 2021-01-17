<?php
require_once $_SERVER['DOCUMENT_ROOT'] .'/webforum/app/database/database.php';

//thread module
class ThreadMod extends Database
{	
	//this method is for submiting a thread.
	protected function submitThread($title,$content,$catId)
	{	
		//this get the user_id and username for insertion in thread table in the database.
		$user = $_SESSION['user'];
		$getUserDetails = "SELECT user_id,username FROM users WHERE username='$user'";
		$res = $this->connection()->query($getUserDetails);

		if($res)
		{
			$rows = $res->fetch();
			$user_id = $rows['user_id'];
			$username = $rows['username'];

			$sql = "INSERT INTO thread(thread_title,thread_desc,category_category_id,users_user_id,createdby) VALUES(?,?,?,'$user_id','$username')";
			$stmt = $this->connection()->prepare($sql);

			$stmt->execute([$title,$content,$catId]);
			header('location: ../public/home.php');
		}
	}

	//this method allows for viewing the thread. The $category_id is for the id of the category, this allows to show the thread in the selected category.
	protected function threadView($category_id)
	{
		$sql = "SELECT users.username,thread.thread_id,thread.thread_title,thread.thread_desc,thread.datecreated FROM thread INNER JOIN users ON thread.users_user_id = users.user_id WHERE thread.category_category_id = '$category_id' ORDER BY thread.datecreated DESC";
		$stmt = $this->connection()->prepare($sql);
		$stmt->execute();

		return $stmt;
	}

	//this method is viewing the thread, and the comments in the thread.
	protected function onThreadSelect($thread_id)
	{
		$sql = "SELECT users.username, thread.thread_title, thread.thread_desc, thread.datecreated FROM thread INNER JOIN users ON thread.users_user_id = users.user_id WHERE thread.thread_id = '$thread_id'";
		$stmt = $this->connection()->prepare($sql);
		$stmt->execute();

		return $stmt;
	}
}
?>