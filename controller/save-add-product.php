<?php
    include "../model/connect.php"; //import file connect.php từ thư mục model

    // echo "<pre>";
    //print_r($_FILES);
    // var_dump($_POST);die; //sau khi submit form thêm mới từ trang add-new-product.php, dữ liệu sẽ được lưu trong biến $_POST
    $productName = $_POST["productName"]; //lấy dữ liệu từ $_POST theo key productName và gán cho biến $productName
    $productImage = $_FILES["productImage"]["name"];//lấy dữ liệu từ $_FILES theo key productImage và name rồi gán cho biến $productImage
    $productPrice = $_POST["productPrice"]; //lấy dữ liệu từ $_POST theo key productPrice và gán cho biến $productPrice
    $productDesc = $_POST["productDesc"];//lấy dữ liệu từ $_POST theo key productDesc và gán cho biến $productDesc
    $categoryid = $_POST["categoryid"]; //lấy dữ liệu từ $_POST theo key category và gán cho biến $category
    // if($productName == "" || $_FILES["productImage"]["size"] == "0" || $productPrice == "" || $productDesc == "")
    // {
        
    // }
    $query = "insert into products(productName,productImage,productPrice,productDesc,categoryid) values ('$productName','$productImage',$productPrice,'$productDesc',$categoryid)";
    // $query: câu lệnh truy vấn đến cơ sở dữ liệu và thực hiện thêm mới vào table products
    connect($query); //gọi ra hàm connect từ file connect.php để thực thi

    move_uploaded_file($_FILES["productImage"]["tmp_name"],"../image/".$_FILES["productImage"]["name"]);
    /*
        chuyển file từ thư mục tạm thời vào thư mục image trong Assignment
        $_FILES["productImage"]["tmp_name"]: lấy hình ảnh thông qua key tmp_name
        "../image/".$_FILES["productImage"]["name"]: chuyển hình ảnh vào thư mục image với tên ảnh nằm trong key là name
    */ 
    header("location:../sanpham.php"); //điều hướng về trang admin.php sau khi đã xử lý xong việc thêm mới
?>

