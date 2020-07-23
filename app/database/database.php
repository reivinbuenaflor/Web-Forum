<?php 
require_once $_SERVER['DOCUMENT_ROOT'] .'/webforum/app/config/config.php';

class Database
{
	protected function connection()
	{
		try
		{	
			$pdo = new PDO(Config::PDO_DB, Config::PDO_USER, Config::PDO_PWD);
			$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $pdo;
		}
		catch(PDOExection $e)
		{
			echo 'Error! Message: '. $e->getMessage();
		}
	}
}

?>