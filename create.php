<?php
    require_once ("./header.php");

    if(isset($_POST) && !empty ($_POST)):
        $conn = connect();

        $name = $_POST['st_name'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $faculty = $_POST['faculty'];
        $year = $_POST['year'];
        $semester = $_POST['semester'];
        $class = $_POST['class'];

        $sql = "INSERT INTO student (name, phone, address, faculty, Academic_Year, semester, class)
                VALUES ('$name', $phone, '$address', '$faculty', '$year', '$semester', '$class')";
        $result = mysqli_query($conn, $sql);

        if(!$result) die ("database insertion failed" . mysqli_error($conn));
        header("location: create.php?msg=successful");
    endif;
?>
<body>
    <div class="container">
        <form action="create.php" method="post" class="card mt-3">
            <div class="card-header">
                <h3>REGISTER AN STUDENT</h3>
            </div>

            <div class="card-body">
                <div class="form-group mb-3">
                    <input type="text" name="st_name" class="form-control"  placeholder="Student Name">
                </div>

                <div class="form-group mb-3">
                    <input type="number" name="phone" class="form-control" placeholder="Phone Number">
                </div>

                <div class="form-group mb-3">
                    <input type="text" name="address" class="form-control"  placeholder="Address">
                </div>

                <div class="form-group mb-3">
                    <input type="text" name="faculty" class="form-control"  placeholder="Faculty">
                </div>

                <div class="form-group mb-3">
                    <input type="text" name="year" class="form-control"  placeholder="Academic Year">
                </div>

                <div class="form-group mb-3">
                    <input type="text" name="semester" class="form-control"  placeholder="Semester">
                </div>

                <div class="form-group mb-3">
                    <input type="text" name="class" class="form-control"  placeholder="Class">
                </div>
                <button type="submit" class="btn btn-primary">CREATE</button>
                <a href="view.php" class="btn btn-success">VIEW</a>
            </div>
        </form>
    </div>
</body>
</html>