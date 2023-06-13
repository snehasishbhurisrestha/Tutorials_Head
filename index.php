<?php
    include("admin_panel/inc/db.php");
    if(isset($_POST['search'])){
        $d = $_POST['data'];
        $q = "SELECT * FROM subject WHERE subject_name = '$d'";
        $res = $conn->query($q);
        $sub = $res->fetch_assoc();
        $id = $sub['subject_id'];
    }
?>
<!doctype html>
<html lang="en">
<head>
  	<title>Sidebar 04</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="home_panel/css/style.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#"><strong style="color:#40a944">Tutorials</strong> Head</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                        Dropdown
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled">Disabled</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0" action="" method="post">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="data">
                <button class="btn btn-outline-light my-2 my-sm-0" type="submit" name="search">Search</button>
            </form>
        </div>
    </nav>

    <?php
            if(isset($_POST['d'])){
                $d = $_POST['val'];
                $q = "SELECT * FROM tutorials WHERE tutorials_id = '$d'";
                $ressl = $conn->query($q);
                $des = $ressl->fetch_assoc();
            }
    ?>
	<div class="wrapper d-flex align-items-stretch">
		<nav id="sidebar">
			<div class="custom-menu">
				<button type="button" id="sidebarCollapse" class="btn btn-primary">
	                <i class="fa fa-bars"></i>
	                <span class="sr-only">Toggle Menu</span>
	            </button>
            </div>
            <?php if(isset($sub)){?>
	  		<h1><a href="#" class="logo"><?php echo $sub['subject_name']; ?></a></h1>
            <ul class="list-unstyled components mb-5">
                <?php
                    //if(isset($sub)){
                    $q = "SELECT * FROM tutorials WHERE subject_id = '$id'";
                    $ress = $conn->query($q);
                    while($tuto = $ress->fetch_assoc()){
                ?>
                <li class="active">
                    <a href="#">
                        <form action="" method="post">
                            <input type="hidden" name="val" value="<?php echo $tuto['tutorials_id']; ?>"/>
                            <input type="submit" value="<?php echo $tuto['tutorials_topic']; ?>" style="border: none;background: none;color: white;font-size: 20px;" name="d"/>
                        </form>
                    </a>
                </li>
                <?php }//} ?>
            </ul>
            <?php } ?>
    	</nav>

        <!-- Page Content  -->
        
        <div id="content" class="p-4 p-md-5 pt-5">
        <?php
            if(isset($des)){
        ?>
            <h2 class="mb-4"><?php echo $des['tutorials_topic']; ?></h2>
            <p><?php echo $des['tutorials_description']; ?></p>
            <?php } ?>
        </div>
	</div>

    <script src="home_panel/js/jquery.min.js"></script>
    <script src="home_panel/js/popper.js"></script>
    <script src="home_panel/js/bootstrap.min.js"></script>
    <script src="home_panel/js/main.js"></script>
</body>
</html>