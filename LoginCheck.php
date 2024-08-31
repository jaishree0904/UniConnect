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

$name = ($_POST['name']); 
$pass =  ($_POST['password']); 

$q = "select * from users where Username ='$name' and Password='$pass'";
$result = mysqli_query($con,$q);
$num = mysqli_num_rows($result);
echo $num;
if($num==1){
    $stmt = $con->prepare('SELECT UserID FROM users WHERE username=? and Password =?');
    $stmt->bind_param("ss", $name, $pass);
    $stmt->execute();
    $data = $stmt->get_result()->fetch_assoc();
    $UserID = $data ? $data['UserID'] : null;
    $_SESSION['UserName']=$name;
    $_SESSION['UserID']=$UserID;
    unset($_SESSION['Status']); 
    //header('Location: '.'./SignupLandingPage.php');
    header('Location: '.'./User.php');

    // $UserID1 = $_SESSION['UserID'];
    // echo $UserID;

}else{
    $_SESSION['Status']="Incorrect Login details. Please enter correct User ID and/or Password.";
    // echo $_SESSION['Status'];
    header('Location: '.'./Login.php');
}

?>
<!-- Username	Email	Password -->