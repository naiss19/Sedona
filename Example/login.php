<?php
$hostname = "localhost";
$username = "root";
// if I add a password later use this
//$password = "fsb64sedona";
// secretpaSSw0rd is the password i set up on my computer when i installed MySQL
// to connect via the terminal type "mysql -uroot"
$database = "ISA406";

// Create a connection to the MySQL database
$conn = mysqli_connect($hostname, $username, $database); // add $ if i add a password
print("Connect Was run");
// Check if the connection was successful
if (!$conn) {
    echo "It Broke";
    //die("Connection failed: " . mysqli_connect_error());
}
print("Connect ran successfully");
/*
// Extract the form data using $_POST
$department = $_POST["Department"];
$journals = $_POST["Journals"];
$row = $_POST["Row"];
$number = $_POST["Number"];
$quality = $_POST["Quality"];

// Construct the SQL INSERT statement
$sql = "INSERT INTO Publication (Department, Journals, 'Row', 'Number', Quality)
        VALUES ('$department', '$journals', '$row', '$number', '$quality')";
*//*
$sql = "SELECT * FROM INTO Publication (Department, Journals, 'Row', 'Number', Quality)
        VALUES ('$department', '$journals', '$row', '$number', '$quality')";
// Execute the SQL statement and check for errors
if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
*/
// Close the database connection
mysqli_close($conn);

?>
