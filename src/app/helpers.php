<?php

use App\Models\User;
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

function validate_input(): bool
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

function redirect(string $url, ?int $statusCode = 200)
{
    header("Location: " . $url, response_code: $statusCode);
    exit();
}

function isGuest(): bool
{
    if (Session::get('user') === null) {
        return true;
    }

    return false;
}

function user(string $key)
{
    $id = Session::get('user');
    $user = User::where('user_id', $id)[0];

    return $user[$key];
}

function csrf()
{
    $token = bin2hex(random_bytes(32));
    Session::add('token', $token);

    return $token;
}