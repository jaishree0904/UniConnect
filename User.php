<?php 
session_start();
$UserName = $_SESSION['UserName'];
$UserID = $_SESSION['UserID'];
// echo "User Name -->".$UserName;
// echo "<BR>User ID -->".$UserID;
// echo "<BR>";
$Status = "";
if (isset($_SESSION['Status'])) {
    $Status = $_SESSION['Status'];
}
unset($_SESSION['Status']); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uniconnect</title>
	<link rel="icon" type="image/x-icon" href="logo.png">
    <link rel="stylesheet" href="./style/style.css">
    <link rel="stylesheet" href="./style/style1.css">
</head>
<body>
    <!-- php code -->
   

    <!-- top banner -->

     <div class="top-banner">
        <div class="container">
            <!-- <div class="small-bold-text banner-text">🥳 New to Usability Hub: Open and Closed card sorting</div> -->
        </div>
    </div>  

    <!-- nav bar -->
    <nav>
        <div class="container main-nav flex">
            <a href="./index.html" class="company-logo">
                 <!-- <h1>Uniconnect</h1> -->
                <img src="./images/assett.jpg" alt="company logo">
            </a>
            <div class="nav-links" id="nav-links">
                <ul class="flex">
                    <!-- <li><a href="#About" class="hover-link">About</a></li> -->
                    <li><a href="project.php?st=view" class="hover-link">Project</a></li>
                    <!-- <li><a href="problem.xlsx" class="hover-link">Problems</a></li> -->
					<div id="bottom">
                    <li><a href="#bottom" href="#contact" class="hover-link">Contact Us</a></li>
					</div>
                    <!-- <li><a  href="Registretion1/index.html" class="hover-link secondary-button">Signin/Signup</a></li>  -->
                    <li><a href="Signout.php"><button class="btn">Signout</button></a>
                    </li>
                    <!-- <li><a href="" class="hover-link primary-button">Sign up</a></li> -->
                </ul>
            </div>
            <a href="#" class="nav-toggle hover-link" id="nav-toggle">
                <i class="fa-solid fa-bars"></i>
            </a>
        </div>
    </nav>
    <br/><br/><br/><br/><br/><br/><br/><br/>
    <div align="center">
    <table>
    <TR><TD>
    <?php if($Status!=''){
                echo "<b>".$Status."</b> !!";
            }else{
                echo "Welcome <b>".$UserName."</b> !!";
                echo "</TD></TR>";
            }
            ?>
    </TD></TR>
</table>
</div>
    <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
    <!-- footer -->

    <!-- <footer>
        <div class="container flex footer-container">
           
            <div class="link-column flex">
                <h4>Product</h4>
                <a href="#" class="hover-link">Overview</a>
                <a href="#" class="hover-link">Pricing</a>
                <a href="#" class="hover-link">Usability Hub</a>
                <a href="#" class="hover-link">Customers Page</a>
                <a href="#" class="hover-link">Status Page</a>
            </div>
            <div class="link-column flex">
                <h4>Methodology</h4>
                <a href="#" class="hover-link">Overview</a>
                <a href="#" class="hover-link">Pricing</a>
                <a href="#" class="hover-link">Usability Hub</a>
                <a href="#" class="hover-link">Customers Page</a>
                <a href="#" class="hover-link">Status Page</a>
            </div>
            <div class="link-column flex">
                <h4>Resources</h4>
                <a href="#" class="hover-link">Overview</a>
                <a href="#" class="hover-link">Pricing</a>
                <a href="#" class="hover-link">Usability Hub</a>
                <a href="#" class="hover-link">Customers Page</a>
                <a href="#" class="hover-link">Status Page</a>
            </div>
        </div>
    </footer>-->

    <!-- subfooter -->

    <div class="subfooter">
        <div class="container flex subfooter-container">
            <a class="hover-link" href="#">Privacy policy</a>
            <a class="hover-link" href="#">Terms & Condition</a>
            <a class="hover-link" href="#">Security Information</a>
            <a class="hover-link" href="#"><i class="fa-brands fa-facebook"></i></a>
            <a class="hover-link" href="#"><i class="fa-brands fa-twitter"></i></a>
        </div>
    </div>

    <script src="https://kit.fontawesome.com/c1fc3d2826.js" crossorigin="anonymous"></script>

    <script>
        const toggleButton = document.getElementById('nav-toggle');
        const navLinks = document.getElementById('nav-links');

        toggleButton.addEventListener('click', () => {
            navLinks.classList.toggle('active');
        })

    </script>

</body>

</html>
