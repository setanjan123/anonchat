<?php
include 'connect.php';
if(empty($_POST['user'])|| empty($_POST['pass']))
	{ echo "The Information you entered is incomplete";
      header( "refresh:2; url=register.html" ); 
	}
else {
 $user = $_POST['user'];
 $pass = $_POST['pass'];
$sql = "SELECT username FROM `users` WHERE username='".$user."'";
$result = $conn->query($sql);
if ($result->num_rows!=0)
{ echo "Username already exists. Use another one";
   header( "refresh:2; url=register.html" ); 
}
else
{
 
 $sql = "INSERT INTO `users`(`username`,`pass`) VALUES ('".$user."', '".$pass."')";

if ($conn->query($sql) === TRUE) {
    echo "New account created successfully. Now you can login with your details";
	header( "refresh:2; url=index.html" ); 
}
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
}
$conn->close();
?>