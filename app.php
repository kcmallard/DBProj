<?php
$servername = "localhost";
$username = "kcmallard";
$password = "titans";
$dbname = "users";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "INSERT INTO Users (username, password) VALUES ('$username', '$password')";
$result = $conn->multi_query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    }
} else {
    echo "You've been added as a new user!";
}
$conn->close();
?>