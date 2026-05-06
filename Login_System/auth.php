<?php
session_start();

require 'includes/validation.php';

$username = trim($_POST['username'] ?? "");
$email = trim($_POST['email'] ?? "");
$password = trim($_POST['password'] ?? "");
$remember = isset($_POST['remember']);

$errors = [];

if ($msg = validateUsername($username)) {
    $errors[] = $msg;
}

if ($msg = validateEmail($email)) {
    $errors[] = $msg;
}

if ($msg = validatePassword($password)) {
    $errors[] = $msg;
}

if (!empty($errors)) {

    $_SESSION['error'] = implode("<br>", $errors);

    header("Location: login.php");
    exit;
}

$users = [

    [
        "id" => 1,
        "username" => "user1",
        "email" => "user1@gmail.com",
        "password" => "User@123",
        "theme" => "dark"
    ],

    [
        "id" => 2,
        "username" => "user2",
        "email" => "user2@gmail.com",
        "password" => "User@123",
        "theme" => "warm"
    ],

    [
        "id" => 3,
        "username" => "user3",
        "email" => "user3@gmail.com",
        "password" => "User@123",
        "theme" => "light"
    ],

    [
        "id" => 4,
        "username" => "admin",
        "email" => "admin@gmail.com",
        "password" => "Admin@123",
        "theme" => "primary"
    ]

];

$authenticated = false;

foreach ($users as $user) {

    if (
        $user['username'] === $username &&
        $user['email'] === $email &&
        $user['password'] === $password
    ) {

        $authenticated = true;

        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['theme'] = $user['theme'];

        if ($remember) {

            setcookie(
                "remember_username",
                $username,
                time() + 60,
                "/"
            );

            setcookie(
                "user_theme",
                $user['theme'],
                time() + 60,
                "/"
            );
        }

        header("Location: dashboard.php");
        exit;
    }
}

if (!$authenticated) {

    $_SESSION['error'] = "Invalid Login Credentials";

    header("Location: login.php");
    exit;
}
?>