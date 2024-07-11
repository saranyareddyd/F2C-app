<?php
$conn = mysqli_connect("localhost", "root", "", "regDE");

if ($conn === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$name = mysqli_real_escape_string($conn, $_REQUEST['uname']);
$password = mysqli_real_escape_string($conn, $_REQUEST['pword']);
$firstname = mysqli_real_escape_string($conn, $_REQUEST['fname']);
$lastname = mysqli_real_escape_string($conn, $_REQUEST['lname']);
$gender = mysqli_real_escape_string($conn, $_REQUEST['gender']);
$phone = mysqli_real_escape_string($conn, $_REQUEST['phone']);
$country = mysqli_real_escape_string($conn, $_REQUEST['country']);
$state = mysqli_real_escape_string($conn, $_REQUEST['state']);
$district = mysqli_real_escape_string($conn, $_REQUEST['dist']);

$sql = "INSERT INTO DETAILS (name, password, firstname, lastname, gender, phone, country, district)
        VALUES ('$name', '$password', '$firstname', '$lastname', '$gender', '$phone', '$country', '$district')";

// Execute the query
if (mysqli_query($conn, $sql)) {
    echo "<h3>Data stored in the database successfully.</h3>";
    echo nl2br("$firstname\n$lastname\n$gender\n$phone\n$state");
} else {
    echo "ERROR: Unable to execute $sql. " . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
?>
