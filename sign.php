<!DOCTYPE html>
<html>

<head>
    <title>Insert Page page</title>
</head>

<body>
    <center>
<?php
 $conn = mysqli_connect("localhost", "root", "", "regDE");

 if($conn === false){
    die("ERROR: Could not connect. "
        . mysqli_connect_error());
}

$name = $_REQUEST['uname'];
$pasword = $_REQUEST['pword'];
$firstname = $_REQUEST['fname'];
$lastname  =$_REQUEST['lname'];
$gender = $_REQUEST['gender'];
$phone = $_REQUEST['phone'];
$country = $_REQUEST['country'];
$state =$_REQUEST['state'];
$district = $_REQUEST['dist'];
$sql="INSERT INTO regDE VALUES('$name','$pasword','$firstname','$lastname','$gender','$phone','$country','$state','$district')";

// Check if the query is successful
if(mysqli_query($conn, $sql)){
   header("Location:Login.html");

} else{
    echo "ERROR: Hush! Sorry $sql. "
        . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
?>
 </center>
 
</body>

</html>