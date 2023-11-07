<?php
$db = new SQLite3('users.db');

// Создание таблицы users, если она не существует
$db->exec('CREATE TABLE IF NOT EXISTS users (id INTEGER PRIMARY KEY, username TEXT, password TEXT, inverted_password TEXT)');

$username = $_POST['username'];
$password = $_POST['password'];

// Проверка наличия пользователя в базе данных
$stmt = $db->prepare('SELECT COUNT(*) as count FROM users WHERE username = :username');
$stmt->bindValue(':username', $username, SQLITE3_TEXT);
$result = $stmt->execute();
$row = $result->fetchArray();


function invertBitsInString($str) {
    $result = '';
    $len = strlen($str);
    for ($i = 0; $i < $len; $i++) {
        // Convert character to ASCII value
        $ascii = ord($str[$i]);
        // Convert ASCII value to binary string
        $bin = decbin($ascii);
        // Pad binary string with zeros on the left to ensure it's 8 bits long
        $bin = str_pad($bin, 8, "0", STR_PAD_LEFT);
        // Invert bits in binary string
        $bin = $bin ^ str_repeat('1', 8);
        // Convert inverted binary string back to string
        $result .= chr(bindec($bin));
    }
    return $result;
}


if ($row['count'] == 0) {
    // Если пользователя нет, добавляем его в базу данных
    $invertedPassword = invertBitsInString($password); // Инвертируем биты пароля
    $stmt = $db->prepare('INSERT INTO users (username, password, inverted_password) VALUES (:username, :password, :invertedPassword)');
    $stmt->bindValue(':username', $username, SQLITE3_TEXT);
    $stmt->bindValue(':password', $password, SQLITE3_TEXT);
    $stmt->bindValue(':invertedPassword', $invertedPassword, SQLITE3_TEXT);
    $stmt->execute();
}

$db->close();

// Перенаправляем пользователя на страницу для ввода дополнительных данных
header("Location: order.html");
?>
