<?PHP
require_once("./header.php");
// make the connection
$conn = connect();

    if(isset($_GET['delete'])):
        $id = $_GET['delete'];

        $sql = "DELETE FROM student WHERE id= $id";
        $result = mysqli_query($conn, $sql);

        if(!$result) header("Location: ./view.php?error=true");
        if($result) header("Location: ./view.php?msg=success");
    endif;
$query = "SELECT * FROM student";
$result = mysqli_query($conn, $query);
?>

<body>
    <div class="container-fluid">
        <a href="create.php" class="btn btn-primary mt-4">CREATE A NEW STUDENT</a>
        <div class="card m-3">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Phone Number</th>
                        <th>Address</th>
                        <th>Faculty</th>
                        <th>Academic Year</th>
                        <th>Semester</th>
                        <th>Class</th>
                        <th>Actions</th>
                        <th>Exams</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                        
                    while ($row = mysqli_fetch_object($result)) : ?>
                        <tr>
                            <td><?php echo $row->id; ?></td>
                            <td><?php echo $row->name; ?></td>
                            <td><?php echo $row->phone; ?></td>
                            <td><?php echo $row->address; ?></td>
                            <td><?php echo $row->faculty; ?></td>
                            <td><?php echo $row->Academic_Year; ?></td>
                            <td><?php echo $row->semester; ?></td>
                            <td><?php echo $row->class; ?></td>
                            <td>
                                <a href="update.php?id=<?php echo $row->id ?>" class="btn btn-success">Update</a>
                                <a href="view.php?delete=<?php echo $row->id ?>" class="btn btn-danger">Delete</a>
                            </td>
                            <td>
                                <a href="exams_create.php?exam=<?php echo $row->id ?>" class="btn btn-primary">Report Exams</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>