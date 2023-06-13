<?php
    include("admin_panel/inc/db.php");
    $id = $_GET['id'];
    $q = "DELETE FROM tutorials WHERE tutorials_id = '$id'";
    $conn->query($q);
    header("location:add_tutorials.php");
?>