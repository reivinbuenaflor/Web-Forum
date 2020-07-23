<?php 
require_once $_SERVER['DOCUMENT_ROOT'] .'/webforum/app/router.php';

if(isset($_GET['thread']))
{
	$id = $_GET['thread'];
	$view = new ThreadView();

}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title><?php echo $view->threadShowTitle($id);?></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="stylesheet/thread-style.css">
</head>
<body>
	<div class="container">
			<div class="title">
				<h5><?php echo $view->threadShowTitle($id);?></h5>
			</div>
			<br>
			<div class="card">
				<div class="card-body">
					<ul class="nav nav-pills card-header-pills">
						<li class="nav-item">
        					<a class="nav-link disabled"><p class="font-weight-light">Posted by</p></a>
      					</li>
						<li class="nav-item">
							<a class="nav-link" href="#"><?php echo $view->threadShowCreatedBy($id);?></a>
						</li>
						<li class="nav-item">
        					<a class="nav-link disabled"><p class="font-weight-light"><?php echo $view->threadShowDateCreated($id);?></p></a>
      					</li>
					</ul>
					<p class="font-weight-normal"><?php echo $view->threadShowContent($id);?></p>
					<br>
					<form action="thread.php" method="post">
						<p class="font-weight-light">Comment as <?= $_SESSION['user']?></p>
						<div class="form-group">
					    	<textarea class="form-control" placeholder = "What are your thoughts?"rows="3" name="reply"></textarea>
						</div>
					</form>
					<div class="comment-border">
						<p class="font-weight-light">Comments</p>
					</div>	
				</div>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
 	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>