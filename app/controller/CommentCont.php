<?php
require_once $_SERVER['DOCUMENT_ROOT'] .'/webforum/app/model/CommentMod.php';

class CommentCont extends CommentMod
{
	public function onCommentSubmit($content,$thread_id)
	{
		$this->submitComment($content,$thread_id);
	}
}
?>