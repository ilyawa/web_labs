<?php
$db = new SQLite3('users.db');

// Создание таблицы orders, если она не существует
$db->exec('CREATE TABLE IF NOT EXISTS orders (id INTEGER PRIMARY KEY, lastname TEXT, firstname TEXT, middlename TEXT, address TEXT, phone TEXT, email TEXT, product TEXT, comment TEXT)');

$lastname = $_POST['lastname'];
$firstname = $_POST['firstname'];
$middlename = $_POST['middlename'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$product = $_POST['product'];
$comment = $_POST['comment'];

// Вставка данных о заказе в базу данных
$stmt = $db->prepare('INSERT INTO orders (lastname, firstname, middlename, address, phone, email, product, comment) VALUES (:lastname, :firstname, :middlename, :address, :phone, :email, :product, :comment)');
$stmt->bindValue(':lastname', $lastname, SQLITE3_TEXT);
$stmt->bindValue(':firstname', $firstname, SQLITE3_TEXT);
$stmt->bindValue(':middlename', $middlename, SQLITE3_TEXT);
$stmt->bindValue(':address', $address, SQLITE3_TEXT);
$stmt->bindValue(':phone', $phone, SQLITE3_TEXT);
$stmt->bindValue(':email', $email, SQLITE3_TEXT);
$stmt->bindValue(':product', $product, SQLITE3_TEXT);
$stmt->bindValue(':comment', $comment, SQLITE3_TEXT);
$stmt->execute();

$db->close();
header("Location: order.html");
?>
