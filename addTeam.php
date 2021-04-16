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
</div>

</body>
</html>

<?php
?>