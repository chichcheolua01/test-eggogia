<?php
    include "../model/connect.php";
    $categoryName = $_POST["categoryName"];
    $query = "INSERT INTO categories (categoryName) VALUES ('$categoryName')";
    connect($query);
    header("Location: ../categories.php");
?>