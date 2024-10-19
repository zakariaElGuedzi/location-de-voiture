<?php
include 'includes/database.php'; 

if (isset($_POST['resid']) && isset($_POST['status'])) {
    $ResId = $_POST['resid'];
    $status = $_POST['status'];
    $stmt = $pdo->prepare('UPDATE reservations SET status = ? WHERE ResId = ?');
        if ($stmt->execute([$status, $ResId])) {
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
