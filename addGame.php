<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Home Page</title>
</head>
<body>

<div class="topnav">
    <a href ="home.php">Home</a>
    <a href="addTeam.php">Add a team</a>
    <a class="active" href="addGame.php">Add a game</a>
    <a href="addResult.php">Add a result</a>
    <a href="viewAllTeams.php">View all teams</a>
    <a href="viewTeamResults.php">View results for a team</a>
    <a href="viewDateResults.php">View results from a date</a>
</div>

<p style="text-align:center">Here you can add a game to the database! To do so, just fill out the form below.</p>
<br>
<div class="content">
<form action="addGame.php" method="post" class="forms">
    Home Team Rank:<input type="text" name="rank1"><br>
    
    Away Team Rank:<input type="text" name="rank2"><br>
    
    Location:<input type="text" name="location"><br>
    
    Date:</label><br>  
    <input type="date" name="date" id="dt">
    
    <input name="submit" type="submit" value="Add my game!">
</form>
</div>

</body>
</html>

<?php
if (isset($_POST['submit'])) 
{
    //echo "made it here";
    // replace ' ' with '\ ' in the strings so they are treated as single command line args
    //variables are immediately setup to be in the proper format for sql insertion
    $homerank = $_POST["rank1"];
    $homerank = "'" . (string)$homerank . "'";
    
    $awayrank = $_POST["rank2"];
    $awayrank = "'" . (string)$awayrank . "'";
    
    $location = $_POST["location"];
    $location = "'" . (string)$location . "'";
    
    $date = $_POST["date"];
    $date = "'" . (string)$date . "'";
    
    $servername = "localhost";
    $username = "mjk006";
    $password = "aiPh2tiu";
    $dbname = "mjk006";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    
    //Generates random number for team id
    for ($i = 0; $i < 5; $i++){
        $data .= mt_rand(0,9);
    }
    
    $sql = "INSERT INTO game (GAME_ID, RANK1, RANK2, LOCATION, DATE)
    VALUES ($data, $homerank, $awayrank, $location, $date)";

    if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }

}
$conn->close(); 
?>