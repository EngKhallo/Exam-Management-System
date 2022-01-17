<?php
require_once("./header.php");

if (isset($_POST) && !empty($_POST)) :
    // create a connection
    $conn = connect();

    $Place = $_POST['Place'];
    $java = $_POST['Java'];
    $php = $_POST['php'];
    $ccna = $_POST['networking'];
    $security = $_POST['security'];
    $ASP = $_POST['ASP'];
    $sad = $_POST['sad'];
    $id = $_POST['id'];

    // creation query
    $sql = "INSERT INTO st_exams (id,place, java, php, ccna, security, asp, sad)
            values('$id','$Place', '$java', '$php', '$ccna', '$security', '$ASP', '$sad')";
    $result = mysqli_query($conn, $sql);

    if (!$result)  die("Database insertion failed" . mysqli_error($conn));
    if($result)    header("Location: exams_create.php?msg=success");
endif;

if (isset($_GET['exam'])) :
    $id = $_GET['exam'];
    $conn = connect();

    $query = "select id from st_exams where id=$id";
    $result = mysqli_query($conn, $query);

    $row = mysqli_fetch_object($result);

?>

    <body>
        <div class="container">
            <form action="exams_create.php" method="post" class="card mt-3">
                <div class="card-header">
                    <h3>Peform Student Exams</h3>
                </div>

                <div class="card-body">
                    <input type="hidden" name="id" value="<?php echo $id ?>">
                    <div class="form-group mb-3">
                        <input type="text" name="Place" class="form-control" placeholder="Place of Entrance">
                    </div>

                    <div class="form-group mb-3">
                        <input type="text" name="Java" class="form-control" placeholder="Introduction to java">
                    </div>

                    <div class="form-group mb-3">
                        <input type="text" name="php" class="form-control" placeholder="php and Mysql">
                    </div>

                    <div class="form-group mb-3">
                        <input type="text" name="networking" class="form-control" placeholder="CCNA Routing and Switching">
                    </div>

                    <div class="form-group mb-3">
                        <input type="text" name="security" class="form-control" placeholder="CyberSecurity">
                    </div>

                    <div class="form-group mb-3">
                        <input type="text" name="ASP" class="form-control" placeholder="ASP.Net">
                    </div>

                    <div class="form-group mb-3">
                        <input type="text" name="sad" class="form-control" placeholder="System Analysis and Design">
                    </div>

                    <button type="submit" class="btn btn-primary">CREATE</button>
                    <a href="view_exams.php" class="btn btn-success">VIEW</a>
                </div>
            </form>
        </div>
    </body>

<?php
endif;
?>