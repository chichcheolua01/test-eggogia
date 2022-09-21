<?php
    include "../model/connect.php";
    $id = $_GET["id"];
    $query_update = "UPDATE products SET categoryId = 4 where categoryId = $id";
    connect($query_update);
    $query = "DELETE FROM categories where id = $id";
    connect($query);
    header("Location: ../categories.php");
?>