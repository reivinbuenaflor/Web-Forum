<?php
require_once $_SERVER['DOCUMENT_ROOT'] .'/webforum/app/router.php';
if(!isset($_SESSION['user']))
{
  header('location: ../public/login.php');
}

if(isset($_POST['submit']))
{
	$submitPost = new ThreadCont();
	echo $_POST['content'];
	echo $_POST['id'];
	$submitPost->getPost($_POST['title'],$_POST['content'],intval($_POST['id']));
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Submit Post</title>
	<link rel="stylesheet" type="text/css" href="stylesheet/submit-style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="../public/home.php">
        Forum
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          	<li class="nav-item active">
            	<a class="nav-link" href="../public/home.php">Home <span class="sr-only">(current)</span></a>
          	</li>
        </ul>
        <ul class="navbar-nav">
        	<div>
        		
        	</div>
        </ul>
        <ul class="navbar-nav ml-auto">
    		<form class="form-inline">
    			<input class="form-control" type="search" placeholder="Search" aria-label="Search">
    			<button class="btn btn-outline-success my-2 my-sm-0 mr-sm-2" type="submit">Search</button>
			</form>
          	<div class="dropdown">
            	<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            	 	User
            	</button>
            	<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
             	 	<a class="dropdown-item" href="http://localhost/certgenerator/userProfile.php">Profile</a>
              		<a class="dropdown-item" href="http://localhost/certgenerator/changePassword.php">Change Password</a>
              		<a class="dropdown-item" href="logout.php">Logout</a>
    			</div>
          	</div>
        </ul>
      </div>
    </nav>
	<div class="container">
		<div class="title-style">
			<h5>Create a post</h5>
		</div>
		<br>
		<div class="card">
			<div class="card-body">
				<ul class="nav nav-pills card-header-pills">
					<li class="nav-item">
						<a class="nav-link" href="#">Active</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Active</a>
					</li>
				</ul>	
				<form action="submit.php" method="post">
					<div class="form-group title-content">
					    <input type="text" class="form-control" placeholder="Title" name="title" maxlength="200">
					    <div class="text-counter">
					    	<span class="text-counter-current">0 </span>
					    	<span class="text-counter-limit"> /200</span>
					    </div> 
					</div>
					<div class="form-group">
					    <textarea class="form-control" placeholder = "Text(optional)"rows="3" name="content"></textarea>
					</div>
					<input type="hidden" name="id" value="<?php echo $_GET['catid']?>">
					<div class="form-group">
					    <label for="exampleFormControlFile1">Insert image, file, or video.</label>
					    <input type="file" class="form-control-file" name="media">
				  	</div>
					<button type="submit" class="btn btn-primary" name="submit">Submit</button>
					<button type="button" class="btn btn-secondary" onclick="document.location.href='../public/home.php'">Cancel</button>					
				</form>
			</div>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>