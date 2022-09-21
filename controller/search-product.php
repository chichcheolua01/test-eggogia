<?php
    include "../model/connect.php";
    $search = $_GET["search"];
    $query = "SELECT * FROM products";
    $search_query = "SELECT * FROM products WHERE productName LIKE '%$search%' or productPrice LIKE '%$search%' or productDesc LIKE '%$search%' or id LIKE '%$search%'";
    if(isset($_GET["search"])) {  
        $products = getAll($search_query);
    }
    else{
       $products = getAll($query);
    }
    var_dump($products);
    header("Location: ../sanpham.php");
?>