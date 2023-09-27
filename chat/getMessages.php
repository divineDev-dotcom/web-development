<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "chat_app";
$conn = new mysqli($servername, $username, $password, $dbname);
$stmt = $conn->prepare("SELECT * FROM chat ORDER BY timestamp DESC");
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<p><strong>" . $row["name"] . ":</strong> " . $row["message"] . "</p>";
    }
} else {
    echo "No messages yet.";
}
$stmt->close();
$conn->close();
?>