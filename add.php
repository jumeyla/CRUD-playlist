<?php
include 'db.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $title = $_POST['title'];
    $artist = $_POST['artist'];
    $album = $_POST['album'];
    $genre = $_POST['genre'];
    $year = $_POST['year'];

    if (!is_numeric($year)) {
        echo "Year must be a valid number.";
        exit();
    }

    $stmt = $conn->prepare("INSERT INTO playlist (title, artist, album, genre, year) VALUES (?, ?, ?, ?, ?)");
    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }

    $stmt->bind_param("ssssi", $title, $artist, $album, $genre, $year);

    if ($stmt->execute() === TRUE) {
        header('Location: index.php');
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
$conn->close();
?>
