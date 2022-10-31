<?php
session_start();
$dbServerName = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "sport_calendar";

$conn  = mysqli_connect($dbServerName,$dbUsername, $dbPassword,$dbName);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="path/to/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css"


</head>
<header>
    <title>Sport event</title>
    <div class="topnav">
        <img src="logo.png" alt="" style="width:80px;height:100px;">
        <a class="active" href="calendar.html">Home</a>
        <a href="#news">News</a>
        <a href="#contact">Contact</a>
    </div>
</header>
<body>
<h1>Sport Event</h1>
<table>
    <tr>
        <th>Date/Time</th>
        <th>Place</th>
        <th>Group</th>
        <th>Team</th>
        <th>Team</th>
        <th>Sport</th>

    </tr>

    <?php
$query = mysqli_query($conn, 'SELECT calendar.date, calendar.place,team_group.groupName,teams.first_team,teams.second_team,sport.name_of_sport FROM teams
    INNER JOIN calendar ON teams.team_id=calendar.team_FOREIGNKEY
    INNER JOIN team_group ON teams.team_group_FOREIGNKEY=team_group.groupName 
    INNER JOIN sport ON teams.sport_FOREIGNKEY=sport.sport_id');
while($row = mysqli_fetch_array($query)){
    ?>

    <tr>
        <td><?php echo $row['date'];?></td>
        <td><?php echo $row['place'];?></td>
        <td><?php echo $row['groupName'];?></td>
        <td><?php echo $row['first_team'];?></td>
        <td><?php echo $row['second_team'];?></td>
        <td><?php echo $row['name_of_sport'];?></td>
    </tr>
<?php
}
?>
    </table>
</body>
</html>