<?php 

session_start();

if ($_POST ['email'] == "cinemaaneka@gmail.com" && $_POST ['password'] == "admincinema123")
{
    $_SESSION ['email'] = $_POST['email'];
    header('Location:index-admin.php');
} else {
    header ('Location:login-admin.php');
};

?>