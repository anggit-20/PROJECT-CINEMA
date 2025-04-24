<?php 

// echo $_POST['email'];
// echo $_POST['password'];

session_start();

if ($_POST ['email'] == "meilian237650@student.smkn1kandeman.sch.id" && $_POST ['password'] == "12345678")
{
    $_SESSION ['email'] = $_POST['email'];
    header('Location:index.php');
} else {
    header ('Location:login.php');
};

?>