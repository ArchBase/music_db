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
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <header>
            <h1 class="logo">SANGITA</h1>
            <div class="auth-buttons">
                
                <a class="signup-btn"><?php if($username){echo $username;}else{echo 'Sign up';}?></a>
            
                <a href="../logout/logout.php"><button class="login-btn">Log out</button></a>

            </div>
        </header>
        <div class="sidebar">
            <div class="home-container">
                <a href="./index.html"><img src="./images/home.png" class="img" alt="Home Icon"></a>
                <h2 class="ho"><a href="./index.html" class="nod">HOME</a></h2>
            </div>
            <div class="home-container2">
                <a href="", id="show-search-link"><img src="./images/search.png" class="img2"></a>
                <h2 class="se"><a href="" class="nod2"> SEARCH</a></h2>
                
<div id="search-form" style="display: none;"> <!-- Initially hidden -->
    <div id="search-song-form">
        <h2>Search Songs</h2>
        <form action='../search/search.php' method='get'>
            <label for="search-term">Song Title:</label>
            <input type="text" id="search-term" name="search-term" required>
            <button type="submit">Search</button>
        </form>
    </div>
</div>

<style>
    /* Full-screen overlay for the search form */
    #search-form {
        position: fixed;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        display: flex;
        justify-content: center; /* Centers horizontally */
        align-items: center; /* Centers vertically */
        background-color: rgba(0, 0, 0, 0.8); /* Dim background */
        z-index: 1000;
    }

    /* Centered modal container for the search form */
    #search-song-form {
        background-color: #222;
        padding: 40px;
        border-radius: 10px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
        width: 90%; /* Adjusted width */
        max-width: 500px;
        text-align: center;
        color: #ffffff;
    }

    /* Heading */
    #search-song-form h2 {
        color: #d1b3ff;
        margin-bottom: 20px;
    }

    /* Label */
    #search-song-form label {
        font-size: 1.2em;
        color: #d1b3ff;
    }

    /* Input field */
    #search-song-form input[type="text"] {
        width: 100%;
        padding: 15px;
        font-size: 1.1em;
        margin-top: 10px;
        margin-bottom: 20px;
        border: none;
        border-radius: 5px;
        background-color: #333;
        color: #d1b3ff;
    }

    /* Submit button */
    #search-song-form button {
        width: 100%;
        padding: 15px;
        font-size: 1.2em;
        font-weight: bold;
        color: #ffffff;
        background-color: #4a4a7d;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    #search-song-form button:hover {
        background-color: #373764;
    }
</style>

<script>
    // JavaScript to toggle the form visibility
    document.getElementById('show-search-link').addEventListener('click', function(event) {
        event.preventDefault(); // Prevent the default anchor behavior
        const form = document.getElementById('search-form');
        form.style.display = form.style.display === 'none' ? 'flex' : 'none'; // Toggle form visibility
    });
</script>

</div>

        </div>
        <div class="sidebar2">
            
            <div class="home3">
                <img src="./images/library.png" class="sei" alt="search icon">
                <h2 class="lib">MY LIBRARY</h2>
                
                <a id="show-form-link" href="#"><img src="./images/plus.png" class="plus" alt="search icon"></a>

                <!-- Playlist form -->
                <div id="playlist-form">
    <div id="new-playlist-form">
        <h2>New Playlist</h2>
        <form action='../create_playlist/create_playlist.php' method='get'>
            <label for="playlist-name">Playlist Name:</label>
            <input type="text" id="playlist-name" name="playlist-name" required>
            <button type="submit">Submit</button>
        </form>
    </div>
</div>

