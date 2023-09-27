<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "chat_app";

$name = $_POST["name"];

if ($name === "divine") {
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Perform the database operation to clear the chat history
    $sql = "DELETE FROM chat";
    if ($conn->query($sql) === TRUE) {
        echo "Chat history cleared successfully";
    } else {
        echo "Error clearing chat history: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Access denied. Only 'divine' can clear the chat.";
}
?>
