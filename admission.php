<?php include("connection.php") ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Admission</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="responsive.css">
</head>

<body class="bg-light">

    <nav class="navbar bg-primary px-4">
        <a href="index.php" class="navbar-brand text-white">
            School Management
        </a>
        <a href="index.php" class="btn btn-light">Home</a>
    </nav>

    <?php
        $media = "photo/";

        if(isset($_POST['submit'])) {
            $s_name = $_POST['s_name'];
            $s_d_o_b = $_POST['s_d_o_b'];
            $s_gender = $_POST['s_gender'];
            $s_ph_number = $_POST['s_ph_number'];
            $s_address = $_POST['s_address'];
            $s_course = $_POST['s_course'];
            $image = null;
            if(!empty($_FILES['image'])) {
                $image = time()."_".basename($_FILES['image']['name']);
                move_uploaded_file($_FILES['image']['tmp_name'], $media.$image);

                $conn->query("INSERT INTO student_list(s_name, image, s_d_o_b, s_gender, s_ph_number, s_address, s_course) 
                                    VALUES('$s_name', '$image', '$s_d_o_b', '$s_gender', '$s_ph_number', '$s_address', '$s_course')");

                header("location:student_list.php");
                exit();
            }
        }
    ?>

    <div class="container mt-4 mb-5">
        <div class="card shadow mx-auto" style="max-width: 650px;">

            <div class="card-header bg-primary text-white text-center">
                <h3>Student Admission Form</h3>
            </div>

            <div class="card-body p-4">

                <form method="post" enctype="multipart/form-data">

                    <div class="mb-3">
                        <label class="form-label">Student Name</label>
                        <input type="text" name="s_name"
                            class="form-control"
                            placeholder="Enter student name" required>
                    </div>

                    <!-- Student Image -->
                    <div class="mb-3">
                        <label class="form-label">Student Image</label>
                        <input type="file" name="image"
                            class="form-control"
                            accept="image/*" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Date of Birth</label>
                        <input type="date" name="s_d_o_b"
                            class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Gender</label>
                        <select name="s_gender" class="form-select" required>
                            <option value="">Choose Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Phone Number</label>
                        <input type="text" name="s_ph_number"
                            class="form-control"
                            placeholder="Enter phone number" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Address</label>
                        <textarea name="s_address" class="form-control"
                            rows="3"
                            placeholder="Enter address" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Choose Course</label>
                        <select name="s_course" class="form-select" required>
                            <option value="">Select Course</option>
                            <option value="Computer Basic">Computer Basic</option>
                            <option value="Web Development">Web Development</option>
                            <option value="Graphic Design">Graphic Design</option>
                        </select>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="index.php" class="btn btn-secondary">
                            Cancel
                        </a>

                        <button type="submit" name="submit"
                            class="btn btn-primary">
                            Submit Admission
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>

</body>

</html>