<style>
    /* Full-screen overlay */
    #playlist-form {
        position: fixed;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        display: flex;
        justify-content: center; /* Centers horizontally */
        align-items: center; /* Centers vertically */
        background-color: rgba(0, 0, 0, 0.8); /* Dim background */
        z-index: 1000;
    }

    /* Centered modal container */
    #new-playlist-form {
        background-color: #222;
        padding: 40px;
        border-radius: 10px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
        width: 90%; /* Adjusted width */
        max-width: 500px;
        text-align: center;
        color: #ffffff;
        position: relative; /* Ensure positioning is relative for internal elements */
    }

    /* Heading */
    #new-playlist-form h2 {
        color: #d1b3ff;
        margin-bottom: 20px;
    }

    /* Label */
    #new-playlist-form label {
        font-size: 1.2em;
        color: #d1b3ff;
    }

    /* Input field */
    #new-playlist-form input[type="text"] {
        width: 100%;
        padding: 15px;
        font-size: 1.1em;
        margin-top: 10px;
        margin-bottom: 20px;
        border: none;
        border-radius: 5px;
        background-color: #333;
        color: #d1b3ff;
    }

    /* Submit button */
    #new-playlist-form button {
        width: 100%;
        padding: 15px;
        font-size: 1.2em;
        font-weight: bold;
        color: #ffffff;
        background-color: #4a4a7d;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    #new-playlist-form button:hover {
        background-color: #373764;
    }
</style>

    <style>
        /* Initially hide the form */
        #playlist-form {
            display: none; /* Hidden by default */
            margin-top: 20px;
        }
    </style>
    <script>
        // JavaScript to toggle the form visibility
        document.getElementById('show-form-link').addEventListener('click', function(event) {
            event.preventDefault(); // Prevent the default anchor behavior
            const form = document.getElementById('playlist-form');
            form.style.display = form.style.display === 'none' ? 'block' : 'none'; // Toggle form visibility
        });
    </script>
                
            </div>
            <div class="playlist_container">
            <?php

// Check if the user is logged in
$user_data = check_login($conn);



$user_id = intval($_COOKIE['user_id']); // Ensure user_id is treated as an integer

// Fetch playlists for the given user_id
$query = "SELECT * FROM playlists WHERE user_id = '$user_id'";
$result = mysqli_query($conn, $query);

if (!$result) {
    echo "Error fetching playlists: " . mysqli_error($conn);
    exit();
}

// Display the playlists
?>
<?php
if (mysqli_num_rows($result) > 0) {
    // Loop through each playlist and display it
    echo "<ul style='list-style-type: none; padding: 0;'>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<li style='margin: 10px 0; padding: 10px; color: #3b533; border-radius: 5px;'>";
        echo "<a href='../view_playlist/view_songs_in_playlist.php?playlist_id={$row['id']}&track=0' style='margin-left: 15px; color: #fc03cf; text-decoration: none;'><span style='font-size: 1.2em; font-weight: bold;'>{$row['name']}</span></a>"; // Display playlist name
        //echo "<a href='../view_playlist/view_songs_in_playlist.php?playlist_id={$row['id']}' style='margin-left: 15px; color: #fc03cf; text-decoration: none;'>View playlist</a>"; // Display playlist ID (optional)
        echo "</li>";
    }
    echo "</ul>";
} else {
    //echo "<p style='color: #fff; font-style: italic;'>You have no playlists yet. Create one!</p>";
}
?>

</div>
            
        </div>
        <div class="art">
            <h2 class="a">Popular Artists</h2>
            <div class="g">
            <?php
                // Fetch popular artists from the database
                $query = "SELECT * FROM artists"; // Make sure your table name and fields are correct
                $result = mysqli_query($conn, $query);

                // Loop through each artist and display their image and name
                while ($row = mysqli_fetch_assoc($result)) {
                    $artist_id = $row['id'];
                    $artist_name = $row['name'];
                    $artist_image = $row['image_path']; // Path to the artist's image
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
            <div class="bu4"><a href='../view_track/view_songs_in_track.php?playlist_id=2&track=1'><div class="cl">Classic</div></div>
            </div>
        </div>   
    </div>
</body>
</html>

