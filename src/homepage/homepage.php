<?php
session_start();
include("../connection.php");
include("../functions.php");

check_login($conn);

$username = $_COOKIE['user_name'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sangita Music App</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <header>
            <h1 class="logo">SANGITA</h1>
            <div class="auth-buttons">
                <a class="signup-btn"><?php echo $username ? $username : 'Sign up'; ?></a>
                <a href="../logout/logout.php"><button class="login-btn">Log out</button></a>
            </div>
        </header>

        <div class="sidebar">
            <div class="home-container">
                <a href="./index.html"><img src="./images/home.png" class="img" alt="Home Icon"></a>
                <h2 class="ho"><a href="./index.html" class="nod">HOME</a></h2>
            </div>
            <div class="home-container2">
                <a href="" id="show-search-link"><img src="./images/search.png" class="img2"></a>
                <h2 class="se"><a href="" class="nod2">SEARCH</a></h2>

                <div id="playlist-form" style="display: none;">
                    <div id="new-playlist-form">
                        <h2>New Playlist</h2>
                        <form action='../create_playlist/create_playlist.php' method='get'>
                            <label for="playlist-name">Playlist Name:</label>
                            <input type="text" id="playlist-name" name="playlist-name" required>
                            <button type="submit">Submit</button>
                        </form>
                    </div>
                </div>      

                <div id="search-form" style="display: none;">
                    <div id="search-song-form">
                        <h2>Search Songs</h2>
                        <form action='../search/search.php' method='get'>
                            <label for="search-term">Song Title:</label>
                            <input type="text" id="search-term" name="search-term" required>
                            <button type="submit">Search</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>

        <div class="sidebar2">
            <div class="home3">
                <img src="./images/library.png" class="sei" alt="search icon">
                <h2 class="lib">MY LIBRARY</h2>
                <a id="show-form-link" href="#"><img src="./images/plus.png" class="plus" alt="search icon"></a>
            </div>

            <div class="playlist_container">
                <?php
                $user_data = check_login($conn);
                $user_id = intval($_COOKIE['user_id']);

                $query = "SELECT * FROM playlists WHERE user_id = '$user_id'";
                $result = mysqli_query($conn, $query);

                if (mysqli_num_rows($result) > 0) {
                    echo "<ul style='list-style-type: none; padding: 0;'>";
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<li style='margin: 10px 0; padding: 10px; color: #3b533; border-radius: 5px;'>";
                        echo "<a href='../view_playlist/view_songs_in_playlist.php?playlist_id={$row['id']}&track=0' style='margin-left: 15px; color: #fc03cf; text-decoration: none;'><span style='font-size: 1.2em; font-weight: bold;'>{$row['name']}</span></a>";
                        echo "</li>";
                    }
                    echo "</ul>";
                }
                ?>
            </div>
        </div>

        <div class="art">
            <h2 class="a">Popular Artists</h2>
            <div class="g">
                <?php
                $query = "SELECT * FROM artists";
                $result = mysqli_query($conn, $query);

                while ($row = mysqli_fetch_assoc($result)) {
                    $artist_id = $row['id'];
                    $artist_name = $row['name'];
                    $artist_image = $row['image_path'];
                    echo "<div>";
                    echo "<a href='../artist_songs/artist_songs.php?id=$artist_id'><img src='$artist_image' alt='$artist_name'></a>";
                    echo "<div class='art_name'>$artist_name</div>";
                    echo "</div>";
                }
                ?>
            </div>
        </div>

        <div class="track">
            <h2 class="t">Tracks</h2>
            <div class="but">
                <div class="bu1"><a href='../view_track/view_songs_in_track.php?playlist_id=27&track=1'><div class="mel">Melody</div></a></div>
                <div class="bu2"><a href='../view_track/view_songs_in_track.php?playlist_id=1&track=1'><div class="rap">Rap</div></a></div>
                <div class="bu3"><a href='../view_track/view_songs_in_track.php?playlist_id=33&track=1'><div class="hh">H-H</div></a></div>
                <div class="bu4"><a href='../view_track/view_songs_in_track.php?playlist_id=2&track=1'><div class="cl">Classic</div></a></div>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
    
</body>
</html>
