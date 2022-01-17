<?php
    require_once("./header.php");

    if(isset($_POST['submit'])):
        $name = $_POST['st_name'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $faculty = $_POST['faculty'];
        $year = $_POST['year'];
        $semester = $_POST['semester'];
        $class = $_POST['class'];
        $id = $_POST['id'];


        $conn = connect();
        $sql = "UPDATE student SET name='$name', phone=$phone, address='$address', faculty='$faculty', Academic_Year='$year', semester='$semester', class='$class'
                WHERE id = $id";
        $result = mysqli_query($conn, $sql);

        if(!$result) header("Location: update.php?id=$id & error=true");
        if($result) header("Location: view.php?msg=success");
    endif;


    if(isset($_GET['id'])):
        $id = $_GET['id'];
        $conn = connect();

        $sql = "select * from student where id = $id";
        $result = mysqli_query($conn, $sql);

        $row = mysqli_fetch_object($result);
?>
<body>
    <div class="container">
        <form action="update.php" method="post" class="card mt-3">
            <div class="card-header">
                <h3>REGISTER AN STUDENT</h3>
            </div>

            <div class="card-body">
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <div class="form-group mb-3">
                    <input type="text" name="st_name" value="<?php echo $row->name ?>" class="form-control"  placeholder="Student Name">
                </div>

                <div class="form-group mb-3">
                    <input type="number" name="phone" value="<?php echo $row->phone ?>" class="form-control" placeholder="Phone Number">
                </div>

                <div class="form-group mb-3">
                    <input type="text" name="address" value="<?php echo $row->address ?>" class="form-control"  placeholder="Address">
                </div>

                <div class="form-group mb-3">
                    <input type="text" name="faculty" value="<?php echo $row->faculty ?>" class="form-control"  placeholder="Faculty">
                </div>

                <div class="form-group mb-3">
                    <input type="text" name="year" value="<?php echo $row->Academic_Year ?>" class="form-control"  placeholder="Academic Year">
                </div>

                <div class="form-group mb-3">
                    <input type="text" name="semester" value="<?php echo $row->semester ?>" class="form-control"  placeholder="Semester">
                </div>

                <div class="form-group mb-3">
                    <input type="text" name="class" value="<?php echo $row->class ?>" class="form-control"  placeholder="Class">
                </div>
                <input type="submit" value="UPDATE" name="submit" class="btn btn-success">
                <a href="view.php" class="btn btn-primary">VIEW</a>
            </div>
        </form>
    </div>
</body>
</html>

<?php
    endif;
?>