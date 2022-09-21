<?php
    // var_dump($_POST);die;
    include "../model/connect.php";
    $categoryName = $_POST["categoryName"];
    $categoryId = $_POST["categoryId"];
    $query = "UPDATE categories SET categoryName = '$categoryName', id = $categoryId WHERE id='$categoryId'";
    connect($query);
    header("location:../categories.php");
?>