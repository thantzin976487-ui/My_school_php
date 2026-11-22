<?php include("connection.php") ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Fee</title>

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

    <!-- School Fee -->
    <div class="container mt-4 mb-5">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3>School Fee Management</h3>

            <a href="student_list.php" class="btn btn-secondary">
                Student List
            </a>
        </div>

        <!-- Fee Table -->

        <?php $pay_fee = $conn->query("
                    SELECT
                        student_list.id,student_list.image,student_list.s_name,student_list.s_course,
                        COALESCE(SUM(pay_fee.amount), 0) AS total_paid
                        
                        FROM student_list LEFT JOIN pay_fee ON student_list.id = pay_fee.s_id
                        GROUP BY
                            student_list.id,
                            student_list.image,
                            student_list.s_name,
                            student_list.s_course
                            ");
        $counter = 1;
        $total_fee = 1000000;
        ?>

        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Student Fee List</h5>
            </div>

            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-bordered table-striped text-center align-middle">

                        <thead class="table-primary">
                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Student Name</th>
                                <th>Course</th>
                                <th>Total Fee</th>
                                <th>Paid Amount</th>
                                <th>Remaining Fee</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php while ($fee = $pay_fee->fetch_assoc()):
                                  $paid_amount = $fee['total_paid'];
                                  $remain_fee = $total_fee - $paid_amount;  ?>
                                <tr>
                                    <td><?php echo $counter++ ?></td>
                                    <td>
                                        <img src="photo/<?php echo $fee['image'] ?>"
                                            alt="Student Image"
                                            width="60"
                                            height="60"
                                            class="rounded-circle border"
                                            style="object-fit: cover;">
                                    </td>
                                    <td><?php echo $fee['s_name'] ?></td>
                                    <td><?php echo $fee['s_course'] ?></td>
                                    <td>1000,000 MMK</td>
                                    <td><?php echo number_format($paid_amount) ?></td>
                                    <td><?php echo number_format($remain_fee) ?></td>
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