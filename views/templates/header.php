<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Twitter API</title>

		<!-- Site Icon -->
		<link rel="shortcut icon" href="https://vignette.wikia.nocookie.net/pokemon/images/9/92/Twitter_Icon.png/revision/latest?cb=20170420142741" type="image/x-icon">

		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="
		sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

		<!-- Icons CDN -->
		<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js" integrity="
		sha384-SlE991lGASHoBfWbelyBPLsUlwY1GwNDJo3jSJO04KZ33K2bwfV9YBauFfnzvynJ" crossorigin="anonymous"></script>

		<!-- Custom CSS Styles -->
		<link rel="stylesheet" href="css/styles.css">

		<!-- JQuery CDN -->
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha256-3edrmyuQ0w65f8gfBsqowzjJe2iM6n0nKciPUp8y+7E=" crossorigin="anonymous"></script>

		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="
		sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	</head>
	<body>
		<nav class="navbar fixed-top navbar-expand-lg">
			<a class="navbar-brand" href="index.php"><img src="https://vignette.wikia.nocookie.net/pokemon/images/9/92/Twitter_Icon.png/revision/latest?cb=20170420142741" width="45">Twitter API</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" 
			aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
		    <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
		    	<div class="navbar-nav">
		      		<a class="nav-item nav-link" href="?controller=userTimeline&action=index"><i class="fas fa-list-ul"></i> Timelines</a>
		      		<a class="nav-item nav-link" href="?controller=searchTweets&action=index"><i class="fas fa-search"></i> Tweet Search</a>
		      		<a class="nav-item nav-link" href="?controller=searchUsers&action=index"><i class="fas fa-user"></i> User Search</a>
		    	</div>
  			</div>
		</nav>