<?php include("connection.php") ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pay School Fee</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet">
    <link rel="stylesheet" href="responsive.css">
</head>

<body class="bg-light">

    <nav class="navbar navbar-dark bg-primary px-4">
        <a href="index.php" class="navbar-brand">
            School Management
        </a>
        <a href="student_list.php" class="btn btn-light">
            Back
        </a>
    </nav>

    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $student_list = $conn->query("SELECT * FROM student_list WHERE id=$id");
        $student = $student_list->fetch_assoc();

        $media = "photo/";

        if (isset($_POST['submit'])) {
            $s_id = $id;
            $s_name = $_POST['s_name'];
            $s_course = $_POST['s_course'];
            $payment_date = $_POST['payment_date'];
            $amount = $_POST['amount'];
            $payment_method = $_POST['payment_method'];
            $image = $_POST['image'];

            $pay_fee = $conn->prepare("INSERT INTO pay_fee(s_id, s_name, s_course, payment_date, amount, payment_method, image)
                            VALUES(?,?,?,?,?,?,?)");
            $pay_fee->bind_param("isssiss", $s_id, $s_name, $s_course, $payment_date, $amount, $payment_method, $image);

            if ($pay_fee->execute()) {
                header("location:school_fee.php");
            }
        }
    }
    ?>

    <div class="container mt-5 mb-5">
        <div class="card shadow mx-auto" style="max-width: 600px;">

            <div class="card-header bg-primary text-white text-center">
                <h4>Pay School Fee</h4>
            </div>

            <div class="card-body p-4">

                <h5 class="mb-3">Student Information</h5>
                <p><strong>Total Fee:</strong> 200,000 MMK</p>

                <hr>

                <form action="" method="post" enctype="multipart/form-data">

                    <div class="mb-3">
                        <label class="form-label">
                            Student Name
                        </label>
                        <input type="text" name="s_name"
                            class="form-control"
                            value="<?php echo $student['s_name'] ?>"
                            required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">
                            Course
                        </label>
                        <input type="text" name="s_course"
                            class="form-control"
                            value="<?php echo $student['s_course'] ?>"
                            required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Image</label>

                        <div>
                            <img src="photo/<?php echo $student['image']; ?>"
                                width="100" height="100"
                                class="rounded-circle border"
                                style="object-fit: cover;">
                        </div>

                        <input type="hidden" name="image"
                            value="<?php echo $student['image']; ?>">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">
                            Payment Date
                        </label>
                        <input type="date" name="payment_date"
                            class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">
                            Amount to Pay (MMK)
                        </label>
                        <input type="number" name="amount"
                            class="form-control"
                            min="1" max="1000000"
                            placeholder="Enter amount" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">
                            Payment Method
                        </label>
                        <select name="payment_method"
                            class="form-select" required>
                            <option value="">Select Method</option>
                            <option value="Cash">Cash</option>
                            <option value="KPay">KPay</option>
                            <option value="WavePay">WavePay</option>
                        </select>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="student_list.php"
                            class="btn btn-secondary">
                            Cancel
                        </a>

                        <button type="submit" name="submit"
                            class="btn btn-success">
                            Submit Payment
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>

</body>

</html>