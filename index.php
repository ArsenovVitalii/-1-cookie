<?php
// Установка cookie с выбранной темой
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['theme'])) {
    setcookie(name: 'theme', value: $_POST['theme'], expires_or_options: time() + 86400, path: '/'); // Срок действия 24 часа
    header(header: "Location: " . $_SERVER['PHP_SELF']); // Перезагрузка страницы
    exit;
}

// Определение текущей темы
$theme = $_COOKIE['theme'] ?? 'light'; // По умолчанию светлая тема

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="background-color: <?= $theme === 'dark' ? '#333' : '#fff' ?>; color: <?= $theme === 'dark' ? '#fff' : '#000' ?>;">
    <h1>Выбор темы</h1>
    <p>Текущая тема: <?= $theme === 'dark' ? 'Темная' : 'Светлая' ?></p>
    <form method="POST">
        <button type="submit" name="theme" value="light" <?= $theme === 'light' ? 'disabled' : '' ?>>Светлая тема</button>
        <button type="submit" name="theme" value="dark" <?= $theme === 'dark' ? 'disabled' : '' ?>>Тёмная тема</button>
</form>    
</body>
</html>