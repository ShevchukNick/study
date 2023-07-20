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
    // считаем сколькл юзеров с именем из поста
    $res ->execute([$login]);

    // если больше нуля то имя занято
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

function login()
{
    global $pdo;
    $login = !empty($_POST['name']) ? trim($_POST['name']) : '';
    $pass = !empty($_POST['pass']) ? trim($_POST['pass']) : '';
    if (empty($login) || empty($pass)) {
        $_SESSION['errors'] = 'поля обязательны';
        return false;
    }

    $res = $pdo->prepare("SELECT * FROM users WHERE name=?"); // формируем подгоовленный запрос
    $res->execute([$login]); // выполняем запрос

    //если не пустата то продолжаем авторизацию
    // если что то вытащили то это 0, а если в бд ничего нет 0 конвертируется в 1 и условие выполнися
    if (!$user=$res->fetch()) {
        $_SESSION['errors'] = 'что то введенео неврено';
        return false;
    }

    if (!password_verify($pass, $user['pass'])) {
        $_SESSION['errors'] = 'что то введенео неврено';
        return false;
    } else {
        $_SESSION['success'] = 'успешная авторизация';
        $_SESSION['user']['name']=$user['name'];
        $_SESSION['user']['id']=$user['id'];
        return true;
    }
}

function add_message()
{
    global $pdo;
    $message = !empty($_POST['message']) ? trim($_POST['message']) : '';
    if (!isset($_SESSION['user']['name'])) {
        $_SESSION['errors'] = 'нужна авторизация';
        return false;
    }
    if (empty($message)) {
        $_SESSION['errors'] = 'ну напишете хоть что то';
        return false;
    }
    $res=$pdo->prepare("INSERT INTO messages (name,message) VALUES (?,?)");
    if  ($res->execute([$_SESSION['user']['name'],$message])) {
        $_SESSION['success'] = 'успешная add';
        return true;
    } else {
        $_SESSION['errors'] = 'ошибка add';
        return false;
    }
}

function get_message()
{
    global $pdo;
    $res=$pdo->query("SELECT * FROM messages");
    return $res->fetchAll();
}