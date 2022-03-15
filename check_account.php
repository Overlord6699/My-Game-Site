<?php 
    $name = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $password_arr = array()[$password];
    $sec_password = $_POST["sec_password"];

    if(htmlspecialchars(trim($name)) == "")
            echo "<h1>Введите имя пользователя</h1>";
        else if(strlen(trim($name)) <= 1)
            echo "<h1>Такого имени не может существовать</h1>";
        else if(htmlspecialchars(trim($password)) == "" ||
            htmlspecialchars(trim($sec_password)) == "")
                echo "<h1>Введите пароль</h1>";
        else if(htmlspecialchars(trim($email)) == "")
            echo "<h1>Укажите адрес электронной почты</h1>";
            
        else if(strcmp($password,$sec_password) != 0)
            echo "<h1>Пароли должны совпадать</h1>";
        else{
            echo "<h1>\nВерификация пройдена успешно</h1>";
        }

        setcookie("username", $name, time() + 600);

    if($_COOKIE['username'] != '')
        //тады показываем авторизацию

        //header("Location : /home.php");
        //exit;



    $message = 'Сообщение';
    $to = 'ilya.velikolpnyyy@mail.ru';
    $from = 'example.abc@mail.ru';
    $subject = 'тема сообщения';

    $subject = '?utf-8?B?'.base64_encode($subject).'?=';
    $headers = 'From: $from\r\nReply-to: $from\r\nContent-type: text/plain; charset: utf-8\r\n';

    mail($to, $subject, $message, $headers);

    require "blocks/footer.php";
?>