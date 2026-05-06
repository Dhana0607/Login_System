<?php
session_start();

if (!isset($_SESSION['username'])) {

    header("Location: login.php");
    exit;
}

$userId = $_SESSION['user_id'];
$username = $_SESSION['username'];
$email = $_SESSION['email'];
$theme = $_SESSION['theme'];

$bgColor = "#f8f9fa";
$textColor = "black";

switch ($theme) {

    case "dark":
        $bgColor = "#1e1e2f";
        $textColor = "white";
        break;

    case "warm":
        $bgColor = "#f4a261";
        $textColor = "black";
        break;

    case "primary":
        $bgColor = "#0d6efd";
        $textColor = "white";
        break;

    default:
        $bgColor = "#f8f9fa";
        $textColor = "black";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

        body {
            background-color: <?php echo $bgColor; ?>;
            color: <?php echo $textColor; ?>;
            min-height: 100vh;
        }

        .profile-card {
            border-radius: 20px;
        }

    </style>
</head>

<body>

<!-- NAVBAR -->

<nav class="navbar navbar-dark bg-dark shadow">

    <div class="container">

        <span class="navbar-brand fw-bold">
            Secure Login System
        </span>

        <a href="logout.php" class="btn btn-light rounded-pill">
            Logout
        </a>

    </div>

</nav>

<div class="container py-5">

    <!-- WELCOME SECTION -->

    <div class="card shadow border-0 mb-4 profile-card">

        <div class="card-body p-4">

            <h2 class="fw-bold">
                Welcome Back, <?php echo $username; ?> 👋
            </h2>

            <p class="text-muted">
                You have successfully logged in.
            </p>

        </div>

    </div>

    <!-- USER DETAILS -->

    <div class="row">

        <div class="col-md-6 mb-4">

            <div class="card shadow border-0 profile-card h-100">

                <div class="card-body">

                    <h4 class="mb-4">
                        User Information
                    </h4>

                    <table class="table">

                        <tr>
                            <th>User ID</th>
                            <td><?php echo $userId; ?></td>
                        </tr>

                        <tr>
                            <th>Username</th>
                            <td><?php echo $username; ?></td>
                        </tr>

                        <tr>
                            <th>Email</th>
                            <td><?php echo $email; ?></td>
                        </tr>

                    </table>

                </div>

            </div>

        </div>

        <!-- THEME CARD -->

        <div class="col-md-6 mb-4">

            <div class="card shadow border-0 profile-card h-100">

                <div class="card-body">

                    <h4 class="mb-4">
                        Current Theme
                    </h4>

                    <span class="badge bg-primary fs-6 px-4 py-2">
                        <?php echo ucfirst($theme); ?>
                    </span>

                    <div class="mt-4">

                        <p>
                            Your dashboard theme changes dynamically
                            based on your user account.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- QUICK STATS -->

    <div class="row">

        <div class="col-md-4 mb-4">

            <div class="card shadow border-0 text-center profile-card">

                <div class="card-body">

                    <h1>4</h1>

                    <p class="text-muted">
                        Total Users
                    </p>

                </div>

            </div>

        </div>

        <div class="col-md-4 mb-4">

            <div class="card shadow border-0 text-center profile-card">

                <div class="card-body">

                    <h1>1</h1>

                    <p class="text-muted">
                        Active Session
                    </p>

                </div>

            </div>

        </div>

        <div class="col-md-4 mb-4">

            <div class="card shadow border-0 text-center profile-card">

                <div class="card-body">

                    <h1>100%</h1>

                    <p class="text-muted">
                        Secure Login
                    </p>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>