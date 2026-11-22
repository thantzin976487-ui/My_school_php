<?php
session_start();
include("connection.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet">
    <link rel="stylesheet" href="responsive.css">
</head>

<body class="bg-light">
    <nav class="navbar bg-primary px-4">
        <a href="index.php" class="navbar-brand text-white">
            Login
        </a>

        <a href="index.php" class="btn btn-light">Home</a>
    </nav>

    <div class="container d-flex justify-content-center align-items-center min-vh-100">

        <div class="card shadow p-4" style="width: 400px;">

            <h3 class="text-center text-primary mb-4">
                School Management
            </h3>

            <h5 class="text-center mb-4">Login Account</h5>

            <?php
            if (isset($_POST['login'])) {
                $username = $_POST['username'];
                $password = $_POST['password'];

                $school_username = $conn->query("SELECT * FROM user");


                $login_success = false;

                while ($user = $school_username->fetch_assoc()) {

                    if (password_verify($password, $user['password'])) {

                        $_SESSION['user'] = [
                            'username' => $_POST['username'],
                            'admin_password' => ($password === "myschoolphp")
                        ];

                        $login_success = true;

                        header("Location: index.php");
                    } else {
                        echo "Login failed";
                    }
                }
            }
            ?>

            <form action="" method="post">

                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text"
                        name="username"
                        class="form-control"
                        placeholder="Enter username"
                        required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>

                    <div class="input-group">
                        <input type="password"
                            name="password"
                            id="password"
                            class="form-control"
                            placeholder="Create password"
                            required>

                        <button type="button"
                            class="btn btn-outline-secondary"
                            onclick="showPassword()">
                            <span id="eye">👁</span>
                        </button>
                    </div>
                </div>

                <button type="submit"
                    name="login"
                    class="btn btn-primary w-100">
                    Login
                </button>

            </form>

            <p class="text-center mt-3 mb-0">
                Don't have an account?
                <a href="register.php">Register</a>
            </p>

        </div>

    </div>

    <script>
        function showPassword() {

            let password = document.getElementById("password");
            let eye = document.getElementById("eye");

            if (password.type === "password") {
                password.type = "text";
                eye.innerHTML = "🙈";
            } else {
                password.type = "password";
                eye.innerHTML = "👁";
            }

        }
    </script>

</body>

</html>