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
        Team Name:<input type="text" name="team_name" required><br>
        Nickname:<input type="text" name="nick_name" required><br>
        Rank:<input type="text" name="rank" required><br>

        
        <input name="submit"type="submit" value="Add my team!">
    </form>

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

    $query = "SELECT MAX(TEAM_ID) FROM team";
    $result = $conn->query($query);

    $row = $result->fetch_assoc();
    $result = $row["MAX(TEAM_ID)"] + 1;


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

    $sql = "SELECT * FROM team WHERE RANK=$rank";
    $result = $conn->query($sql);

    if($result->num_rows > 0) {
      echo"A team of that rank already exists. Please try again with a unique rank.";
    }
    else {
      $sql = "INSERT INTO team (TEAM_ID, TEAM_NAME, NICKNAME, RANK)
      VALUES ($result, $name, $nickname, $rank)";

      if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
    }


         
}
$conn->close(); 
?>

</div>

</body>
</html>


