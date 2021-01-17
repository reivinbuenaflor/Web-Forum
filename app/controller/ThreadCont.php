<?php
require_once $_SERVER['DOCUMENT_ROOT'] .'/webforum/app/model/ThreadMod.php';

//this class handles the insertion of thread data in the database.
class ThreadCont extends ThreadMod
{	

	//this method handles the thread submission.
	public function getPost($title, $content, $id)
	{	
		if(strlen($title) <= 200)
		{
			$this->submitThread($title,$content, $id);
		}else{
			$message = 'Title exceeds in length!';
			echo "<script type='text/javascript'> alert('$message'); </script>";
		}
		
	}

	/*
	public function checkString($title,$content)
	{
		if(strpos($title, ' ')!==false && strpos($content,' ') !== false)
		{
			//$cleanTitle = preg_replace('', replacement, subject)
		}
	}
	*/
}
?>