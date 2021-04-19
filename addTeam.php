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
    <form class="forms">
        <label for="tname">Team Name:</label>
        <input type="text" name="name" id="tname" value="<?php echo $name;?>"> <br>
        <label for="nname">Nickname:</label>
        <input type="text" name="nickname" id="nname" value="<?php echo $nickname;?>"> <br>
        <label for="trank">Rank:</label>
        <input type="text" name="rank" id="trank" value="<?php echo $rank;?>"> <br>
        <input type="submit" value="Add my team!">
    </form>


<?php
if (isset($_POST['submit'])) 
{
    // replace ' ' with '\ ' in the strings so they are treated as single command line args
    $tname = escapeshellarg($_POST[tname]);
    $nname = escapeshellarg($_POST[nname]);
    $trank = escapeshellarg($_POST[trank]);

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
    
    $sql2 = "SELECT COUNT(TEAM_ID) FROM team";
    $result = $conn->query($sql2);
    $result = $result + 1;
    
    //$data = mysql_fetch_assoc($result);
    //$data = $data + 1;
    
    $sql = "INSERT INTO team (TEAM_ID, TEAM_NAME, NICKNAME, RANK)
    VALUES ($result, $tname, $nname, $trank)";

    if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }

         
}
$conn->close(); 
?>

</div>

</body>
</html>