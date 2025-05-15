<?php

// echo $_POST['email'];
// echo $_POST['password'];

// echo (($_POST['email']) )

session_start();

// ini mengecek secara manual jika email dan pw sesuai akan masuk ke index.php
// jika tidak sesuai akan masuk ke login.php

if ($_POST['email'] == "geluhanggit@gmail.com" && $_POST['password'] == "123456") {
    
    $_SESSION['email'] = $_POST['email'];
    header('Location:desk_film.php');
} else {
    
    header('Location:login-user.php');
}

?>