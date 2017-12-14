
<?php
// Initialize the session
session_start();
 
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: index.html");
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width = device-width, initial-scale = 1">
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<style>
body {
    height: 100%;
	background-image: url("img.jpg");
	background-size: cover;
}

.vertical-center {
	min-height: 100%;
	min-height: 100vh;
  display: flex;
  align-items: center;
}

</style>
<body> 
       <div class="vertical-center">
       <div class="container">
	   <div class="row">
       <div class="col-md-4">
	   <a><h1>Welcome <?php echo $_SESSION['username'];?></h1></a>
	   </div>
	   <br>
	   <div class="col-md-8">
	   anon<span style="color:blue">Chat</span>
       <a><form action="search.php" method="post">
	   <input type="text" name="search" placeholder="Search for a user" size=40 >
       <input type="submit" value="Search" class = "btn-primary btn-md">
       </form></a>
	   <br>
	   <?php echo 'Your profile link is <b>anonchat.epizy.com/search.php?us='.$_SESSION['username'].'</b>. Share this to get messages. The sender need not have an account! :)';?>
	   <br>
	   <div class="buttons">
       <a href="inbox.php" class="btn btn-success btn-lg" role="button">Inbox</a>
       <a href="logout.php" class="btn btn-danger btn-lg" role="button">Log Out</a>
	   </div>
	   </div>
	   </div>
	   </div>
	   </div>
</body>
</html>