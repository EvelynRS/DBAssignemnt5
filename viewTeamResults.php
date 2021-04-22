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
    <a href="viewAllTeams.php">View all teams</a>
    <a class="active" href="viewTeamResults.php">View results for a team</a>
    <a href="viewDateResults.php">View results from a date</a>
</div>

<p style="text-align:center">Enter your team's name!</p>
<br>
<div class="content">
    <form action="viewTeamResults.php" method="post">
        Team Name:<input type="text" name="team_name"><br>
        <input name="submit" type="submit" value="Add my team!">
    </form>

    <?php

if(array_key_exists('team_name', $_POST)){
    
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

        $sql = "SELECT

        T.teamone,
        T.nickone,
        T.homescore,
        S.teamtwo,
        S.nicktwo,
        S.awayscore,
        T.date
    
    FROM (
        
    
    SELECT 
        teamone,
        nickone,
        homescore,
        id1,
        date
        
        FROM (
        
        SELECT
        team.TEAM_NAME AS teamone,
        team.NICKNAME AS nickone,
        result.SCORE_ONE as homescore,
        result.GAME_ID as id1,
        game.DATE as date	
        
        FROM 
        team
        INNER JOIN
        result
        ON 
        team.TEAM_ID=result.TEAM_ONE_ID
        INNER JOIN
        game
        ON
        result.GAME_ID=game.GAME_ID
        ) as A
        ) as T
    
    INNER JOIN
    
    (SELECT  teamtwo,
        nicktwo,
        awayscore,
        id2
    
        FROM
    
        (SELECT
        team.TEAM_NAME AS teamtwo,
        team.NICKNAME AS nicktwo,
        result.SCORE_TWO as awayscore,
        result.GAME_ID as id2
    
        FROM 
        team
        INNER JOIN
        result
        ON 
        team.TEAM_ID=result.TEAM_TWO_ID
    ) as B) as S 
    ON T.id1=S.id2
    WHERE teamone = 'Ugly Dinosaurs' OR teamtwo = 'Ugly Dinosaurs';";


        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table><tr><th>Home Team</th><th>Home Nickname</th><th>Home Score</th><th>Away Team</th><th>Away Score</th><th>Away Team</th><th>Date</th></tr>";
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["teamone"]. "</td><td>" . $row["nickone"]. "</td><td> " . $row["homescore"]. "</td><td> " . $row["teamtwo"]. "</td><td> " . $row["nicktwo"]. "</td><td> " . $row["awayscore"]. "</td><td> " . $row["date"]. "</td></tr>";
            }
            echo "</table>";
        } else {
            echo "0 results";
        }
            
    }
    $conn->close();
    ?>

</div>


</body>
</html>