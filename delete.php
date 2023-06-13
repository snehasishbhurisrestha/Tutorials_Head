<?php
    include("admin_panel/inc/db.php");
    $id = $_GET['id'];
    $q = "DELETE FROM subject WHERE subject_id = '$id'";
    $conn->query($q);
    header("location:add_subject.php");
?>