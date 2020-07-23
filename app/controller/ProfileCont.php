<?php
require_once $_SERVER['DOCUMENT_ROOT'] .'/webforum/app/model/ProfileMod.php';

class ProfileCont extends ProfileMod
{
	public function setProfile()
	{
		$this->setUserProfile();
	}
}
?>