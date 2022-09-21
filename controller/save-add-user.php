<?php
    include "../model/connect.php";
    $userName = $_POST['userName'];
    $userPassword = $_POST['userPassword'];
    $userRePassword = $_POST['userRePassword'];
    $userAvatar = $_FILES['userAvatar']['name'];
    $userFullName = $_POST['userFullName'];
    $userGender = $_POST['userGender'];
    $query_data = "SELECT * FROM users";
    $users = getAll($query_data);
    foreach ($users as $value){
        if($value['userName'] == $userName){
            header ("Location: ../signup.php?error=1");
            return false;
        }
        elseif($userName == "" || $userPassword == "" || $userFullName == "" || $userPassword != $userRePassword || $_FILES["userAvatar"]["size"] == "0"){
            header ("Location: ../signup.php?error=1");
            return false;
        }
        else {
            $query = "INSERT INTO users (userName, userPassword, userFullName, userGender, userAvatar) VALUES ('$userName', '$userPassword', '$userFullName','$userGender', '$userAvatar')";
        }
    }
    connect($query);
    move_uploaded_file($_FILES['userAvatar']['tmp_name'],"../image/".$_FILES['userAvatar']['name']);
    header ("Location: ../login.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<script src="../javascript/main.js"></script>
</body>
</html>