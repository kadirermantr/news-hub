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
            $error_msg[] = "Please fill in the all fields.";
            break;
        }
    }

    if (isset($_POST["email"])  && !empty($_POST['email'])) {
        $email = test_input($_POST["email"]);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error_msg[] = "Invalid email format.";
        }
    }

    if (isset($_POST["password_confirmation"])) {
        $password = test_input($_POST["password"]);
        $password_confirmation = test_input($_POST["password_confirmation"]);

        if ($password !== $password_confirmation) {
            $error_msg[] = "Passwords do not match.";
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
    $user = User::find($id);

    return $user[$key] ?? null;
}

function csrf()
{
    $token = bin2hex(random_bytes(32));
    Session::add('token', $token);

    return $token;
}

function isImage($file)
{
    $tmp_path = $file['tmp_name'];
    $file_info = finfo_open(FILEINFO_MIME_TYPE);
    $mime_type = finfo_file($file_info, $tmp_path);
    $extension = pathinfo($file['name'], PATHINFO_EXTENSION);

    $allowed_types = [
        "image/gif"     => "gif",
        "image/png"     => "png",
        "image/jpeg"    => ["jpg", "jpe", "jpeg"],
    ];

    $match_mime_type = key_exists($mime_type, $allowed_types);
    $ext_match = false;

    if ($match_mime_type) {
        if (is_string($allowed_types[$mime_type])) {
            $allowed_types[$mime_type] = [$allowed_types[$mime_type]];
        }

        $ext_match = in_array($extension, $allowed_types[$mime_type]);
    }

    return $match_mime_type === true && $ext_match === true;
}
