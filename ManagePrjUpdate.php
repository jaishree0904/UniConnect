<?php 
session_start();
$UserName = $_SESSION['UserName'];
$UserID = $_SESSION['UserID'];
// echo "User Name -->".$UserName;
echo "<BR>User ID -->".$UserID;
 echo "<BR>";

$con= mysqli_connect('localhost','root','','uniconnect');
if($con){
    echo"Connection succsessful";
}
else{
    echo "No connection";
}

mysqli_select_db($con,'users');
$ProjectDetailID = ($_POST['ProjectDetailID']); 
$UserOrTeamName = ($_POST['Owner_Name']); 
$ProjectName =  ($_POST['Project_Name']); 
$Description = ($_POST['Description']); 
$DifficultyLevelID =  ($_POST['Difficulty_Level']); 
$TechStack = ($_POST['Tech_Stack']); 
$ProjectLink =  ($_POST['Project_Link']); 
$GithubLink =  ($_POST['Github_Link']); 

$TmpUserID = $UserID."_";
$target_dir = "./project_images/";
$ImageFileNameAlone = $UserID."_".basename($_FILES["ProjectImageFile"]["name"]);
$target_file = $target_dir.$ImageFileNameAlone;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$ImageFileName = basename($_FILES["ProjectImageFile"]["name"]);
// echo "<BR>ImageFileName-->".$ImageFileName;
// echo "<BR>FileNameAlone-->".$FileNameAlone;
// echo "<BR>target_file-->".$target_file;
// echo "<BR>---->",$_FILES["ProjectImageFile"]["tmp_name"];
move_uploaded_file($_FILES["ProjectImageFile"]["tmp_name"], $target_file);

$target_file = $target_dir.$UserID."_".basename($_FILES["ProjectVideoFile"]["name"]);
$VideoFileNameAlone = $UserID."_".basename($_FILES["ProjectVideoFile"]["name"]);
$target_file = $target_dir.$VideoFileNameAlone;
$VideoFileName = basename($_FILES["ProjectVideoFile"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
move_uploaded_file($_FILES["ProjectVideoFile"]["tmp_name"], $target_file);
// echo "<BR>VideoFileName-->".$VideoFileName;
// echo "<BR>FileNameAlone-->".$FileNameAlone;
// echo "<BR>target_file-->".$target_file;
// echo "<BR>---->",$_FILES["ProjectVideoFile"]["tmp_name"];

//echo "Owner_Name-->".$Owner_Name.", Project_Name-->".$ProjectName.", Description-->".$Description.", Difficulty_Level-->".$Difficulty_Level
//.", Tech_Stack-->".$TechStack.", Project_Link-->".$ProjectLink.", Github_Link-->".$GithubLink

if($TmpUserID==$ImageFileNameAlone)
    $DynSQL_ImageFileName = "";
else
    $DynSQL_ImageFileName = ',ImageFileName='."'".$ImageFileNameAlone."'";

if($TmpUserID==$VideoFileNameAlone)
    $DynSQL_VideoFileName = "";
else
    $DynSQL_VideoFileName = ',VideoFileName='."'".$VideoFileNameAlone."'";

$DynSQL="UPDATE projectdetail SET UserOrTeamName='$UserOrTeamName'
    ,ProjectName='$ProjectName',DifficultyLevelID=$DifficultyLevelID,TechStack='$TechStack'
    ,Description='$Description',ProjectLink='$ProjectLink',GithubLink='$GithubLink'"
    .$DynSQL_ImageFileName.$DynSQL_VideoFileName
    ." WHERE UserID = $UserID AND ProjectDetailID = $ProjectDetailID";
//mysqli_query($con,$DynSQL);
// echo $DynSQL;

if (mysqli_query($con, $DynSQL)) {
    $response['message']='success';
    $_SESSION['Status']="Your project details are successfully saved !!";
    //echo "Your project details are successfully updated !!";
    header('Location: '.'./User.php');
 }else {
    $_SESSION['Status']="Error occured while saving your project details. Please review and enter correct information.";
    //echo "Error occured while updating your project details. Please review and enter correct information.";
    header('Location: '.'./project.php');
 }

//echo $qy;

mysqli_close($con);

?>