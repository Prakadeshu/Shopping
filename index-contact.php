<?php
if (!empty($_POST["send"])) {
    $name = $_POST["userName"];
    $email = $_POST["userEmail"];
    $subject = $_POST["subject"];
    $content = $_POST["content"];

    // Database connection
    $conn = mysqli_connect("localhost", "root", "", "contactform_database");
    if (!$conn) {
        die("Connection Error: " . mysqli_connect_error());
    }

    $stmt = $conn->prepare("INSERT INTO tblcontact (user_name, user_email, subject, content) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $subject, $content);

    if ($stmt->execute()) {
        $message = "Your contact information is saved successfully.";
        $type = "success";
    } else {
        $message = "There was an error saving your information.";
        $type = "error";
    }

    $stmt->close();
    $conn->close();
}
require_once "contact-view.php";
?>
