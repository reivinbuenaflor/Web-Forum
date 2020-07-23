<?php
require_once $_SERVER['DOCUMENT_ROOT'] .'/webforum/app/model/ThreadMod.php';
class ThreadCont extends ThreadMod
{
	public function getPost($title, $content)
	{
		$this->submitThread($title,$content);
	}

	public function checkString($title,$content)
	{
		if(strpos($title, ' ')!==false && strpos($content,' ') !== false)
		{
			//$cleanTitle = preg_replace('', replacement, subject)
		}
	}
}
?>