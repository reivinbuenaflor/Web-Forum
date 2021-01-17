<?php
require_once $_SERVER['DOCUMENT_ROOT'] .'/webforum/app/model/CommentMod.php';

class CommentView extends CommentMod
{

	public function showComment($thread_id)
	{
		$res = $this->commentView($thread_id);

		while($row = $res->fetch())
		{
			echo "<div class ='comment-thread'>";
				echo "<div class='comment'>";
					echo "<a class='comment-border-link'> <span class='sr-only'></span> </a>";
					echo "<div class ='comment-heading'>";
						echo "<div class ='comment-info'>";
							echo "<a href='../public/profile.php?user=".$row['comment_by']."'>".$row['comment_by']."</a>";
							echo "<p>";
								echo date('F j, Y g:i a',strtotime($row['date']));
							echo "</p>";
						echo "</div>";
					echo "</div>";
					echo "<div class='comment-body'>";
						echo "<p class='comment-content'>";
							echo $row['content'];
						echo "</p>";
					echo "</div>";
				echo "</div>";
			echo "</div>";
		}
	}
}
?>