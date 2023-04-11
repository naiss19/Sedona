<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$hostname = "mysql.fsb.miamioh.edu";
$username = "sedona";
// if I add a password later use this
$password = "fsb64sedona";
// secretpaSSw0rd is the password i set up on my computer when i installed MySQL
// to connect via the terminal type "mysql -uroot"
$database = "sedona";

// Create a connection to the MySQL database
$conn = mysqli_connect($hostname, $username, $password, $database); // add $ if i add a password
print("Connect Was run");
// Check if the connection was successful
if (!$conn) {
    echo "It Broke";
    die("Connection failed: " . mysqli_connect_error());
}
print("Connect ran successfully");

// Extract the form data using $_POST
$department = $_POST["department"];
$journals = $_POST["journals"];
$quality = $_POST["quality"];

// Construct the SQL INSERT statement
$sql = "INSERT INTO PublicationTest (Department, Journal, Quality)
        VALUES ('$department', '$journals', '$quality')";
/*
$sql = "SELECT * FROM INTO Publication (Department, Journals, 'Row', 'Number', Quality)
        VALUES ('$department', '$journals', '$row', '$number', '$quality')";
        */
// Execute the SQL statement and check for errors
if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);

?>
