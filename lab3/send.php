<?php
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

    ini_set("SMTP", "smtp.gmail.com");
    ini_set("smtp_port", "587");
    ini_set("sendmail_from", "sender@gmail.com");
    ini_set("sendmail_path", "/usr/sbin/sendmail -t -i");

    if (mail($to, $subject, $message, $headers)) {
        echo "<p>Спасибо за обратную связь!</p>";
    } else {
        echo "<p>Что-то пошло не так. Попробуйте еще раз.</p>";
    }
}
?>