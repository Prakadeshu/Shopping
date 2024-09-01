<?php
// function getDatabaseConnection() {
//     $servername = "localhost";
//     $username ="root";
//     $password = "";
//     $database = "dataformdb";
//     // Create connection
//     $connection = new mysqli ($servername, $username, $password, $database);
//     if ($connection->connect_error) {
//     die("Error failed to connect to MySQL: ". $connection->connect_error);
//     }
//     return $connection;
//     }
    ?> 


<?php
function getDatabaseConnection() {
    $host = 'localhost';   
    $user = 'root';        // Username
    $password = '';        // Password (for XAMPP, usually an empty string)
    $dbname = 'dataformdb'; // Replace with your database name

    $mysqli = new mysqli($host, $user, $password, $dbname);

    // Check connection
    if ($mysqli->connect_error) {
        die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
    }

    return $mysqli;
}
?>
