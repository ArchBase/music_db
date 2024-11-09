<?php
session_start();
include("../connection.php");
include("../functions.php");

// Check if the user is logged in
$user_data = check_login($conn);
$playlist_name = "";

// Check if the playlist_id is provided in the GET request
if (isset($_GET['playlist_id'])) {
    $playlist_id = intval($_GET['playlist_id']); // Ensure playlist_id is treated as an integer

    // Fetch songs for the given playlist_id
    $query = "SELECT songs.* FROM songs 
              INNER JOIN playlist_songs ON songs.id = playlist_songs.song_id 
              WHERE playlist_songs.playlist_id = '$playlist_id'";
    $result = mysqli_query($conn, $query);
    $playlist_name_query = "SELECT playlists.* FROM playlists where id=$playlist_id";
    $playlist_name_result = mysqli_query($conn, $playlist_name_query);

    if (!$playlist_name_result){
        echo "Error fetching songs: " . mysqli_error($conn);
        exit();
    }

    if (!$result) {
        echo "Error fetching songs: " . mysqli_error($conn);
        exit();
    }


    if (mysqli_num_rows($playlist_name_result) > 0) {
        while ($row = mysqli_fetch_assoc($playlist_name_result)) {
            //print_r($row);
            $playlist_name = $row['name'];
        }
    }
    //echo $playlist_name;
}

    // Display the songs
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php 
            if(intval($_GET['track']) == 0){
                echo "<title>Songs in {$playlist_name}</title>";
            }
            else{
                echo "<title>{$playlist_name} songs </title>";
            }
        ?>
                 
        <style>
            /* General reset */
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }
            
            body {
                font-family: Arial, sans-serif;
                background-color: #1a1a2e; /* Dark background */
                color: #e0e0ff; /* Light text */
                padding: 20px;
                display: flex;
                flex-direction: column;
                align-items: center;
            }

            h1 {
                color: #9b59b6; /* Violet-blue accent color */
                margin-bottom: 20px;
                font-size: 2em;
                text-align: center;
            }

            .songs-container {
                width: 100%;
                max-width: 600px;
                background: #222;
                border-radius: 10px;
                padding: 20px;
                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            }

            .song {
                display: flex;
                justify-content: space-between;
                align-items: center;
                background-color: #333;
                border: 1px solid #444;
                border-radius: 8px;
                padding: 15px;
                margin-bottom: 15px;
                transition: background 0.3s;
            }

            .song:hover {
                background-color: #3a3a55;
            }

            .song h2 {
                color: #9b59b6;
                margin: 0;
                font-size: 1.2em;
            }

            .song a {
                text-decoration: none;
                color: #3498db;
                font-weight: bold;
                transition: color 0.3s;
            }

            .song a:hover {
                color: #2980b9;
            }
        </style>
    </head>
    <body>

    <h1><?php            
            if(intval($_GET['track']) == 0){
                echo "Songs in {$playlist_name}";
            }
            else{
                echo "{$playlist_name}";
            }?></h1>
    <div class="songs-container">
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class='song'>";
                echo "<h2>{$row['title']}</h2>";
                echo "<a href='../now_playing/now_playing.php?url={$row['file_path']}&id={$row['id']}' target='_blank'>Play</a>";
                echo "</div>";
            }
        } else {
            echo "<p>No songs found in this playlist.</p>";
        }
        ?>
    </div>

    </body>
    </html>
