<?php
include 'db.php';

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM playlist WHERE id=$id");
$song = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $artist = $_POST['artist'];
    $album = $_POST['album'];
    $genre = $_POST['genre'];
    $year = $_POST['year'];

    $sql = "UPDATE playlist SET title='$title', artist='$artist', album='$album', genre='$genre', year='$year' WHERE id=$id";
    
    if ($conn->query($sql) === TRUE) {
        header('Location: index.php');
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link rel="stylesheet" href="edit.css">
</head>
<body>
    <form action="" method="POST">
        <label for="title">Song Title:</label>
        <input type="text" name="title" value="<?= $song['title']; ?>" required>
        <label for="artist">Artist:</label>
        <input type="text" name="artist" value="<?= $song['artist']; ?>" required>
        <label for="album">Album:</label>
        <input type="text" name="album" value="<?= $song['album']; ?>">
        <label for="genre">Choose a Genre:</label>

           <select name="genre" id="genre">
                    <option value="pop">Pop</option>
                    <option value="opm">OPM</option>
                    <option value="rnb">RnB</option>
                    <option value="rock">Rock</option>
                    <option value="reggae">Reggae</option>
                    <option value="jazz">Jazz</option>
           </select>

        <label for="year">Year:</label>
        <input type="text" name="year" value="<?= $song['year']; ?>">

        <button type="submit">Update Song</button>
    </form>
</body>
</html>
