<?php
    include "./model/connect.php";
    session_start();
    $username = $_SESSION['userName'];
    $query2 = "SELECT * FROM users WHERE userName like '$username'";
    $login_user = getOne($query2);
    if(!$_SESSION['userName'])
    {
        header("Location: login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style> 
        *{
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }
    </style>
    <script src="https://unpkg.com/scrollreveal"></script>
</head>
<body>
    <div class="grid grid-cols-8 relative">
        <div id="manager_menu" class="bg-[#4A4A4A] h-[1363px] absolute duration-500 hidden md:block">
            <div class="h-[90px] flex justify-center items-center">
                <img class="hidden lg:block" src="image/dashboard-logo.png" alt="">
                <button id="manager_button" class="lg:hidden text-white duration-500">
                    <svg  xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
            <div class="py-8 px-[18px] flex flex-col space-y-4">
                <a href="index.php"><button class="p-[12.5px] flex items-center justify-center lg:justify-start lg:space-x-[10.5px] bg-white w-full rounded-lg iii"> <img src="image/dashboard-button.png" alt=""> <p class="hidden lg:block ">Trang chủ</p> </button></a>  
                <a href="admin.php"><button class="p-[12.5px] flex items-center justify-center lg:justify-start lg:space-x-[10.5px] bg-white w-full rounded-lg iii"> <img src="image/dashboard-button.png" alt=""> <p class="hidden lg:block ">Dashboard</p> </button></a>  
                <a href="sanpham.php"><button class="p-[12.5px] flex items-center justify-center lg:justify-start lg:space-x-[10.5px] bg-white w-full rounded-lg iii"> <img src="image/product-manager.png" alt=""> <p class="hidden lg:block">Quản lý sản phẩm</p> </button></a>    
                <a href="users.php"><button class="p-[12.5px] flex items-center justify-center lg:justify-start lg:space-x-[10.5px] bg-white w-full rounded-lg iii" > <img src="image/product-manager.png" alt=""> <p class="hidden lg:block">Quản lý user</p> </button></a>  
                <a href="categories.php"><button class="p-[12.5px] flex items-center justify-center lg:justify-start lg:space-x-[10.5px] bg-white w-full rounded-lg iii"> <img src="image/category-manager.png" alt=""> <p class="hidden lg:block">Quản lý danh mục</p> </button></a>  
                <a href="product-manager.php"><button class="p-[12.5px] flex items-center justify-center lg:justify-start lg:space-x-[10.5px] bg-white w-full rounded-lg iii"> <img src="image/thong-ke.png" alt=""> <p class="hidden lg:block">Thống kê</p> </button></a>  
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
                <div class="flex justify-end items-center space-x-10">
                    <img src="image/notification.png" alt="">
                    <div class="flex items-center ml-5 mr-4 space-x-1">
                        <p class="text-gray-400">Xin chào,</p>
                        <p class="text-blue-400"> <?php echo $login_user["userFullName"]?> </p>
                    </div>
                    <img class="w-[50px] h-[50px] rounded-lg" src="./image/<?php echo $login_user["userAvatar"]?>" alt="">
                    <a href="./controller/logout.php"> <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg> </a>
                </div>
            </div>
            <hr>
            <div class="p-[36px]">
                <div class="relative">
                    <img class="w-full" src="image/dashboard-banner.png" alt="">
                    <div class="absolute inset-x-0 top-1/2 flex justify-center"><h1 class="sm:text-xl md:text-2xl lg:text-4xl duration-500 text-white font-bold">Welcome to Dashboard</h1></div>
                </div>
            </div>
        </div>
    </div>  
    
    <script src="main.js"></script>
</body>
</html>