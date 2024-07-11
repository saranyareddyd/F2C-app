<?php
    $conn = mysqli_connect("localhost", "root", "", "regDE");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    session_start();
    $username = $_POST['uname'];
    $password = $_POST['pword'];

    $username = stripslashes($username);
    $password = stripslashes($password);
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);
    
    $sql = "SELECT * FROM regDE WHERE name = '$username' AND pasword = '$password'";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);
    
    if ($count == 1) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['uname'] = $row['name'];

        header("Location: home.html");
        exit();
    } else {
        echo "<script>alert('Login failed. Invalid username or password!!');</script>";
        header("Location: login.html");
        exit();
    }
?>
