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
$inputusername = $_POST["username"];
$inputPassword = $_POST["inputPassword"];
// Construct the SQL INSERT statement
$sql = "SELECT FacultyID FROM Users 
        WHERE UniqueID = '$inputusername' && UserPassword = '$inputPassword'";
// Execute the SQL statement and check for errors
if ($result = mysqli_query($conn, $sql)) {
    echo "Data Pulled Successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

echo "Returned rows are: " . mysqli_num_rows($result);
$rowNum = mysqli_num_rows($result);
$row = mysqli_fetch_assoc($result);
if($rowNum==0) {
    header("Location: RimaOneLogin.html?" . "notFound=true");
    exit;
}
$queryString = http_build_query($row);
// Get the number of fields (columns) in the result set
$num_fields = mysqli_num_fields($result);

// Loop through the fields and output the names
for ($i = 0; $i < $num_fields; $i++) {
    $field_info = mysqli_fetch_field_direct($result, $i);
    echo $field_info->name . '<br>';
}
// Redirect to the HTML page and pass the data in the query string
if($inputusername == "admin") header("Location: RimaOneAdmin.html?" . $field_info->name);
if($inputusername == "jSmith") header("Location: PersonalDashboard.html?" . $queryString);

// Close the database connection
mysqli_close($conn);

?>
