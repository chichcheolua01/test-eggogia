<?php
    // var_dump($_POST);die;
    include "../model/connect.php";
    $userName = $_POST["userName"];
    $userPassword = $_POST["userPassword"];
    $userFullName = $_POST["userFullName"];
    $userGender = $_POST["userGender"];
    $userId = $_POST["userId"];
    $userAvatar = $_FILES["userAvatar"]["name"];
    if($_FILES["userAvatar"]["size"] != "0")
    {
        $query = "UPDATE users SET userName = '$userName', userPassword = '$userPassword', userFullName = '$userFullName', userGender = '$userGender', userAvatar = '$userAvatar', id = $userId WHERE id='$userId'";
    }
    else
    {
        $query = "UPDATE users SET userName = '$userName', userPassword = '$userPassword', userFullName = '$userFullName', userGender = '$userGender', id = $userId WHERE id='$userId'";
    }
    connect($query);
    move_uploaded_file($_FILES["userAvatar"]["tmp_name"],"../image/".$_FILES["userAvatar"]["name"]);
    header("location:../users.php");
?>