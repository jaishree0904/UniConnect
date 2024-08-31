<?php 
session_start();

$con= mysqli_connect('localhost','root','','uniconnect');
if($con){
    echo"Connection succsessful";
}
else{
    echo "No connection";
}

mysqli_select_db($con,'users');

// $name = $_POST['name'];
// $email = $_POST['email'];
// $pass = $_POST['password'];
$name = ($_POST['name']); 
$email = ($_POST['email']); 
$pass =  ($_POST['password']); 

// echo "<BR>Name : ".$name;
// echo "<BR>Email Address : ".$email;
// echo "<BR>Password : ".$pass;


//$q = "select * from users where Username ='$name' && Email='$email' && Password='$pass' ";
$q = "select * from users where Username ='$name' and EmailID='$email'";
 echo "<BR>T-SQL Query".$q;
 echo "<BR>";

$result = mysqli_query($con,$q);
$num = mysqli_num_rows($result);

if($num==1){
    echo"Duplicate data";
}
else{
    $qy="insert into users(Username,EmailID,Password) value ('$name','$email', '$pass') ";
    mysqli_query($con,$qy);
    
    $qry_user_id = "select  from  where Username ='$name' and EmailID='$email'";

    $stmt = $con->prepare('SELECT UserID FROM users WHERE username=? and EmailID =?');
    $stmt->bind_param("ss", $name, $email);
    $stmt->execute();
    $data = $stmt->get_result()->fetch_assoc();
    $UserID = $data ? $data['UserID'] : null;
    $_SESSION['UserName']=$name;
    $_SESSION['UserID']=$UserID;
    header('Location: '.'./SignupLandingPage.php');

    // $UserID1 = $_SESSION['UserID'];
    // echo $UserID;

}

?>
<!-- Username	Email	Password -->