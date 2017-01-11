	<div class = "header-menu">
		<nav class="navbar navbar-default">
  			<div class="container">
    			<div class="navbar-header">
      				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        			<span class="icon-bar"></span>
        			<span class="icon-bar"></span>
        			<span class="icon-bar"></span>                        
      				</button>
      				<a class="navbar-brand" href="../index.php">Home</a>
    			</div>
    			<div class="collapse navbar-collapse" id="myNavbar">
      			<ul class="nav navbar-nav">
        			<li>					
        				<?php 
						echo '<a class = "navbar-link" href = "';
						if(isset($_SESSION["userLoggedIn"])){
							echo '../views/UploadWallpaperPage.php';
							echo '">Upload</a>';
						}
						else {
							'<a class = "navbar-link" href = "';
							echo '../views/LoginPage.php';
							echo '">Upload</a>';
						}
						?>				
					</li>
					<li>
							<a class = "navbar-link" href="../views/RegisterUserPage.php">Register</a>
					</li>
					<li>
						<?php 
						echo '<a class = "navbar-link" href = "';
						if(isset($_SESSION["userLoggedIn"])){
							echo '../views/LogoutHandle.php';
							echo '">Logout</a>';
						}
						else {
							'<a class = "navbar-link" href = "';
							echo '../views/LoginPage.php';
							echo '">Login</a>';
						}
					?>
					</li>
					<li>
						<?php 
						echo '<a class = "navbar-link" href = "';
						if(isset($_SESSION["userLoggedIn"])){
							echo '../views/UserPage.php';
							echo '">User Page</a>';
						}
						else {
							echo '<a class = "navbar-link" href = "';
							echo '../views/LoginPage.php';
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

	<script>

		$(document).ready(function(){
  			$(".navbar-link").mouseover(function(){
    			$(this).css({transition : 'background-color 0.3s ease-in-out',"background-color": "#0b3c5d"});
  			}); 
  			$(".navbar-link").mouseout(function(){
    			$(this).css({transition : 'background-color 0.3s ease-in-out',"background-color": "#328cc1"});
  			});
		});

	</script>