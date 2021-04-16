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
<?php
    if(array_key_exists('date', $_POST)){
        echo'<div class="tables" id="results">
        PLACEHOLDER
        <form class="forms">
            <input type="submit" value="Check another date?" >
        </form>
    </div>';}
    else{
        echo'<form class="forms" id="date" method="post">
        <label for="gdate">Team Name:</label>
        <input type="date" name="date" id="gdate" > <br>
        <input type="submit" value="View results!" >
    </form>';
    }
    ?>
    
</div>


</body>
</html>

<?php
?>