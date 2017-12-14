<?php
$target=NULL;
if(empty($_POST['message'])){
echo "Message cannot be empty";
header( "refresh:2; url=welcome.php" ); 
exit;
}
else if($_FILES['image']['name'])
{
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check == false) {
        echo "File has to be a image";
		header( "refresh:2; url=welcome.php" ); 
        exit;   
    }
   $myname = strtolower($_FILES['image']['tmp_name']);
   $save_path="images/";
   $target=$save_path.basename($_FILES['image']['tmp_name']);
   move_uploaded_file($_FILES['image']['tmp_name'],$target);
}
  include 'connect.php';
   $message = $_POST['message'];
   $user=$_POST['user'];
   $sql = "INSERT INTO `inbox`(`username`, `message`,`imgpath`) VALUES ('".$user."','".$message."','".$target."')";
   if ($conn->query($sql) === TRUE) {
    echo "Message Sent successfully";
    header( "refresh:2; url=welcome.php" ); 
}
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>
