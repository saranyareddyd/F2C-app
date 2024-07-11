<!DOCTYPE html>
<html>

<head>
    <title>Published</title>
</head>

<body>
    <center>
<?php
 $conn = mysqli_connect("localhost", "root", "", "regDE");

 if($conn === false){
    die("ERROR: Could not connect. "
        . mysqli_connect_error());
}

$name = $_POST['name'];
  $cropName = $_POST['crop-name'];
  $quantity = $_POST['quantity'];
  $unit = $_POST['unit'];
  $price = $_POST['price'];
  $place = $_POST['place'];
  $phone = $_POST['phone'];
$sql="INSERT INTO publish VALUES('$name','$cropName','$quantity','$unit','$price','$place','$phone')";

// Check if the query is successful
if(mysqli_query($conn, $sql)){
    echo 'Successfully published! Your crop is published.';
    echo '<br>';
    echo 'Click <a href="home.html">here</a> to go back to the home page.';
    
   
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