<html>

<script>
    function changeVisible() {
        document.getElementById("date").style.visibility = "hidden";
        document.getElementById("results").style.visibility = "visible";
    }

    function changeVisible2() {
        document.getElementById("date").style.visibility = "visible";
        document.getElementById("results").style.visibility = "hidden";
    }
</script>

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
    <a href="viewTeamResults.php">View results for a team</a>
    <a class="active" href="viewDateResults.php">View results from a date</a>
</div>

<p style="text-align:center">Enter your desired date!</p>
<br>
<div class="content">
<form class="forms" id="date" method="post">
        <label for="gdate">Date:</label><br>
        <input type="date" name="date" id="gdate" > <br>
        <input type="submit" value="View results!" >


<?php

if(array_key_exists('date', $_POST)){
    echo'<div class="tables" id="results" onsubmit="changeVisible2()">
    PLACEHOLDER
    <form class="forms">
        <input type="submit" value="Check another team?" >
    </form>
    </div>';}

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

    if (array_key_exists('date', $_POST)) 
    {

        $date = $_POST["date"];
        $date = "'" . (string)$date . "'";
        

        $sql = "SELECT

        T.teamone,
        T.nickone,
        T.homescore,
        S.teamtwo,
        S.nicktwo,
        S.awayscore,
        T.date,
        T.location
    
    FROM (
        
    
    SELECT 
        teamone,
        nickone,
        homescore,
        id1,
        date,
        location
        
        FROM (
        
        SELECT
        team.TEAM_NAME AS teamone,
        team.NICKNAME AS nickone,
        result.SCORE_ONE as homescore,
        result.GAME_ID as id1,
        game.DATE as date,
        game.LOCATION as location	
        
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
    WHERE date = '2021-04-01'";


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
            
    }
    $conn->close();
    ?>
    
</div>


</body>
</html>

<?php

?>