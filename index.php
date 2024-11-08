<?php include('db.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music Playlist</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="main-container">
        <div class="form-container">
            <form action="add.php" method="POST">
                <label for="title">Song Title:</label>
                <input type="text" name="title" required>
                
                <label for="artist">Artist:</label>
                <input type="text" name="artist" required>
                
                <label for="album">Album:</label>
                <input type="text" name="album">
                
                <label for="genre">Choose a Genre:</label>
                <select name="genre" id="genre">
                    <option value="pop">Pop</option>
                    <option value="opm">OPM</option>
                    <option value="rnb">RnB</option>
                    <option value="rock">Rock</option>
                    <option value="reggae">Reggae</option>
                    <option value="jazz">Jazz</option>
                </select>
                
                <label for="year">Year Released:</label>
                <input type="text" id="year" name="year">
                
                <button type="submit">Add Song</button>
            </form>
        </div>

        <div class="table-container">
            <h2>My Playlist</h2>

            <?php
            $results_per_page = 5;
            $sql = "SELECT COUNT(id) AS total FROM playlist";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            $total_songs = $row['total'];
            $total_pages = ceil($total_songs / $results_per_page);
            $page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
            $starting_limit = ($page - 1) * $results_per_page;

            // Fetch limited results
            $sql = "SELECT * FROM playlist LIMIT $starting_limit, $results_per_page";
            $result = $conn->query($sql);
            ?>

            <table border="1">
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Artist</th>
                    <th>Album</th>
                    <th>Genre</th>
                    <th>Year</th>
                    <th>Actions</th>
                </tr>

                <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= $row['id']; ?></td>
                        <td><?= $row['title']; ?></td>
                        <td><?= $row['artist']; ?></td>
                        <td><?= $row['album']; ?></td>
                        <td><?= $row['genre']; ?></td>
                        <td><?= $row['year']; ?></td>
                        <td>
                            <a href="edit.php?id=<?= $row['id']; ?>">Edit</a>
                            <a href="delete.php?id=<?= $row['id']; ?>">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </table>

            <div class="pagination">
                <?php if ($page > 1): ?>
                    <a href="index.php?page=<?= $page - 1; ?>">&#171; Previous</a>
                <?php endif; ?>

                <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                    <a href="index.php?page=<?= $i; ?>" class="<?= ($i == $page) ? 'active' : ''; ?>">
                        <?= $i; ?>
                    </a>
                <?php endfor; ?>

                <?php if ($page < $total_pages): ?>
                    <a href="index.php?page=<?= $page + 1; ?>">Next &#187;</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>
