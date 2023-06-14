<?php
    include("admin_panel/inc/db.php");
    if(isset($_POST['search'])){
        $id = $_POST['data'];
        $q = "SELECT * FROM subject WHERE subject_id = '$id'";
        $res = $conn->query($q);
        $sub = $res->fetch_assoc();
    }
?>
<!doctype html>
<html lang="en">
<head>
  	<title>Tutorials Head</title>
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
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About Us</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0" action="" method="post">
                <?php 
                    $q = "SELECT * FROM subject";
                    $res = $conn->query($q);
                ?>
                <select name="data" id="" class="form-control mr-sm-2">
                    <option value="">Search by subject name</option>
                    <?php while($row = $res->fetch_assoc()){ ?>
                        <option value="<?php echo $row['subject_id'] ?>"><?php echo $row['subject_name'] ?></option>
                    <?php } ?>
                </select>
                <button class="btn btn-outline-light my-2 my-sm-0" type="submit" name="search">Search</button>
            </form>
        </div>
    </nav>

	<div class="wrapper d-flex align-items-stretch">
    <?php if(isset($sub)){?>
		<nav id="sidebar">
			<div class="custom-menu">
				<button type="button" id="sidebarCollapse" class="btn btn-primary">
	                <i class="fa fa-bars"></i>
	                <span class="sr-only">Toggle Menu</span>
	            </button>
            </div>
	  		<h1><a href="#" class="logo"><?php echo $sub['subject_name']; ?></a></h1>
            <ul class="list-unstyled components mb-5">
                <?php
                    $q = "SELECT * FROM tutorials WHERE subject_id = '$id'";
                    $ress = $conn->query($q);
                    while($tuto = $ress->fetch_assoc()){
                ?>
                <li class="active">
                    <a href="#"><button style="border: none;background: none;color: white;font-size: 20px;" onclick="get_content('<?php echo $tuto['tutorials_id'] ?>');" ><?php echo $tuto['tutorials_topic']; ?></button></a>
                </li>
                <?php } ?>
            </ul>
            <?php }else{
                $k = "Go to the search bar and choose the subject you want to read and click on search";
                ?>
                <div style="font-size:50px;position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);"><?php echo $k; ?></div>
                <?php
            }
            ?>
    	</nav>

        <!-- Page Content  -->
        
        <div id="content" class="p-4 p-md-5 pt-5"></div>
	</div>
  
    <script src="home_panel/js/jquery.min.js"></script>
    <script src="home_panel/js/popper.js"></script>
    <script src="home_panel/js/bootstrap.min.js"></script>
    <script src="home_panel/js/main.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script>
        function get_content(cid){
            // alert(cid)
            $.ajax({
                url:'contents.php?cid='+cid,
                type:'GET',
                data:{},
                success:function(resp){
                    // alert(resp)
                    $("#content").html(resp)
                }
            })
        }
    </script>
</body>
</html>