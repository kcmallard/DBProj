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

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$pnum = $_POST['pnum'];
$cc = $_POST['cc'];
$username = $_POST['username'];
$password = $_POST['password'];

$sql = "INSERT INTO Users (fname, lname, cc, pnum, username, password) VALUES ('$fname', '$lname', '$cc', '$pnum', '$username', '$password')";
$result = $conn->multi_query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    }
} else {
    header('Location: registered.html');
}

$conn->close();
?>