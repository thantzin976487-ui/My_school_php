<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-B/GM4XqrwHnWXNOWMbloTmrYXZg10cakYGmpfsR/bbzQ6JAJI4ihuyADKLnBgrCe" crossorigin="anonymous">

    <style>

        body{background-color: white;}

    </style>
</head>

<body>

    <header>
        <div class="nav-overflow d-flex justify-content-center" data-bs-toggle="nav-overflow">
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Shop</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Register</a>
                </li>
            </ul>
        </div>
    </header>

    <main></main>

    <footer></footer>

    <script type="module" src="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-1a/pXj49ZQ1aHEmrJ+gMw1otqoVsYwlEnlD8mIfY2TV03r20Y0CN7uqx1tQogjPL"
        crossorigin="anonymous"></script>

</body>

</html>    <?php session_start();
    include("connection.php");
    ?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>My School Management System</title>

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
            rel="stylesheet">

        <style>
            body {
                background-color: #f4f7fc;
                font-family: Arial, sans-serif;
            }

            .navbar {
                background-color: white;
            }

            .navbar-brand {
                color: #0d47a1;
                font-size: 25px;
                font-weight: bold;
            }

            .nav-link {
                color: #243b60;
                font-weight: 500;
            }

            .nav-link:hover {
                color: #0d6efd;
            }

            .hero {
                background: linear-gradient(120deg, #0d47a1, #3986e8);
                color: white;
                padding: 90px 0;
            }

            .hero h1 {
                font-size: 45px;
                font-weight: bold;
            }

            .hero p {
                font-size: 18px;
                line-height: 1.8;
            }

            .section-title {
                color: #12376a;
                font-weight: bold;
            }

            .feature-card {
                border: none;
                border-radius: 15px;
                transition: 0.3s;
            }

            .feature-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
            }

            .feature-icon {
                font-size: 42px;
                margin-bottom: 15px;
            }

            .feature-card h5 {
                color: #12376a;
                font-weight: bold;
            }

            .about-section {
                background-color: white;
            }

            .about-box {
                background-color: #e8f1ff;
                padding: 35px;
                border-radius: 15px;
            }

            .number-box {
                background-color: white;
                padding: 25px;
                border-radius: 12px;
                box-shadow: 0 3px 15px rgba(0, 0, 0, 0.05);
            }

            .number-box h2 {
                color: #0d6efd;
                font-weight: bold;
            }

            footer {
                background-color: #12376a;
                color: white;
                padding: 25px 0;
            }

            @media (max-width: 768px) {
                .hero {
                    padding: 60px 0;
                }

                .hero h1 {
                    font-size: 32px;
                }
            }
        </style>
        <link rel="stylesheet" href="responsive.css">
