<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pet_registration";

// Connect to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$ownerName = $_POST['ownerName'];
$petName = $_POST['petName'];
$petType = $_POST['petType'];
$age = $_POST['age'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$ownedBefore = $_POST['ownedBefore'];
$petColor = $_POST['petColor'];
$petDOB = $_POST['petDOB'];

// Insert data into the database
$sql = "INSERT INTO pets (ownerName, petName, petType, age, email, phone, address, ownedBefore, petColor, petDOB)
        VALUES ('$ownerName', '$petName', '$petType', $age, '$email', '$phone', '$address', '$ownedBefore', '$petColor', '$petDOB')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
