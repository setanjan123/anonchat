<?php
session_start();
 
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: index.html");
  exit;
}

include 'connect.php';
$id=$_POST['id'];
$sql1="SELECT imgpath FROM inbox WHERE id='".$id."'";
$result=mysqli_fetch_row($conn->query($sql1));
if($result)
{
$path=$result[0];
unlink($path);
}
$sql= "DELETE FROM inbox WHERE id='".$id."'";
$conn->query($sql);
$conn->close();
header("location: inbox.php");
?>