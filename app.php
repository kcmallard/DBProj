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

// //SQL Injection Susceptible
// $fname = $_POST['fname'];
// $lname = $_POST['lname'];
// $pnum = $_POST['pnum'];
// $cc = $_POST['cc'];
// $username = $_POST['username'];
// $password = $_POST['password'];

// $sql = "INSERT INTO Users (fname, lname, cc, pnum, username, password) VALUES ('$fname', '$lname', '$cc', '$pnum', '$username', '$password')";
// $result = $conn->multi_query($sql);

//Using prepared statements to defend against SQL injections
$stmt = $conn->prepare("INSERT INTO Users (fname, lname, cc, pnum, username, password) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssss", $fname, $lname, $cc, $pnum, $username, $password);

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$pnum = $_POST['pnum'];
$cc = $_POST['cc'];
$username = $_POST['username'];
$password = $_POST['password'];
$stmt->execute();
$stmt->close();

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