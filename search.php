<?php
session_start();
$flag=1;
$search="";
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  $flag=0;
}
include 'connect.php';
if (!empty($_POST['search'])){
    $search = preg_replace('/\s+/', '',$_POST['search']);
}
else if(!empty($_GET['us']))
{
    $search = preg_replace('/\s+/', '',$_GET['us']);
}
   
if (empty($search)){
echo "<h1>You haven't entered anything to search</h1>";
header( "refresh:2; url=welcome.php" ); 
}
else
{
if($flag==1)
{
    $user=$_SESSION['username'];
    $sql = "SELECT username FROM `users` WHERE username LIKE '%".$search."%' AND username  NOT LIKE '%".$user."%'";
    $result = $conn->query($sql);
}
else
{
    $sql = "SELECT username FROM `users` WHERE username LIKE '%".$search."%'";
    $result = $conn->query($sql);
}
   if ($result->num_rows==0)
   { echo "<h1>No users found</h1>";
  header( "refresh:2; url=welcome.php" ); 
  }
else
{
echo '<div class="container">';
echo '<table>';
		while($row2 = mysqli_fetch_row($result)) {
			echo '<tr>';
			foreach($row2 as $row) 
			{ echo '<td><br><b>Username: ',$row,'</b><form action="send.php" method="post" enctype="multipart/form-data">
              <input type="text" name="message" size=50>
			  <input type="file" name="image">
			  <input type="hidden" name="user" value="'.$row.'">
              <input type="submit" value="Send Message" class="btn btn-primary">
              </form></b></td>';
			echo '</tr>';
			}
		}
		echo '</table><br />';
		echo '</div>';
}
}
$conn->close();
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width = device-width, initial-scale = 1">
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<body style="background-image:url(img.jpg)">
<div class="text-right">
<a href="welcome.php" class="btn btn-default">Back</a>
</div>
</html>





