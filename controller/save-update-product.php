<?php
    // var_dump($_POST);die;
    include "../model/connect.php";
    $productName = $_POST["productName"]; 
    $productImage = $_FILES["productImage"]["name"];
    $productPrice = $_POST["productPrice"]; 
    $productDesc = $_POST["productDesc"];
    $categoryid = $_POST["categoryid"];
    $id = $_POST["productId"];
    //print_r($_FILES["productImage"]);die;
    if($_FILES["productImage"]["size"] != "0")
    {
        $query = "UPDATE products SET productName = '$productName', productImage = '$productImage', productPrice = $productPrice, productDesc = '$productDesc', categoryId = $categoryid WHERE id='$id'";
    }
    else
    {
        $query = "UPDATE products SET productName = '$productName', productPrice = $productPrice, productDesc = '$productDesc', categoryId = $categoryid WHERE id='$id'";
    }
    connect($query);
    move_uploaded_file($_FILES["productImage"]["tmp_name"],"../image/".$_FILES["productImage"]["name"]);
    header("location:../sanpham.php");
?>