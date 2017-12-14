
<?php
session_start();
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: index.html");
  exit;
}
include 'connect.php';
$user=$_SESSION['username'];
$sql = "SELECT id,time,message,imgpath FROM `inbox` WHERE username='".$user."'";
$result = $conn->query($sql);
if ($result->num_rows==0)
{ echo "<h1>You have no messages</h1>";
  header( "refresh:2; url=welcome.php" ); 
}
else
{
echo '<div class="vertical-center">';
echo '<div class="container">';
echo '<div class="table-responsive">';
echo '<table>';
echo '<td><b>Timestamp</b></td><br><td><b>Message</b></td>';
		while($row2 = mysqli_fetch_row($result)) {
			echo '<tr>';
			for( $i = 1; $i<3; $i++ )
			echo '<td><br>',$row2[$i],'<br>';
			if($row2[3]!=NULL)
			{ 
			 echo '<br><img src="'.$row2[3].'"style="width:41.66%; max-width:500px;min-width:100px;"></td><br>';
			} 
			echo '<td><br><form action="delete.php" method="post"><input type="hidden"  name ="id" value="'.$row2[0].'"><input type="submit" value="Delete" class="btn btn-danger"></form></td>';
			echo '</tr>';
		}
		echo '</table>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
}
$conn->close();
 
?>
<!DOCTYPE html>
<html lang="en">
<style>
td {
  border: 1px solid black;
  text-align: center;
  padding:0 15px 0 15px;
}
.vertical-center {
	min-height: 100%;
	min-height: 100vh;
  display: flex;
  align-items: center;
}
</style>
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
