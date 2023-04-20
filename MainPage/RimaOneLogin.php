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
// Construct the SQL INSERT statement
$sql = "SELECT FacultyID FROM Users 
        WHERE UniqueID = '$username' && UserPassword = '$inputPassword'";
// Execute the SQL statement and check for errors
if (mysqli_query($conn, $sql)) {
    echo "Data Pulled Successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

echo "Returned rows are: " . mysqli_num_rows($result);
$rowNum = mysqli_num_rows($result);
$row = mysqli_fetch_assoc($result);
//run a for loop to print all of the results from the sql query
if($rowNum>0) echo("rowNum>0 is " . $rowNum);

for ($i=0; $i < $rowNum; $i++) { 
    echo "<pre>";
    print_r ($row);
    echo "</pre>";
    echo "<br>";
}

// Close the database connection
mysqli_close($conn);

?>
