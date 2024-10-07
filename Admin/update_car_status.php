<?php
include 'includes/database.php'; 

if (isset($_POST['carId']) && isset($_POST['status'])) {
    $carId = $_POST['carId'];
    $status = $_POST['status'];
    $stmt = $pdo->prepare('UPDATE cars SET active = ? WHERE CarId = ?');
        if ($stmt->execute([$status, $carId])) {
        http_response_code(200);
        echo "Car status updated successfully. db";
    } else {
        http_response_code(500);
        echo "Failed to update car status. db";
    }
} else {
    http_response_code(400);
    echo "Invalid request.";
}
?>
