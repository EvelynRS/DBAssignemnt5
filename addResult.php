<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Home Page</title>
</head>
<body>

<div class="topnav">
    <a href ="home.php">Home</a>
    <a href="addTeam.php">Add a team</a>
    <a href="addGame.php">Add a game</a>
    <a class="active" href="addResult.php">Add a result</a>
    <a href="viewAllTeams.php">View all teams</a>
    <a href="viewTeamResults.php">View results for a team</a>
    <a href="viewDateResults.php">View results from a date</a>
</div>

<p style="text-align:center">See all the Game IDs below!</p>
<br>
<div class="content">


<?php
    $servername = "localhost";
    $username = "ers007";
    $password = "shei1Iex";
    $dbname = "ers007";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT GAME_ID, RANK1, RANK2, LOCATION, DATE FROM game";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>Game ID</th><th>Home Team Rank</th><th>Away Team Rank</th><th>Location</th><th>Date</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["GAME_ID"]. "</td><td>" . $row["RANK1"]. "</td><td> " . $row["RANK2"]. "</td><td> " . $row["LOCATION"]. "</td><td>" . $row["DATE"]. "</td></tr> ";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>






<p style="text-align:center">Here you can add a game's results to the database! To do so, just fill out the form below.</p>
<br>
<div class="content">
<form action="addResult.php" method="post" class="forms">
    Game ID:<input type="text" name="game_id" required><br>
    Home Team ID:<input type="text" name="home_team" required><br>
    Away Team ID:<input type="text" name="away_team" required><br>
    Home Team Score:<input type="text" name="home_score" required><br>
    Away Team Score:<input type="text" name="away_score" required><br>    
    <input name="submit" type="submit" value="Add my results!">
</form>

<?php
if (isset($_POST['submit'])) 
{
    //echo "made it here";
    // replace ' ' with '\ ' in the strings so they are treated as single command line args
    //variables are immediately setup to be in the proper format for sql insertion
    $gameid = $_POST["game_id"];
    $gameid = "'" . (string)$gameid . "'";
    
    $homename = $_POST["home_team"];
    $homename = "'" . (string)$homename . "'";
    
    $awayname = $_POST["away_team"];
    $awayname = "'" . (string)$awayname . "'";
    
    $homescore = $_POST["home_score"];
    $homescore = "'" . (string)$homescore . "'";
    
    $awayscore = $_POST["away_score"];
    $awayscore = "'" . (string)$awayscore . "'";

    
    $servername = "localhost";
    $username = "ers007";
    $password = "shei1Iex";
    $dbname = "ers007";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM game WHERE GAME_ID=$gameid";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) { 
        $sql = "INSERT INTO result (GAME_ID, TEAM_ONE_ID, TEAM_TWO_ID, SCORE_ONE, SCORE_TWO)
        VALUES ($gameid, $homename, $awayname, $homescore, $awayscore)";

        if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    else {
        echo "Game Id does not exist, please select a Game ID from the table above.";
    }

         
}
$conn->close(); 
?>

</div>

</body>
</html>

