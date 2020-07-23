<?php
require_once $_SERVER['DOCUMENT_ROOT'] .'/webforum/app/database/database.php';
class ThreadMod extends Database
{
	protected function submitThread($title,$content)
	{	
		$user = $_SESSION['user'];
		$getUserDetails = "SELECT user_id,username FROM users WHERE username='$user'";
		$res = $this->connection()->query($getUserDetails);

		if($res)
		{
			$rows = $res->fetch();
			$user_id = $rows['user_id'];
			$username = $rows['username'];

			$sql = "INSERT INTO thread(users_user_id,createdby,thread_title,thread_desc) VALUES('$user_id','$username',?,?)";
			$stmt = $this->connection()->prepare($sql);

			$stmt->execute([$title,$content]);
			header('location: ../public/home.php');
		}
	}

	protected function threadView()
	{
		$sql = "SELECT users.username,thread.thread_id,thread.thread_title,thread.thread_desc,thread.datecreated FROM thread INNER JOIN users ON thread.users_user_id = users.user_id ORDER BY thread.datecreated DESC";
		$stmt = $this->connection()->prepare($sql);
		$stmt->execute();

		return $stmt;
	}

	protected function onThreadSelect($thread_id)
	{
		$sql = "SELECT users.username, thread.thread_title, thread.thread_desc, thread.datecreated FROM thread INNER JOIN users ON thread.users_user_id = users.user_id WHERE thread.thread_id = '$thread_id'";
		$stmt = $this->connection()->prepare($sql);
		$stmt->execute();

		return $stmt;
	}
}
?>