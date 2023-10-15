<?php
//Get login info
require "sql-login.inc.php";

//Create connection //Makes sure to close();
$conn=  new mysqli($sql_host, $sql_user, $sql_pass, $sql_db);


//Check connection
if($conn->connect_error)
  die("connect error 2831: ". $conn->connect_error);

echo "<!--sql-connect.inc.php-->";
