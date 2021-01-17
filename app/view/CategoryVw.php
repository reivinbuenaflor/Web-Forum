<?php  
require_once $_SERVER['DOCUMENT_ROOT'] .'/webforum/app/model/CategoryMod.php';

//category view module.
class CategoryView extends CategoryMod
{	
	//this method handles the viewing for the category in the home page.
	public function showCategory()
	{
		$res = $this->categoryView();
		
		while ($row = $res->fetch()) 
		{
			?>
			<div class="container flex-padding" onClick="document.location.href='../public/category.php?category=<?php echo $row['category_id']?>'" >
				<?php
					echo '<div class="d-flex flex-row border border-primary rounded post-hover">';
					
						echo "<div class='p-2'>".$row['category_name']."</div>";
					
						echo "</div>";
						echo "<div class='d-flex flex-row border post-hover'";
							echo "<div class='p-2'>".$row['category_desc']."<br> Number of Discussion: ".$row['numberOfTopics']."</div>";
						echo "</div>";
					echo "</div>";	
			echo "</div>";	
		}
	}

	//this method is for showing the category name when the category is selected.
	public function categoryShowName($category_id)
	{
		$res = $this->onCategorySelect($category_id);

		while ($row = $res->fetch()) {
			return $row['category_name'];
		}
	}
}
?>