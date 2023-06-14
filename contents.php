<?php
    include("admin_panel/inc/db.php");
    $id = $_GET['cid'];
    $q = "SELECT * FROM tutorials WHERE tutorials_id = '$id'";
    $res = $conn->query($q);
    $row = $res->fetch_assoc();
?>

<?php echo $row['tutorials_description']; ?>
