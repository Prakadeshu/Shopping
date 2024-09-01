<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $phoneNumber = $_POST['phoneNumber'];
    $address = $_POST['address'];
    $UPI_id = $_POST['UPI_id'];

    // Connect to the database
    $conn = new mysqli('localhost', 'root', '', 'customer_payment');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert data into  table
    $sql = "INSERT INTO advanced_membership (name, phoneNumber, address, UPI_id) VALUES (?, ?, ?, ?)";

    // Prepare statement to prevent SQL injection
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $name, $phoneNumber, $address, $UPI_id);

    if ($stmt->execute()) {
        // Set a success message in session
        $_SESSION['message'] = "Well done! You're a Member of Riverdale shopping.";
        // Redirect to the form page to display the message
        header("Location: advanced_form.php");
        exit();
    } else {
        // Handle errors during data insertion
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>