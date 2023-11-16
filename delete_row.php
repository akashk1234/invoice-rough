<?php
include_once 'config.php'; // Include your database connection file or any other required configurations

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_id = $_POST['product_id'];

    try {
        $delete_query = "DELETE FROM product WHERE product_id = :product_id";
        $stmt = $pdo->prepare($delete_query);
        $stmt->bindParam(':product_id', $product_id);

        if ($stmt->execute()) {
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to delete the row']);
        }
    } catch (PDOException $e) {
        echo json_encode(['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}
?>
