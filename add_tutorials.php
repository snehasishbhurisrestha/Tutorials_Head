<?php
    include("admin_panel/inc/db.php");
    if(isset($_POST['save'])){
        $tp = $_POST['tp'];
        $des = $_POST['des'];
        $subjectid = $_POST['subjectid'];

        $query = "INSERT INTO tutorials SET tutorials_topic = '$tp',tutorials_description = '$des',subject_id = '$subjectid'";
        $conn->query($query);
        header("location:add_tutorials.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Blank</title>

    <!-- Custom fonts for this template-->
    <link href="admin_panel/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="admin_panel/css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <?php include("admin_panel/inc/side_bar.php"); ?>
        <!-- End of Sidebar -->
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <?php include("admin_panel/inc/top_bar.php"); ?>
                <!-- End of Topbar -->
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800 text-center">Add Tutorials<strong> by Subject</strong></h1>
                    <div class="d-flex justify-content-center">
                    <form action="" method="post" class="col-md-6">
                        <div class="form-group">
                            <select class="form-control" name="subjectid">
                                <option>Choose Subject Name</option>
                                <?php
                                    $q = "SELECT * FROM subject";
                                    $res = $conn->query($q);
                                    while($row=$res->fetch_assoc()){ 
                                ?>
                                <option value="<?php echo $row['subject_id'] ?>"><?php echo $row['subject_name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Enter title" name="tp">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Enter description" name="des">
                        </div>
                        <input type="submit" name="save" class="btn btn-primary btn-block btn-fl mt-3" value="Submit"/>
                    </form>
                    </div>

                    <h1 class="h3 mb-4 mt-5 text-gray-800 text-center">Showing Tutorials<strong> by Subject</strong></h1>
                    <div class="container">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Tutorials Topic</th>
                            <th>Tutorials Description</th>
                            <th>Subject Name</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <?php
                            $q = "SELECT * FROM tutorials";
                            $res = $conn->query($q);
                        ?>
                        <tbody>
                            <?php
                                while($row = $res->fetch_assoc()){
                                    $ids = $row['subject_id'];
                                    $s = "SELECT subject.subject_name FROM subject INNER JOIN tutorials ON subject.subject_id = '$ids'";
                                    $ress = $conn->query($s);
                                    $rows = $ress->fetch_assoc();

                            ?>
                        <tr>
                            <td><?php echo $row['tutorials_topic']; ?></td>
                            <td><?php echo $row['tutorials_description']; ?></td>
                            <td><?php echo $rows['subject_name']; ?></td>
                            <td><a href="update_tuto.php?id=<?php echo $row['tutorials_id']; ?>" class="btn btn-success">Edit</a></td>
                            <td><a onclick="confirm('Are you sure');" href="delete_tuto.php?id=<?php echo $row['tutorials_id']; ?>" class="btn btn-danger">Delete</a></td>
                        </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    <!-- Bootstrap core JavaScript-->
    <script src="admin_panel/vendor/jquery/jquery.min.js"></script>
    <script src="admin_panel/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="admin_panel/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="admin_panel/js/sb-admin-2.min.js"></script>

</body>

</html>