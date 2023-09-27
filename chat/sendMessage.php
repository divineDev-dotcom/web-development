<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "chat_app";
$name = $_POST["name"];
$message = $_POST["message"];
$conn = new mysqli($servername, $username, $password, $dbname);
$stmt = $conn->prepare("INSERT INTO chat (name, message) VALUES (?, ?)");
$stmt->bind_param("ss", $name, $message);
if ($stmt->execute()) {
    echo "Message sent successfully";
} else {
    echo "Error sending message";
}
$stmt->close();
$conn->close();
?>
