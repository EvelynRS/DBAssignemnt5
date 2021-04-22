<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Home Page</title>
</head>
<body>

<div class="topnav">
    <a href ="home.php">Home</a>
    <a class="active" href="addTeam.php">Add a team</a>
    <a href="addGame.php">Add a game</a>
    <a href="addResult.php">Add a result</a>
    <a href="viewAllTeams.php">View all teams</a>
    <a href="viewTeamResults.php">View results for a team</a>
    <a href="viewDateResults.php">View results from a date</a>
</div>

<p style="text-align:center">Here you can add a team to the database! To do so, just fill out the form below.</p>
<br>
<div class="content">
    <form action="addTeam.php" method="post">
        Team_Name:<input type="text" name="team_name"><br>
        Nick_Name:<input type="text" name="nick_name"><br>
        Rank:<input type="text" name="rank"><br>

        
        <input name="submit"type="submit" value="Add my team!">
    </form>
</div>

</body>
</html>

<?php
if (isset($_POST['submit'])) 
{
    // replace ' ' with '\ ' in the strings so they are treated as single command line args
    //variables are immediately setup to be in the proper format for sql insertion
    $name = $_POST["team_name"];
    $name = "'" . (string)$name . "'";
    $nickname = $_POST["nick_name"];
    $nickname = "'" . (string)$nickname . "'";
    $rank = $_POST["rank"];
    $rank = "'" . (string)$rank . "'";

    
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
    
    $sql = "INSERT INTO team (TEAM_ID, TEAM_NAME, NICKNAME, RANK)
    VALUES ($data, $name, $nickname, $rank)";

    if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }

         
}
$conn->close(); 
?>


