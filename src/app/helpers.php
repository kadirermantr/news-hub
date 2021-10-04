<?php

function publicPath(?string $path = null)
{
    $env = parse_ini_file(__DIR__ . '/../.env');
    echo $env['APP_URL'] . '/' . $path;
}

function view($view, string $title, array $data = [])
{
    require_once __DIR__ . '/views/'.$view.'.php';
}

function env(string $data)
{
    $env = parse_ini_file(__DIR__ . '/../.env');
    return $env[$data];
}

function validate_input()
{
    foreach ($_POST as $key => $value) {
        if (empty($value)) {
            $error_msg[] = "Tüm alanları doldurun.";
            break;
        }
    }

    if (isset($_POST["email"])) {
        $email = test_input($_POST["email"]);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error_msg[] = "E-Posta adresi geçersiz.";
        }
    }

    if (isset($_POST["password_confirmation"])) {
        $password = test_input($_POST["password"]);
        $password_confirmation = test_input($_POST["password_confirmation"]);

        if ($password !== $password_confirmation) {
            $error_msg[] = "Girilen parolalar eşleşmedi.";
        }
    }

    if (!empty($error_msg)) {
        session_start();

        $_SESSION['error'] = $error_msg;
        header("Location: " . $_SERVER['REQUEST_URI']);
        return false;
    }

    return true;
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}