<?php

require '../../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
date_default_timezone_set('Etc/UTC');

SendMail();

function SendMail()
{
    //получение данных
    $name = $_POST["username"];
    $email = $_POST["email"];

    // Настройки PHPMailer
    $mail = new PHPMailer();
    try {
        $mail->isSMTP();
        $mail->CharSet = "UTF-8";
        $mail->SMTPAuth   = true;

        //$mail->SMTPDebug = 2;
        //$mail->Debugoutput = function ($str, $level) {
        //    $GLOBALS['status'][] = $str;
        //};

        // Настройки вашей почты
        $mail->Host       = 'smtp.mail.ru'; // SMTP сервера вашей почты
        $mail->Username   = 'ilya.velikolpnyyy@mail.ru';
        $mail->Password   = 'secret'; // Пароль на почте
        $mail->SMTPSecure = 'ssl';
        $mail->Port       = 465;
        $mail->setFrom('ilya.velikolpnyyy@mail.ru', 'Game Site'); // Адрес самой почты и имя отправителя

        // Получатель письма
        $mail->addAddress($email);

        // Прикрипление файлов к письму
        if (!empty($file['name'][0])) {
            for ($ct = 0; $ct < count($file['tmp_name']); $ct++) {
                $uploadfile = tempnam(sys_get_temp_dir(), sha1($file['name'][$ct]));
                $filename = $file['name'][$ct];
                if (move_uploaded_file($file['tmp_name'][$ct], $uploadfile)) {
                    $mail->addAttachment($uploadfile, $filename);
                    $rfile[] = "Файл $filename прикреплён";
                } else {
                    $rfile[] = "Не удалось прикрепить файл $filename";
                }
            }
        }
        // Отправка сообщения
        $mail->isHTML(true);
        $mail->Subject = "Заполнение формы на сайте Game Site";
        $mail->Body = "Здравствуйте, {$name}. У вас возник вопрос?";

        // Проверяем отравленность сообщения
        if ($mail->send()) {
            $result = "success";
        } else {
            $result = "error";
        }
    } catch (Exception $e) {
        $result = "error";
        $status = "Сообщение не было отправлено. Причина ошибки: {$mail->ErrorInfo}";
    }

    // Отображение результата
    echo json_encode(["result" => $result, "resultfile" => $rfile, "status" => $status]);
}
