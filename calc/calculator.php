<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $num1 = floatval($_POST["num1"]);
    $num2 = floatval($_POST["num2"]);
    $operation = $_POST["operation"];
    $conn = new mysqli("localhost", "root", "", "blogs");
    $tableName = "calc_result";
    $createTableSQL = "CREATE TABLE IF NOT EXISTS $tableName (
        id INT AUTO_INCREMENT PRIMARY KEY,
        num1 FLOAT,
        num2 FLOAT,
        operation VARCHAR(10),
        result FLOAT
    )";
    if ($conn->query($createTableSQL) === FALSE) {
        echo "Error creating table: " . $conn->error;
    }
    $result = performCalculation($num1, $num2, $operation);
    $insertData = "INSERT INTO $tableName (num1, num2, operation, result) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($insertData);
    $stmt->bind_param("ddsd", $num1, $num2, $operation, $result);   
    if ($stmt->execute() === FALSE) {
        echo "Error inserting data: " . $stmt->error;
    }
    $stmt->close();
    echo$result;
}

function performCalculation($num1, $num2, $operation) {
    switch ($operation) {
        case "add":
            return $num1 + $num2;
        case "subtract":
            return $num1 - $num2;
        case "multiply":
            return $num1 * $num2;
        case "divide":
            if ($num2 != 0) {
                return $num1 / $num2;
            } else {
                return "Cannot divide by zero";
            }
        default:
            return "Invalid operation";
    }
}
?>