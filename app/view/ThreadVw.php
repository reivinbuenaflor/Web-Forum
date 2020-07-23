<?php 
require_once $_SERVER['DOCUMENT_ROOT'] .'/webforum/app/model/ThreadMod.php';
class ThreadView extends ThreadMod
{
	public function showThreads()
	{
		$res = $this->threadView();
		while($row = $res->fetch())
		{	
			?>
			<div class="container flex-padding" onClick="document.location.href='../public/thread.php?thread=<?php echo $row['thread_id']?>'">
			<?php
				echo '<div class="d-flex flex-row justify-content-center border border-primary rounded post-hover">';
					echo "<a href='../public/profile.php?user=".$row['username']."'><div class='p-2'>".$row['username']."</div></a>";
					echo "<div class='p-2'>".$row['thread_title']."</div>";
					echo "<div class='ml-auto p-2'>".$row['datecreated']."</div>";
				echo "</div>";
				echo "<div class='d-flex flex-row border post-hover'";
					echo "<div class='p-2'>".$row['thread_desc']."</div>";
				echo "</div>";
			echo "</div>";	
		}
	}

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
			return $row['datecreated'];
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