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

<p style="text-align:center">Here you can add a game's results to the database! To do so, just fill out the form below.</p>
<br>
<div class="content">
<form class="forms">
    <label for="ht">Home team:</label>
    <input type="text" name="hometeam" id="ht" value="<?php echo $hometeam;?>"> <br>
    <label for="at">Away team:</label>
    <input type="text" name="awayteam" id="at" value="<?php echo $awayteam;?>"> <br>
    <label for="hts">Home team score:</label>
    <input type="text" name="homescore" id="hts" value="<?php echo $homescore;?>"> <br>
    <label for="ats">Away team score:</label><br>
    <input type="text" name="awayscore" id="ats" value="<?php echo $awayscore;?>">
    <input type="submit" value="Add my results!">
</form>
</div>

</body>
</html>

<?php
?>