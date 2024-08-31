<?php 
session_start();
unset($_SESSION['UserID']); 
unset($_SESSION['UserName']); 
unset($_SESSION['Status']); 
header('Location: '.'./Index.html');
?>