</head>

    <body>

        <!-- NAVBAR -->
        <nav class="navbar navbar-expand-lg shadow-sm sticky-top">
            <div class="container">

                <a class="navbar-brand" href="index.php">
                    🎓 My School
                </a>

                <button class="navbar-toggler" type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarMenu"
                    aria-controls="navbarMenu"
                    aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarMenu">

                    <ul class="navbar-nav mx-auto">

                        <li class="nav-item">
                            <a class="nav-link active" href="index.php">Home</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#about">About</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="admission.php">Admission</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="student_list.php">Student List</a>
                        </li>

                    <?php if(isset($_SESSION['user']) && isset($_SESSION['user']['admin_password']) &&
                                $_SESSION['user']['admin_password'] === true ): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="school_fee.php">School Fee</a>
                        </li>
                    <?php endif ?>

                        <li class="nav-item">
                            <a class="nav-link" href="calculator.php">Calculator</a>
                        </li>

                        <?php if (isset($_SESSION['user'])): ?>
                            <li class="nav-item">
                                <a class="nav-link text-primary" href="#"><?php echo $_SESSION['user']['username'];  ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-danger" href="logout.php?logout">Logout</a>
                            </li>


                    </ul>
                <?php else: ?>
                    <div class="d-flex gap-2 mt-3 mt-lg-0">
                        <a href="login.php"
                            class="btn btn-outline-primary">
                            Login
                        </a>

                        <a href="register.php"
                            class="btn btn-primary">
                            Register
                        </a>
                    </div>
                <?php endif; ?>
                </div>
            </div>
        </nav>


        <!-- HERO SECTION -->
        <section class="hero">

            <div class="container">
                <div class="row align-items-center">

                    <div class="col-lg-8">

                        <p class="text-uppercase fw-bold mb-2">
                            Welcome to our school
                        </p>

                        <h1>School Management System</h1>

                        <p class="mt-3">
                            Manage student admissions, student records,
                            school fees and accounts in one place.
                            Our system makes school management easier
                            and more convenient.
                        </p>

                        <a href="admission.php"
                            class="btn btn-warning btn-lg mt-2">
                            Apply for Admission
                        </a>

                        <a href="student_list.php"
                            class="btn btn-outline-light btn-lg mt-2 ms-2">
                            View Students
                        </a>

                    </div>

                </div>
            </div>
        </section>


        <!-- SCHOOL STATISTICS -->
        <section class="py-5">

        <?php
            $all = $conn->prepare("SELECT COUNT(*) AS all_student FROM student_list");
            $all->execute();

            $result = $all->get_result();
            $all_student = $result->fetch_assoc();
        ?>

            <div class="container">

                <div class="row g-4 text-center">

                    <div class="col-6 col-lg-3">
                        <div class="number-box">
                            <h2><?php echo $all_student['all_student'] ?></h2>
                            <p class="text-secondary mb-0">
                                Students
                            </p>
                        </div>
                    </div>

                    <div class="col-6 col-lg-3">
                        <div class="number-box">
                            <h2>30+</h2>
                            <p class="text-secondary mb-0">
                                Teachers
                            </p>
                        </div>
                    </div>

                    <div class="col-6 col-lg-3">
                        <div class="number-box">
                            <h2>15+</h2>
                            <p class="text-secondary mb-0">
                                Classrooms
                            </p>
                        </div>
                    </div>

                    <div class="col-6 col-lg-3">
                        <div class="number-box">
                            <h2>10+</h2>
                            <p class="text-secondary mb-0">
                                Years of Experience
                            </p>
                        </div>
                    </div>

                </div>

            </div>
        </section>


        <!-- SERVICES -->
        <section class="py-5">
            <div class="container">

                <div class="text-center mb-5">
                    <h2 class="section-title">School Services</h2>
                    <p class="text-secondary">
                        Choose a service to get started
                    </p>
                </div>

                <div class="row g-4">

                    <!-- Admission -->
                    <div class="col-md-6 col-lg-4">
                        <div class="card feature-card shadow-sm h-100">
                            <div class="card-body text-center p-4">

                                <div class="feature-icon">📝</div>

                                <h5>Student Admission</h5>

                                <p class="text-secondary">
                                    Register new students and fill out
                                    the school admission application.
                                </p>

                                <a href="admission.php"
                                    class="btn btn-primary">
                                    Apply Now
                                </a>

                            </div>
                        </div>
                    </div>

                    <!-- Student List -->
                    <div class="col-md-6 col-lg-4">
                        <div class="card feature-card shadow-sm h-100">
                            <div class="card-body text-center p-4">

                                <div class="feature-icon">👨‍🎓</div>

                                <h5>Student List</h5>

                                <p class="text-secondary">
                                    View registered students and
                                    manage their information.
                                </p>

                                <a href="student_list.php"
                                    class="btn btn-success">
                                    View Students
                                </a>

                            </div>
                        </div>
                    </div>

                    <!-- School Fee -->
                    <div class="col-md-6 col-lg-4">
                        <div class="card feature-card shadow-sm h-100">
                            <div class="card-body text-center p-4">

                                <div class="feature-icon">💳</div>

                                <h5>School Fee</h5>

                                <p class="text-secondary">
                                    Check school fees and payment
                                    records for students.
                                </p>

                                <a href="school_fee.php"
                                    class="btn btn-info text-white">
                                    View Fees
                                </a>

                            </div>
                        </div>
                    </div>

                    <!-- Login -->
                    <div class="col-md-6 col-lg-4">
                        <div class="card feature-card shadow-sm h-100">
                            <div class="card-body text-center p-4">

                                <div class="feature-icon">🔐</div>

                                <h5>Student Login</h5>

                                <p class="text-secondary">
                                    Log in to your account and
                                    access your information.
                                </p>

                                <a href="login.php"
                                    class="btn btn-danger">
                                    Login Now
                                </a>

                            </div>
                        </div>
                    </div>

                    <!-- Register -->
                    <div class="col-md-6 col-lg-4">
                        <div class="card feature-card shadow-sm h-100">
                            <div class="card-body text-center p-4">

                                <div class="feature-icon">📋</div>

                                <h5>Create Account</h5>

                                <p class="text-secondary">
                                    Create a new account to use
                                    the school management system.
                                </p>

                                <a href="register.php"
                                    class="btn btn-primary">
                                    Register Now
                                </a>

                            </div>
                        </div>
                    </div>

                    <!-- About -->
                    <div class="col-md-6 col-lg-4">
                        <div class="card feature-card shadow-sm h-100">
                            <div class="card-body text-center p-4">

                                <div class="feature-icon">🏫</div>

                                <h5>About Our School</h5>

                                <p class="text-secondary">
                                    Learn more about our school,
                                    our mission and our vision.
                                </p>

                                <a href="#about"
                                    class="btn btn-warning">
                                    Learn More
                                </a>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>


        <!-- ABOUT SECTION -->
        <section class="about-section py-5" id="about">
            <div class="container">

                <div class="row align-items-center g-4">

                    <div class="col-lg-6">
                        <div class="about-box">

                            <h2 class="section-title mb-3">
                                About Our School
                            </h2>

                            <p class="text-secondary">
                                Our school is dedicated to providing
                                quality education and creating a
                                positive learning environment for
                                every student.
                            </p>

                            <p class="text-secondary">
                                We aim to help students develop
                                knowledge, discipline, confidence
                                and practical skills for the future.
                            </p>

                            <a href="admission.php"
                                class="btn btn-primary">
                                Join Our School
                            </a>

                        </div>
                    </div>

                    <div class="col-lg-6">
                        <h3 class="section-title">
                            Education for a Better Future
                        </h3>

                        <p class="text-secondary mt-3">
                            Our School Management System helps
                            organize student admissions, student
                            records and school fee information.
                            It provides a simple way to access
                            school services.
                        </p>

                        <ul class="list-group list-group-flush mt-3">

                            <li class="list-group-item bg-transparent">
                                ✅ Easy student registration
                            </li>

                            <li class="list-group-item bg-transparent">
                                ✅ Organized student records
                            </li>

                            <li class="list-group-item bg-transparent">
                                ✅ School fee management
                            </li>

                            <li class="list-group-item bg-transparent">
                                ✅ Convenient account access
                            </li>

                        </ul>
                    </div>

                </div>
            </div>
        </section>


        <!-- FOOTER -->
        <footer>
            <div class="container">

                <div class="row align-items-center">

                    <div class="col-md-6 text-center text-md-start">
                        <p class="mb-0">
                            &copy; 2026 My School. All Rights Reserved.
                        </p>
                    </div>

                    <div class="col-md-6 text-center text-md-end mt-2 mt-md-0">
                        Education | Discipline | Success
                    </div>

                </div>

            </div>
        </footer>


        <!-- Bootstrap JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js">
        </script>

    </body>

    </html>