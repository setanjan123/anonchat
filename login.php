<?php
include 'connect.php';

if(empty($_POST['user'])|| empty($_POST['password']))
	{ echo "The Information you entered is incomplete";
      header( "refresh:2; url=index.html" ); 
	}

else
{
$user = $_POST['user'];
$pass = $_POST['password'];
$sql = "SELECT * FROM `users` WHERE username='".$user."' AND pass='".$pass."'";
$result = $conn->query($sql);
if ($result->num_rows==0)
{ echo "Invalid username or password";
   header( "refresh:2; url=index.html" ); 
}
else
{
 session_start();
 $_SESSION['username'] = $user;      
 header("location: welcome.php");
}
}

$conn->close();
 
?>
