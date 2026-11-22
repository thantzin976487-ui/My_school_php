<?php include("connection.php") ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Student</title>

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

        <a href="student_list.php" class="btn btn-light">
            Back
        </a>
    </nav>

    <!-- Edit Form -->
    <div class="container mt-4 mb-5">

        <div class="card shadow mx-auto" style="max-width: 650px;">

            <div class="card-header bg-primary text-white text-center">
                <h4>Edit Student Information</h4>
            </div>

            <div class="card-body p-4">

            <?php 
                if($_GET['id']) {
                    $id = $_GET['id'];

                    $student_list = $conn->query("SELECT * FROM student_list WHERE id=$id");
                    $student = $student_list->fetch_assoc();

                    $media = "photo/";

                    if(isset($_POST['update'])) {
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

                            $conn->query("UPDATE student_list SET s_name='$s_name', image='$image', s_d_o_b='$s_d_o_b', s_gender='$s_gender',
                                             s_ph_number='$s_ph_number', s_address='$s_address', s_course='$s_course' WHERE id=$id");
                            header("location:student_list.php");

                        }
                    }
                }
            ?>

                <form method="post" enctype="multipart/form-data">

                    <div class="mb-3">
                        <label class="form-label">Student Name</label>
                        <input type="text"
                            name="s_name"
                            class="form-control"
                            value="<?php echo $student['s_name'] ?>"
                            required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Student Image</label>
                        <input type="file" name="image"
                            class="form-control"
                            accept="image/*" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Date of Birth</label>
                        <input type="date"
                            name="s_d_o_b"
                            class="form-control"
                            value="<?php echo $student['s_d_o_b'] ?>"
                            required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Gender</label>
                        <select name="s_gender"
                            class="form-select"
                            required>
                            <option value="<?php echo $student['s_gender'] ?>">Select Gender</option>
                            <option value="Male" selected>Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Phone Number</label>
                        <input type="text"
                            name="s_ph_number"
                            class="form-control"
                            value="<?php echo $student['s_ph_number'] ?>"
                            required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Address</label>
                        <textarea name="s_address"
                            class="form-control"
                            rows="3"
                            required><?php echo $student['s_address'] ?></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Course</label>
                        <select name="s_course"
                            class="form-select"
                            required>
                            <option value="">Select Course</option>
                            <option value="Computer Basic">
                                Computer Basic
                            </option>
                            <option value="Web Development" selected>
                                Web Development
                            </option>
                            <option value="Graphic Design">
                                Graphic Design
                            </option>
                        </select>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="student_list.php"
                            class="btn btn-secondary">
                            Cancel
                        </a>
                        
                        <button type="submit"
                            name="update"
                            class="btn btn-primary">
                            Update Student
                        </button>
                    </div>

                </form>

            </div>
        </div>

    </div>

</body>

</html>
