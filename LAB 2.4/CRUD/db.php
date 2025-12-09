<?php
$username1 = 'root'; 
$password1 = ''; 
$dbName = 'Crud'; 
$hostName = 'localhost'; 
$port = 3307; 

$conn = mysqli_connect($hostName, $name1, $password1, $dbName, $port);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Optional: Reset Auto Increment (you can remove this if not needed)
$resetAutoIncrementQuery = "ALTER TABLE form AUTO_INCREMENT = 1;";
mysqli_query($conn, $resetAutoIncrementQuery);
?>
