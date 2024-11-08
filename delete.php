<?php
include 'db.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']); // Sanitizing 'id' input by casting it to an integer

    $checkSql = "SELECT * FROM playlist WHERE id=$id";
    $result = $conn->query($checkSql);

    if ($result->num_rows > 0) {
        $sql = "DELETE FROM playlist WHERE id=$id";
        if ($conn->query($sql) === TRUE) {
            header('Location: index.php?message=RecordDeleted'); // Redirect to index with a message
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    } else {
        echo "Error: Record not found.";
    }
} else {
    echo "Invalid ID parameter.";
}

$conn->close();
?>
