<?php 
require_once $_SERVER['DOCUMENT_ROOT'] .'/webforum/app/model/ThreadMod.php';

//thread view module
class ThreadView extends ThreadMod
{	

	//this method handles the thread view.
	public function showThreads($category_id)
	{	
		$res = $this->threadView($category_id);
		while($row = $res->fetch())
		{	
			?>
			<div class="container flex-padding" onClick="document.location.href='../public/thread.php?thread=<?php echo $row['thread_id']?>'">
			<?php
				echo '<div class="d-flex flex-row justify-content-center border border-primary rounded post-hover thread-info">';
					echo "<a href='../public/profile.php?user=".$row['username']."'><div class='p-2'>".$row['username']."</div></a>";
					echo "<div class='p-2'>".mb_strimwidth($row['thread_title'],0, 100, "...")."</div>";
					echo "<div class='ml-auto p-2'>".date('F j, Y g:i a',strtotime($row['datecreated']))."</div>";
				echo "</div>";
				echo "<div class='d-flex flex-row border post-hover thread-content'";
					echo "<div class='p-2'>".$row['thread_desc']."</div>";
				echo "</div>";
			echo "</div>";	
		}
	}

	//methods bellow handles the thread selection.
	public function threadShowCreatedBy($thread_id)
	{
		$result = $this->onThreadSelect($thread_id);

		while($row = $result->fetch())
		{
			return $row['username'];
		}
	}

	public function threadShowTitle($thread_id)
	{
		$result = $this->onThreadSelect($thread_id);

		while($row = $result->fetch())
		{
			return $row['thread_title'];
		}
	}

	public function threadShowDateCreated($thread_id)
	{
		$result = $this->onThreadSelect($thread_id);

		while ($row = $result->fetch()) 
		{
			return date('F j, Y g:i a',strtotime($row['datecreated']));
		}
	}

	public function threadShowContent($thread_id)
	{
		$result = $this->onThreadSelect($thread_id);

		while ($row = $result->fetch()) 
		{
			return $row['thread_desc'];
		}
	}
}
?>