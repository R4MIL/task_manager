<?php
    $login='';
    if (isset($_POST['login'])) { 
        $login=$_POST['login'];
    }
    $password='';
    if (isset($_POST['password'])) { 
        $password=$_POST['password'];
    }

    if ($login !== '' && $password !== '') {
        echo "Вы вошли под учеткой:'$login', с паролем:'$password'";
    } else {
        echo "Вы заполнили не все поля!";
    }
?>