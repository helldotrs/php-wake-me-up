<?php if (!isset($_GET['this']) || $_GET['this'] !== 'that') { die(); } ?>

<?php
require "inc/sql-connect.inc.php"; // Include database connection file
require "inc/user-password.inc.php"; // Include password hash file

// Initialize variables
$passwordError = $successMessage = "";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the input MD5 hash from the form
    $inputHash = md5($_POST["password"]);

    // Check if the input hash matches the stored hash
    if ($inputHash == $user_password) {
        // Get today's day
        $day = date("j");

        // Update the 'day' value in the database
        $sql = "UPDATE my_table SET day = $day";
        if ($conn->query($sql) === TRUE) {
            $successMessage = "Success";
        } else {
            $successMessage = "Error updating record: " . $conn->error;
        }
    } else {
        $passwordError = "Incorrect password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>

<body>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="password">Password: </label>
        <input type="password" id="password" name="password" required>
        <button type="submit">Submit</button>
    </form>

    <?php
    echo "<p style='color: green;'>$successMessage</p>";
    echo "<p style='color: red;'>$passwordError</p>";
    ?>

</body>

</html>

<?php
// Close the database connection
$conn->close();
?>
