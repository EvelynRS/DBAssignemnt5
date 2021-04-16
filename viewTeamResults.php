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
    <?php
    if(array_key_exists('name', $_POST)){
        echo'<div class="tables" id="results" onsubmit="changeVisible2()">
        PLACEHOLDER
        <form class="forms">
            <input type="submit" value="Check another team?" >
        </form>
        </div>';}
    else{
        echo'<form class="forms" id="teamname" method="post">
        <label for="tname">Team Name:</label>
        <input type="text" name="name" id="tname" > <br>
        <input type="submit" value="View results!" >
    </form>';
    }
    ?>
</div>


</body>
</html>

<?php
?>