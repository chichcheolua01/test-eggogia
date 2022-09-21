<?php
    include "../model/connect.php";
    session_start();
    $id = $_GET["id"];
    $query2 = "SELECT * FROM users where id = $id";
    $item = getOne($query2);
    $username = $_SESSION['userName'];
    $query3 = "SELECT * FROM users WHERE userName like '$username'";
    $login_user = getOne($query3);
    // if(!isset($username)){
    //     header("Location: login.php");
    // }
    // else
    // {
    //     header("Location: admin.php");
    // }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        function chooseFile(fileInput) {
            if (fileInput.files && fileInput.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#image').attr('src', e.target.result);
                }
                reader.readAsDataURL(fileInput.files[0]);
            }
        }
    </script>
</head>

<body>
    <div class="grid grid-cols-8 relative">
        <div id="manager_menu" class="bg-[#4A4A4A] h-[1363px] absolute duration-500 hidden md:block">
            <div class="h-[90px] flex justify-center items-center">
                <img class="hidden lg:block" src="../image/dashboard-logo.png" alt="">
                <button id="manager_button" class="lg:hidden text-white duration-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
            <div class="py-8 px-[18px] flex flex-col space-y-4">
                <a href="../admin.php"><button class="p-[12.5px] flex items-center justify-center lg:justify-start lg:space-x-[10.5px] bg-white w-full rounded-lg iii"> <img src="../image/dashboard-button.png" alt="">
                        <p class="hidden lg:block ">Dashboard</p>
                    </button></a>
                <a href="../sanpham.php"><button class="p-[12.5px] flex items-center justify-center lg:justify-start lg:space-x-[10.5px] bg-white w-full rounded-lg iii"> <img src="../image/product-manager.png" alt="">
                        <p class="hidden lg:block">Quản lý sản phẩm</p>
                    </button></a>
                <a href="../users.php"><button class="p-[12.5px] flex items-center justify-center lg:justify-start lg:space-x-[10.5px] bg-white w-full rounded-lg iii"> <img src="../image/product-manager.png" alt="">
                        <p class="hidden lg:block">Quản lý user</p>
                    </button></a>
                <a href="../categories.php"><button class="p-[12.5px] flex items-center justify-center lg:justify-start lg:space-x-[10.5px] bg-white w-full rounded-lg iii"> <img src="../image/category-manager.png" alt="">
                        <p class="hidden lg:block">Quản lý danh mục</p>
                    </button></a>
                <a href="product-manager.php"><button class="p-[12.5px] flex items-center justify-center lg:justify-start lg:space-x-[10.5px] bg-white w-full rounded-lg iii"> <img src="../image/thong-ke.png" alt="">
                        <p class="hidden lg:block">Thống kê</p>
                    </button></a>
            </div>
        </div>
        <div id="manager_menu" class="h-[1363px] max-w-full absolute">
            <div class="h-[90px] flex justify-center items-center">
                <button id="manager_button2" class="hidden p-7">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
        <div class="col-span-8 md:pl-[101px] lg:pl-[218.95px]">
            <div class="h-[90px] p-5">
                <div class="flex justify-end items-center">
                    <img src="image/notification.png" alt="">
                    <div class="flex items-center ml-5 mr-4 space-x-1">
                        <p class="text-gray-400">Xin chào,</p>

                        <p class="text-blue-400"> <?php echo $login_user['userFullName'];?></p>
                    </div>
                    <img class="w-[50px] h-[50px] rounded-lg" src="../image/<?php echo $login_user['userAvatar']?>" alt="">
                </div>
            </div>
            <hr>
            <div class="p-[36px] flex justify-center">
                <div class="flex flex-col w-2/3">
                    <h1 class="text-center text-4xl pb-5">Cập nhật sản phẩm</h1>

                    <form class="flex flex-col justify-center items-center space-y-4" action="../controller/save-update-user.php" method="POST" enctype="multipart/form-data">
                        <input type="text" name="userId" value="<?php echo $item["id"] ?>" hidden>
                        <div class="mt-[32.5px] w-full space-y-2">
                            <p class="py-2">Usersname</p>
                            <input class="border border-gray-300 px-[12px] py-[6px] w-full rounded-md" type="text" name="userName" placeholder="Nhập tên sản phẩm" value="<?php echo $item["userName"] ?>">
                        </div>
                        <div class="mt-[32.5px] w-full space-y-2">
                            <p class="py-2">Password</p>
                            <input class="border border-gray-300 px-[12px] py-[6px] w-full rounded-md" type="text" name="userPassword" placeholder="Nhập giá sản phẩm" value="<?php echo $item["userPassword"] ?>">
                        </div>
                        <div class="mt-[32.5px] w-full space-y-2">
                            <p class="py-2">User Fullname</p>
                            <input class="border border-gray-300 px-[12px] py-[6px] w-full rounded-md" type="text" name="userFullName" placeholder="Nhập tên sản phẩm" value="<?php echo $item["userFullName"] ?>">
                        </div>
                        <div class="mt-[32.5px] w-full space-y-2">
                            <p class="py-2">Ảnh sản phẩm</p>
                            <div class="space-y-8">
                                <img src="" alt="" id="image" class="w-[200px] h-auto">
                                <input id="imageFile" class="" type="file" name="userAvatar" onchange="chooseFile(this)">
                            </div>
                        </div>
                        <div class="flex justify-center pt-5"><button class="bg-[#1E74A4] text-white rounded p-[10px] " type="submit">Update User</button></div>
                    </form>
                </div>
            </div>
        </div>
</body>

</html>