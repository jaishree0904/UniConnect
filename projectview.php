<style>
    .whiteBackground {
    background-color: #fff;
}
.grayBackground {
    background-color: #ccc;
}
</style>
<?php
// Include your database connection file (e.g., connect_db.php)
//require('../connect_db.php');

session_start();
$UserName = $_SESSION['UserName'];
$UserID = $_SESSION['UserID'];

//$UserID = 15;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Individual | Create Project</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="vendor/nouislider/nouislider.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="./style/prjstyle.css">
</head>
<body>
    <header>
        <a href="./index.html" class="company-logo">
			<img src="./images/assett.jpg" width="250px" height="200px" style="margin-left: 30px;">
			</a>&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <!-- <a href="#About" class="hover-link">About</a> -->
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <!-- <a href="#Team" class="hover-link">Team</a> -->
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="project.php?st=view" class="hover-link">Project</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       
        <a href="index.html" class="hover-link">Contact Us</a>&nbsp;&nbsp;&nbsp;
        <a href="Signout.php" target="blank"><button class="btn" style="font-family: Georgia, 'Times New Roman', Times, serif;">Signout</button></a>
    </header>
    <br>
    <br>
<?php
$con= mysqli_connect('localhost','root','','uniconnect');
mysqli_select_db($con,'uniconnect');

// Query to retrieve all records from the projectdetail table
$DynSQL = "SELECT * FROM projectdetail where UserID = $UserID";
$result = mysqli_query($con, $DynSQL);
$x = 0;// Initialize a counter
//SELECT `ProjectDetailID`, `UserID`, `UserOrTeamName`, `DifficultyLevelID`, `ProjectName`, `TechStack`, `Description`, `ProjectLink`
//, `GithubLink`, `ProjectImageID`, `IsProjectValidated`, `CreatedOn`, `ModifiedOn` FROM `projectdetail` WHERE 1;

if (mysqli_num_rows($result) > 0) {
    echo '<table class="table table-hover">';
    echo '<caption>List of all Project details are stored in UniConnect..</caption>';
    echo '<thead bgcolor="#81D8D0">'; //Tiffany Blue
    echo '<tr>';
    echo '<th>Project Detail ID</th>';
    echo '<th>Owner</th>';
    echo '<th>Difficulty Level</th>';
    echo '<th>Project Name</th>';
    echo '<th>Tech Stack</th>';
    echo '<th>Description</th>';
    echo '<th>Project Link</th>';
    echo '<th>Github Link</th>';
    echo '<th>&nbsp;View</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    while ($row = mysqli_fetch_assoc($result)) {
        $class = ($x % 2 == 0) ? 'whiteBackground' : 'grayBackground'; 
        echo '<tr class='.$class.'>';
        echo '<td>' . $row['ProjectDetailID'] . '</td>';
        echo '<td>' . $row['UserOrTeamName'] . '</td>';
        echo '<td>' . $row['DifficultyLevelID'] . '</td>';
        echo '<td>' . $row['ProjectName'] . '</td>';
        echo '<td>' . $row['TechStack'] . '</td>';
        echo '<td>' . $row['Description'] . '</td>';
        echo '<td>' . $row['ProjectLink'] . '</td>';
        echo '<td>' . $row['GithubLink'] . '</td>';
        echo '<td align="center"><a href="./projectupdate.php?PrjId='.$row['ProjectDetailID'].'">View</a></td>';
        echo '</tr>';
        $x++; // Increment the counter
    }

    echo '</tbody>';
    echo '</table>';
} else {
    echo '<p>There are currently no project details in the system.</p>';
}
?>
</body>
</html>