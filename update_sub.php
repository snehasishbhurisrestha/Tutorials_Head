<?php
    include("admin_panel/inc/db.php");
    $id = $_GET['id'];
    if(isset($_POST['save'])){
        $subject_name = $_POST['subjectname'];
        $query = "UPDATE subject SET subject_name = '$subject_name' WHERE subject_id = '$id'";
        $conn->query($query);
        header("location:add_subject.php");
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

    <title>Update</title>

    <!-- Custom fonts for this template-->
    <link href="admin_panel/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="admin_panel/css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <!-- Begin Page Content -->
                <div class="container-fluid" style="padding-top:120px;">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800 text-center">Update <strong> Subject</strong></h1>
                    <div class="d-flex justify-content-center">
                    <?php
                        $q = "SELECT * FROM subject WHERE subject_id = '$id'";
                        $res = $conn->query($q);
                        $row = $res->fetch_assoc();
                    ?>
                        <form action="" method="post" class="col-md-4">
                            <div class="form-group">
                                <input type="text" class="form-control" value="<?php echo $row['subject_name']; ?>" placeholder="Enter subject name" name="subjectname">
                            </div>
                            <input type="submit" name="save" class="btn btn-primary btn-block btn-fl mt-3" value="Submit"/>
                        </form>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Bootstrap core JavaScript-->
    <script src="admin_panel/vendor/jquery/jquery.min.js"></script>
    <script src="admin_panel/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="admin_panel/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="admin_panel/js/sb-admin-2.min.js"></script>

</body>
</html>