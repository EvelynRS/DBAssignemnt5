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
<form class="forms">
    <label for="htr">Home team rank:</label>
    <input type="text" name="rank1" id="htr" value="<?php echo $rank1;?>"> <br>
    <label for="atr">Away team rank:</label>
    <input type="text" name="rank2" id="atr" value="<?php echo $rank2;?>"> <br>
    <label for="loc">Location:</label>
    <input type="text" name="location" id="loc" value="<?php echo $location;?>"> <br>
    <label for="dt">Date:</label><br>
    <input type="date" name="date" id="dt" value="<?php echo $date;?>">
    <input type="submit" value="Add my game!">
</form>
</div>

</body>
</html>

<?php
?>