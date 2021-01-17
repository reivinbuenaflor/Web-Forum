<?php
require_once $_SERVER['DOCUMENT_ROOT'] .'/webforum/app/database/database.php';

//This class handles the comment module.
class CommentMod extends Database
{
	//This method handles the submit comment function.
	protected function submitComment($content,$thread_id)
	{
		$user = $_SESSION['user'];
		$getUserDetails = "SELECT user_id,username FROM users WHERE username='$user'";
		$res = $this->connection()->query($getUserDetails);

		if($res)
		{
			$rows = $res->fetch();
			$user_id = $rows['user_id'];
			$username = $rows['username'];

			$sql = "INSERT INTO comment(comment_by,content,thread_thread_id,users_user_id) VALUES('$username',?,?,'$user_id')";
			$stmt = $this->connection()->prepare($sql);

			$stmt->execute([$content,$thread_id]);
			header("location: ../public/thread.php?thread=".$thread_id);
		}
	}

	protected function commentView($thread_id)
	{
		
		$sql = "SELECT comment.comment_by, comment.content, comment.date FROM comment INNER JOIN thread ON comment.thread_thread_id = thread.thread_id WHERE comment.thread_thread_id = '$thread_id' ORDER BY comment.date DESC";
		$stmt = $this->connection()->prepare($sql);
		$stmt->execute();

		return $stmt;
	}
}	
?>