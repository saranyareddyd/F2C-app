<!DOCTYPE HTML>
<html>
    <body bgcolor="87ceeb">
    <center><h2>Crop Details</h2></center>
    <br>
    <?php
    // Enable error reporting
    error_reporting(E_ALL);

    $db = mysqli_connect("localhost", "root", "", "regDE");

    // Check if the database connection is successful
    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $search = mysqli_real_escape_string($db, $_REQUEST["search"]);

    // Select the appropriate database
    mysqli_select_db($db, "regDE");

    $query = "SELECT name, cropName, quantity, price, place, phone FROM publish WHERE cropName LIKE '%$search%'";
    $result = mysqli_query($db, $query);

    if (mysqli_num_rows($result) > 0) {
    ?>
    <table border="2" align="center" cellpadding="5" cellspacing="5">
        <tr>
            <th>name</th>
            <th>cropName</th>
            <th>quantity</th>
            <th>place</th>
            <th>price</th>
            <th>phone</th>
        </tr>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <tr>
                <td><?php echo $row["name"]; ?></td>
                <td><?php echo $row["cropName"]; ?></td>
                <td><?php echo $row["quantity"]; ?></td>
                <td><?php echo $row["price"]; ?></td>
                <td><?php echo $row["place"]; ?></td>
                <td><?php echo $row["phone"]; ?></td>
            </tr>
        <?php
        }
    } else {
        echo "<center>No crop found with the name '$search'</center>";
    }
    ?>
    </table>
    </body>
</html>
