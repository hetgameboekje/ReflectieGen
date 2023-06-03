<?php
function connection() {
    // Connect to the database
    $servername = "localhost";
    $username = "timo";
    $password = "timo";
    $dbname = "db_reflectie";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    } else {
        return $conn;
    }
}

$conn = connection();

?>