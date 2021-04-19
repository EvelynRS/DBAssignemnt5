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
    <a href="addResult.php">Add a result</a>
    <a class="active" href="viewAllTeams.php">View all teams</a>
    <a href="viewTeamResults.php">View results for a team</a>
    <a href="viewDateResults.php">View results from a date</a>
</div>

<p style="text-align:center">See all the teams below!</p>
<br>
<div class="content">


<?php
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

$sql = "SELECT TEAM_ID, TEAM_NAME, NICKNAME, RANK FROM team";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>Team ID</th><th>Team Name</th><th>Team Nickname</th><th>Team Rank</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["TEAM_ID"]. "</td><td>" . $row["TEAM_NAME"]. "</td><td> " . $row["NICKNAME"]. "</td><td> " . $row["RANK"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>

</div>

</body>
</html>