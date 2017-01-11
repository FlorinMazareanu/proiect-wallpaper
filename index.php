<?php 
	session_start();
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html>
<head>
  <title>Home Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  
<link href="public/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="public/css/home-page.css" rel="stylesheet" type="text/css"/>
<link href="public/css/navbar.css" rel="stylesheet" type="text/css"/>


<style>
	img {
		display: none;
	}
</style>

</head>

<body>		
	<div class = "header-menu">
		<nav class="navbar navbar-default">
  			<div class="container">
    			<div class="navbar-header">
      				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        			<span class="icon-bar"></span>
        			<span class="icon-bar"></span>
        			<span class="icon-bar"></span>                        
      				</button>
      				<a class="navbar-brand" href="index.php">Home</a>
    			</div>
    			<div class="collapse navbar-collapse" id="myNavbar">
      			<ul class="nav navbar-nav">
        			<li>					
        				<?php 
						echo '<a class = "navbar-link" href = "';
						if(isset($_SESSION["userLoggedIn"])){
							echo 'views/UploadWallpaperPage.php';
							echo '">Upload</a>';
						}
						else {
							'<a class = "navbar-link" href = "';
							echo 'views/LoginPage.php';
							echo '">Upload</a>';
						}
						?>				
					</li>
					<li>
							<a class = "navbar-link" href="views/RegisterUserPage.php">Register</a>
					</li>
					<li>
						<?php 
						echo '<a class = "navbar-link" href = "';
						if(isset($_SESSION["userLoggedIn"])){
							echo 'views/LogoutHandle.php';
							echo '">Logout</a>';
						}
						else {
							'<a class = "navbar-link" href = "';
							echo 'views/LoginPage.php';
							echo '">Login</a>';
						}
					?>
					</li>
					<li>
						<?php 
						echo '<a class = "navbar-link" href = "';
						if(isset($_SESSION["userLoggedIn"])){
							echo 'views/UserPage.php';
							echo '">User Page</a>';
						}
						else {
							'<a class = "navbar-link" href = "';
							echo 'views/LoginPage.php';
							echo '">User Page</a>';
						}
						?>
					</li>

      				<form class="navbar-form navbar-left" action = "" method="POST">
      				<div class="input-group">
        				<input type="text" class="form-control" type="text" name="search" placeholder="Search wallpaper">
        				<div class="input-group-btn">
          					<button class="btn btn-default" type="submit">
            					<i class="glyphicon glyphicon-search"></i>
          					</button>
        				</div>
      				</div>
    				</form>
      			</ul>
    			</div>
  			</div>
		</nav>					
	</div>



	
	<div class = "index-header">
		<div class="container-fluid">
			<div class="row">
				<h2 class="text-center">Wallpapers</h2>
			</div>	
		</div>	
	</div>


	<div id ="wallpapers" class = "container">
		<?php  		
			include '/views/ShowSearchHandle.php';
		?>			
	</div>

	<div class = "bottom-space">
		
	</div>

	<?php 
		
	 ?>
<div>
	
</div>
	<a href="#jump-here" id = "jump-ahref">
		<div>
		
		</div>
	</a>


<script src="public/js/jquery-3.1.0.min.js"></script>
<script src="public/js/bootstrap.min.js"></script>

<script>

	$(document).ready(function(){
        $(".wallpaper-column-1").fadeIn(1000);
       	$(".wallpaper-column-2").fadeIn(2000);
        $(".wallpaper-column-3").fadeIn(3000);
	});

	
</script>
</body>
</html>


	


	