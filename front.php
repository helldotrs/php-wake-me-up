<?php
// Include the database connection file
require "inc/sql-connect.inc.php";

// Get today's day
$today = date("j");

// Query to retrieve the 'day' value from the database
$sql = "SELECT day FROM my_table";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        $dayFromDB = $row["day"];
        if (is_numeric($dayFromDB) && $dayFromDB >= 1 && $dayFromDB <= 31) {
            if ($dayFromDB == $today) {
                echo ":)";
            } else {
                echo ":(";
            }
        } else {
            echo "error:0182";
        }
    }
} else {
    echo "No data found in the database.";
}

// Close the database connection
$conn->close();
