
<?php

require_once 'DBconfig.php';
require_once 'DB.php';
require_once 'iis.php';

session_start(); // Start the session
// require_once '../main.js';

// Example of using the DatabaseConnection class
$database = new DB();
$SubDB = new SubDB();
$IIS = new IIS();
$conn = $database->getConnection();


// Perform your database operations using $conn

// When done, close the connection
// $database->closeConnection();

?>
