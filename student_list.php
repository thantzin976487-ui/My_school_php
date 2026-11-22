<?php 
    session_start();
    include("connection.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student List</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet">
    <link rel="stylesheet" href="responsive.css">
</head>

<body class="bg-light">

    <!-- Navbar -->
    <nav class="navbar navbar-dark bg-primary px-4">
        <a href="index.php" class="navbar-brand">
            School Management
        </a>

        <a href="index.php" class="btn btn-light">
            Home
        </a>
    </nav>

    <!-- Student List -->
    <div class="container mt-4">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3>Student List</h3>

            <a href="admission.php" class="btn btn-primary">
                + Add Student
            </a>
        </div>

        <!-- Search -->
        <div class="mb-3">
            <input type="text" class="form-control"
                placeholder="Search student name...">
        </div>

        <!-- Table -->

        <?php $student_list = $conn->query("SELECT * FROM student_list");
        $counter = 1;
        $total_fee = 1000000;
        ?>

        <div class="card shadow-sm">
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-bordered table-striped text-center align-middle">

                        <thead class="table-primary">
                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Student Name</th>
                                <th>Date of Birth</th>
                                <th>Gender</th>
                                <th>Phone</th>
                                <th>Course</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php while ($student = $student_list->fetch_assoc()): ?>
                                <tr>
                                    <td><?php echo $counter++ ?></td>

                                    <!-- Student Image -->
                                    <td>
                                        <img src="photo/<?php echo $student['image'] ?>"
                                            alt="Student Image"
                                            width="60"
                                            height="60"
                                            class="rounded-circle border"
                                            style="object-fit: cover;">
                                    </td>

                                    <td><?php echo $student['s_name'] ?></td>
                                    <td><?php echo $student['s_d_o_b'] ?></td>
                                    <td><?php echo $student['s_gender'] ?></td>
                                    <td><?php echo $student['s_ph_number'] ?></td>
                                    <td><?php echo $student['s_course'] ?></td>

                                    <td>
                                        <?php
                                        $student_id = $student['id'];

                                        $fee_result = $conn->query("SELECT SUM(amount) AS total_paid
                                            FROM pay_fee WHERE s_id = $student_id
                                            ");

                                        $fee = $fee_result->fetch_assoc();
                                        $total_paid = $fee['total_paid'];

                                        if ($total_paid >= $total_fee) {
                                            echo '<span class="badge bg-success">Paid</span>';
                                        } elseif ($total_paid > 0) {
                                            echo '<span class="badge bg-warning">Partial</span>';
                                        } else {
                                            echo '<span class="badge bg-danger">Unpaid</span>';
                                        }
                                        ?>
                                    </td>

                                    <td>
                                        <a href="pay_fee.php?id=<?php echo $student['id'] ?>"
                                            class="btn btn-success btn-sm">
                                            Pay Fee
                                        </a>
                                        <?php if(isset($_SESSION['user']) && isset($_SESSION['user']['admin_password']) &&
                                                $_SESSION['user']['admin_password'] === true ):
                                         ?>
                                            <a href="student_edit.php?id=<?php echo $student['id'] ?>"
                                                class="btn btn-warning btn-sm">
                                                Edit
                                            </a>

                                            <a href="student_delete.php?id=<?php echo $student['id'] ?>"
                                                class="btn btn-danger btn-sm">
                                                Delete
                                            </a>
                                        <?php endif; ?>
                                    </td>

                                </tr>

                            <?php endwhile; ?>
                        </tbody>

                    </table>
                </div>

            </div>
        </div>

    </div>

</body>

</html>