<?php
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0"); // Proxies.

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
                echo "<!-- :) -->";
                include "fluff/awake.htm";
            } else {
                echo "<!-- :( -->";
                include "fluff/asleep.htm";
            }
        } else {
            echo "<b>error:0182</b>";
            include "fluff/asleep.htm";
        }
    }
} else {
    echo "No data found in the database.";
}

// Close the database connection
$conn->close();
