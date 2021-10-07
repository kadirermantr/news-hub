<?php

use Core\Session;

function public_path(?string $path = null)
{
    $env = parse_ini_file(__DIR__ . '/../.env');
    echo $env['APP_URL'] . '/' . $path;
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

    if (isset($_POST["email"])  && !empty($_POST['email'])) {
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
        Session::add('error', $error_msg);
        redirect($_SERVER['REQUEST_URI']);
    }

    return true;
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}

function redirect(string $url, ?int $statusCode = 200)
{
    http_response_code($statusCode);
    header("Location: " . $url);
    exit();
}

function session_control() {
    $user = Session::get('user');

    if (isset($user)) {
        return $user;
    }

    return false;
}