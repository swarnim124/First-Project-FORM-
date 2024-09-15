<?php
// Connect to the database
$conn = new mysqli('localhost', 'root', '', 'form');

// Check connection
if ($conn->connect_error) {
    die('Connection failed: '. $conn->connect_error);
}


// Get data from form
$name = $_POST['name'];
$phone = $_POST['phone'];
$doj = $_POST['doj'];
$designation = $_POST['designation'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$city = implode(', ', $_POST['city']);
$expertise = $_POST['expertise'];
$feedback = $_POST['feedback'];

// Prepare and bind statement
$stmt = $conn->prepare("INSERT INTO userdata (NAME, PHONE, DOJ, DESIGNATION, EMAIL, GENDER, PRIFEREDCITY, EXPERTIES, FEEDBACK) VALUES (?,?,?,?,?,?,?,?,?)");
$stmt->bind_param("sisssssss", $name, $phone, $doj, $designation, $email, $gender, $city, $expertise, $feedback);

// Execute statement
if ($stmt->execute()) {
    echo "Data saved successfully!";
} else {
    echo "Error: ". $stmt->error;
}

// Close statement and connection
$stmt->close();
$conn->close();
?>