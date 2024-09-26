<?php
    $login='';
    if (isset($_POST['login'])) { 
        $login=$_POST['login'];
    }
    $password='';
    if (isset($_POST['password'])) { 
        $password=$_POST['password'];
    }
    $name='';
    if (isset($_POST['name'])) { 
        $name=$_POST['name'];
    }
    $gender='';
    if (isset($_POST['gender'])) { 
        $gender=$_POST['gender'];
    }
    $mail='';
    if (isset($_POST['mail'])) { 
        $mail=$_POST['mail'];
    } 

    if ($login !== '' && $password !== '' && $name !== '' && $gender !== '' && $mail !== '') {
        echo "Вы успешно зарегистрированы:"."<br>";
        
        echo "<pre>";
        print_r($_POST);
        echo "</pre>";
    } else {
        echo "Вы заполнили не все поля!";
    }
?>