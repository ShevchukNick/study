<?php

function debug($data)
{
    echo '<pre>' . print_r($data,1) . '</pre>>';
}

function registration()
{
    global $pdo;
    $login = !empty($_POST['name']) ? trim($_POST['name']) : '';
    $pass = !empty($_POST['pass']) ? trim($_POST['pass']) : '';

    if (empty($login) || empty($pass)) {
        $_SESSION['errors'] = 'поля обязательны';
        return false;
    }

    $res = $pdo->prepare("SELECT COUNT(*) FROM users WHERE name = ?");
    $res ->execute([$login]);

    if ($res->fetchColumn()) {
        $_SESSION['errors'] = 'имя уже используется';
        return false;
    }

    $pass = password_hash($pass,PASSWORD_DEFAULT);
    $res=$pdo->prepare("INSERT INTO users (name,pass) VALUES (?,?)");
    if  ($res->execute([$login,$pass])) {
        $_SESSION['success'] = 'успешная регистрация';
        return true;
    } else {
        $_SESSION['errors'] = 'ошибка регисрации';
        return false;
    }
}