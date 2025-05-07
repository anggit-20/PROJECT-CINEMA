<?php 


// echo $_POST['email'];
// echo $_POST['password'];
session_start();

if ($_POST ['email'] == "Khoirunnisa237648@gmail.com" && $_POST ['password'] == "12345678")
{
    $_SESSION ['email'] = $_POST['email'];
    header('Location:index.php');
} else {
    header ('Location:login.php');
};

?>