

<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $interests = implode(", ", $_POST['interests']);
    $feedback = $_POST['feedback'];

    $to = "ilya.dr@yahoo.com";
    $subject = "Обратная связь от пользователя сайта";
    $message = "Имя: $name\nФамилия: $surname\nEmail: $email\nПол: $gender\nИнтересы: $interests\nОбратная связь: $feedback";
    $headers = "From: $email";



    $mail = new PHPMailer(true);

    try {
        $mail->SMTPDebug = 2;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'b2bjumbo@gmail.com';
        $mail->Password = 'vuwqdxyhelhdtzbc';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        $mail->setFrom('b2bjumbo@gmail.com', 'Sender');
        $mail->addAddress('ilya.dr@yahoo.com');
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $message;

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }

}
