<?php 
require_once $_SERVER['DOCUMENT_ROOT'] .'/webforum/app/database/database.php';

//class for category module
class CategoryMod extends Database
{
	protected function categoryCreate($category, $desc)
	{

	}

	//this method pull the categories from database and show them in screen together with number of topic.
	protected function categoryView()
	{
		$catView = "SELECT category.category_name,category.category_desc,category.category_id, COUNT(thread.category_category_id) as numberOfTopics FROM category LEFT JOIN thread ON category.category_id = thread.category_category_id GROUP BY category.category_name, category.category_desc, category.category_id";
		$stmt = $this->connection()->prepare($catView);
		$stmt->execute();

		return $stmt;
	}

	//this method get the id of selected category and print the name in the title of the page.
	protected function onCategorySelect($categoryID)
	{
		$categoryName = "SELECT category_name FROM category where category_id = '$categoryID'";
		$stmt= $this->connection()->prepare($categoryName);
		$stmt->execute();

		return $stmt;
	}
}
?>