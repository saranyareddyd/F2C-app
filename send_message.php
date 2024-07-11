<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Retrieve form data
  $name = $_POST['name'];
  $message = $_POST['message'];

  // Display the message
  echo '<h1>Message Received</h1>';
  echo '<p><strong>Name:</strong> ' . $name . '</p>';
  echo '<p><strong>Message:</strong> ' . $message . '</p>';
}
?>
