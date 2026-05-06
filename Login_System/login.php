<?php
session_start();

$username = $_COOKIE['remember_username'] ?? "";
$theme = $_COOKIE['user_theme'] ?? "light";

$error = $_SESSION['error'] ?? "";
unset($_SESSION['error']);

$bgColor = "#f8f9fa";

switch ($theme) {

    case "dark":
        $bgColor = "#020202";
        break;

    case "warm":
        $bgColor = "#f4a261";
        break;

    case "primary":
        $bgColor = "#0d6efd";
        break;

    default:
        $bgColor = "#f8f9fa";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login System</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: <?php echo $bgColor; ?>;
            height: 100vh;
        }

        .login-card {
            border-radius: 20px;
        }
    </style>
</head>

<body>

<div class="container h-100">

    <div class="row h-100 justify-content-center align-items-center">

        <div class="col-md-5">

            <div class="card shadow-lg border-0 login-card">

                <div class="card-body p-5">

                    <h2 class="text-center fw-bold mb-4">
                        Secure Login System
                    </h2>

                    <p class="text-center text-muted mb-4">
                        Login using your credentials
                    </p>

                    <?php if ($error) : ?>
                        <div class="alert alert-danger">
                            <?php echo $error; ?>
                        </div>
                    <?php endif; ?>

                    <form action="auth.php" method="POST">

                        <div class="mb-3">
                            <label class="form-label">Username</label>

                            <input
                                type="text"
                                name="username"
                                class="form-control"
                                value="<?php echo htmlspecialchars($username); ?>"
                            >
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>

                            <input
                                type="email"
                                name="email"
                                class="form-control"
                            >
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Password</label>

                            <input
                                type="password"
                                name="password"
                                class="form-control"
                            >
                        </div>

                        <div class="form-check mb-4">

                            <input
                                class="form-check-input"
                                type="checkbox"
                                name="remember"
                            >

                            <label class="form-check-label">
                                Remember Me
                            </label>

                        </div>

                        <button class="btn btn-primary w-100 py-2">
                            Login
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>