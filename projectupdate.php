<?php 
session_start();
$UserName = $_SESSION['UserName'];
$UserID = $_SESSION['UserID'];
if(!isset($_SESSION['UserID'])){
    //header('Location: '.'./index.html?se=1');
    header('Location: '.'./Login.php');
}
$Status = "";
if (isset($_SESSION['Status'])) {
    $Status = $_SESSION['Status'];
}
$UrlProjectDetailID = ($_GET['PrjId']); 
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
        <a href="project.php" class="hover-link">Project</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="index.html"class="hover-link">Contact Us</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="Signout.php" target="blank"><button class="btn" style="font-family: Georgia, 'Times New Roman', Times, serif;">Signout</button></a>
    </header>
    <br>
    <br>
    <?php 
    $con= mysqli_connect('localhost','root','','uniconnect');
    mysqli_select_db($con,'uniconnect');
 
    // Query to retrieve all records from the projectdetail table
    $DynSQL = "SELECT * FROM projectdetail where UserID = $UserID AND ProjectDetailID=$UrlProjectDetailID";
    $result = mysqli_query($con, $DynSQL);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $ProjectDetailID=$row['ProjectDetailID'];
            $UserOrTeamName=$row['UserOrTeamName'];
            $DifficultyLevelID=$row['DifficultyLevelID'];
            $ProjectName=$row['ProjectName'];
            $TechStack=$row['TechStack'];
            $Description=$row['Description'];
            $ProjectLink=$row['ProjectLink'];
            $ProjectName=$row['ProjectName'];
            $GithubLink=$row['GithubLink'];
            $ImageFileName="./project_images/".$row['ImageFileName'];
            $VideoFileName="./project_images/".$row['VideoFileName'];
        }
    }
    else{
        echo '<p>There are currently no project details in the system.</p>';
    }
    ?>
    <br>
    <br>
    <div class="main">

        <div class="container">
            <div class="signup-content">
                <div class="signup-img">
                    <img src="./images/form-img.png" style="margin-left: 30px;">
                    <div class="signup-img-content">
                        <h2>Create </h2>
                        <p>Import a Project</p>
                    </div>
                </div>
                <div class="signup-form">
                    <form method="POST" class="register-form" id="register-form" action="ManagePrjUpdate.php" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-group">
                                <div class="form-input">
                                    <label for="first_name" class="required">Owner </label>
                                    <input type="text" name="Owner_Name" id="Owner_Name" value ="<?php echo $UserOrTeamName?>" />
                                    <input type="hidden" name="ProjectDetailID" value="<?php echo $ProjectDetailID?>">
                                </div>
                                <div class="form-input">
                                    <label for="last_name" class="required">Project Name</label>
                                    <input type="text" name="Project_Name" id="Project_Name" value ="<?php echo $ProjectName?>" />
                                </div>
                                <div class="form-input">
                                    <label for="company" class="">Description</label>
                                    <input type="textbox" name="Description" id="Description" value ="<?php echo $Description?>" />
                                </div>

                                <h1>
                                    <!--  <a target="_blank" href="https://github.com/safrazik/knockout-file-bindings">knockout-file-bindings</a>-->
                                </h1>
                                <div class="well" data-bind="fileDrag: fileData">

                                    <!--        <div class="">-->
                                    <!--            <img style="height: 125px;" class="img-rounded  thumb" data-bind="attr: { src: fileData().dataURL }, visible: fileData().dataURL">-->
                                    
                                    <div><img src="<?php echo $ImageFileName?>" width="42" height="42"></image></div>
                                    <div data-bind="ifnot: fileData().dataURL">
                                        <label class="drag-label" class="required">Upload Project Image (Optional)</label>
                                    </div>

                                    <div class="">
                                        <input type="file" name="ProjectImageFile" data-bind="fileInput: fileData, customFileInput: {
              buttonClass: 'btn btn-success',
              fileNameClass: 'disabled form-control',
              onClear: onClear,
            }" accept="image/*">
                                    </div>

                                </div><br>
                                
                                    <div data-bind="ifnot: fileData().dataURL">
                                        <label class="drag-label">Upload Video (Optional)</label>                                    </div>
                                    <!--  <div id="upload-button" class="button">Upload Video</div>-->
                                    <video width="320" height="240" controls>
<source src="<?php echo $VideoFileName?>" type="video/mp4">
</video>
                                    <div id="upload-input">
                                        <input id="video_file" name="ProjectVideoFile" type="file">
                                    </div>
                                
                                <div class="url-display"></div>
                                <div class="embed-code"></div>
                                <div class="video-display"></div>


                                <!--  <button class="btn btn-default" data-bind="click: debug">Debug</button>-->

                                <!--
                                <div class="form-input">
                                    <label for="email" class="required">Email</label>
                                    <input type="text" name="email" id="email" />
                                </div>
-->
                                <!--
                                <div class="form-input">
                                    <label for="phone_number" class="required">Phone number</label>
                                    <input type="text" name="phone_number" id="phone_number" />
                                </div>
-->
                            </div>
                            <div class="form-group">
                                <!--
                                <div class="form-select">
                                    <div class="label-flex">
                                        <label for="meal_preference">meal preference</label>
                                        <a href="#" class="form-link">Lunch detail</a>
                                    </div>
                                    <div class="select-list">
                                        <select name="meal_preference" id="meal_preference">
                                            <option value="Vegetarian">Vegetarian</option>
                                            <option value="Kosher">Kosher</option>
                                            <option value="Asian Vegetarian">Asian Vegetarian</option>
                                        </select>
                                    </div>
                                </div>
-->
                                <div class="form-radio">
                                    <div class="label-flex">
                                        <label for="payment">Difficulty level</label>

                                    </div>
                                    <div class="form-radio-group">
                                        <div class="form-radio-item">
                                            <input type="radio" name="Difficulty_Level" id="1" <?php if($DifficultyLevelID==1) echo'checked'?> value ="1">
                                            <label for="1">Beginner</label>
                                            <span class="check"></span>
                                        </div>
                                        <div class="form-radio-item">
                                            <input type="radio" name="Difficulty_Level" id="2"<?php if($DifficultyLevelID==2) echo'checked'?> value ="2">
                                            <label for="2">Intermediate</label>
                                            <span class="check"></span>
                                        </div>
                                        <div class="form-radio-item">
                                            <input type="radio" name="Difficulty_Level" id="3"<?php if($DifficultyLevelID==3) echo'checked'?> value ="3">
                                            <label for="3"> Advanced</label>
                                            <span class="check"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-input">
                                    <label for="payable">Tech Stack</label>
                                    <input type="text" name="Tech_Stack" id="Tech_Stack" value ="<?php echo $TechStack?>" />
                                </div>
                                <div class="form-input">
                                    <label for="chequeno">Project Link</label>
                                    <input type="text" name="Project_Link" id="Project_Link" value ="<?php echo $ProjectLink?>" />
                                </div>
                                <div class="form-input">
                                    <label for="blank_name">Github Link</label>
                                    <input type="text" name="Github_Link" id="Github_Link" value ="<?php echo $GithubLink?>" />
                                </div>

                            </div>
                        </div>
                        <!--
                        <div class="donate-us">
                            <label>Donate us</label>
                            <div class="price_slider ui-slider ui-slider-horizontal">
                                <div id="slider-margin"></div>
                                <span class="donate-value" id="value-lower"></span>
                            </div>
                        </div>
-->
                        <div class="form-submit">
                            <center> <input type="submit" value="Update" class="submit" id="submit" name="submit" /></center><br>
                            <!--                            <input type="submit" value="Reset" class="submit" id="reset" name="reset" />-->
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/nouislider/nouislider.min.js"></script>
    <script src="vendor/wnumb/wNumb.js"></script>
    <script src="vendor/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="vendor/jquery-validation/dist/additional-methods.min.js"></script>
    <script src="main.js"></script>
</body>
<!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>