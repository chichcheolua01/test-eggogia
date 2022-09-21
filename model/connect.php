<?php
    // hàm kết nối tới database và thực thi 
    function connect($query){
        $connection = new PDO("mysql:host=localhost;dbname=assignment;charset=utf8","root","");
        $stmt = $connection -> prepare($query);
        $stmt -> execute();
        return $stmt; //trả về giá trị cho hàm để tiếp tục thực hiện ở các hàm khác
    }

    // hàm lấy ra tất cả các dữ liệu
    function getAll($query){
        $result = connect($query) -> fetchAll(); //gọi ra hàm connect đã khai báo bên trên để thực thi, sau đó gọi ra phương thức fetchAll() để lấy ra toàn bộ dữ liệu
        return $result; //trả về dữ liệu cho hàm 
    }

    // hàm lấy ra 1 dữ liệu
    function getOne($query){
        $result = connect($query) -> fetch(); ////gọi ra hàm connect đã khai báo bên trên để thực thi, sau đó gọi ra phương thức fetchAll() để lấy ra 1 dữ liệu nhất định
        return $result; //trả về dữ liệu cho hàm 
    }
?>