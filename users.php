<?php
    include "./model/connect.php";
    $query = "SELECT * FROM users";
    
    if(isset($_GET["search"])) {  
        $search = $_GET["search"];
        $search_query = "SELECT * FROM users WHERE userName LIKE '%$search%' or userPassword LIKE '%$search%' or userFullName LIKE '%$search%' or userGender LIKE '%$search%' or id LIKE '%$search%'";
        $users = getAll($search_query);
    }
    else{
        $users = getAll($query);
    }
    session_start();
    $username = $_SESSION['userName'];
    $query2 = "SELECT * FROM users WHERE userName like '$username'";
    $login_user = getOne($query2);
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
                    <div class="absolute inset-x-0 top-1/2 flex justify-center"><h1 class="sm:text-xl md:text-2xl lg:text-4xl duration-500 text-white font-bold">Quản lý Users</h1></div>
                </div>
            </div>
            <div class="p-[36px] flex justify-between items-center">
                <div>
                    <h2 class="text-2xl font-bold">Danh sách Users</h2>
                </div>
                <div class="flex justify-between items-center">
                    <form action="" method="GET">
                        <div class="flex justify-between items-center space-x-[10px]">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                            <input class="w-[200px] outline-none" type="text" placeholder="Search" name="search">
                        </div>
                    </form>
                    
                    <div>
                        <a href="signup.php"><button class="rounded-xl p-[10px] bg-[#38A169] text-white">Add New User</button></a> 
                    </div>
                </div>
                
            </div>
            <div class="p-[36px]">
                <table class="w-full">
                    <thead>
                        <tr class="text-white grid grid-cols-6">
                            <th class="bg-[#5B5B5B] px-[10px] py-[12px] border border-gray-800 justify-start flex">#</th>
                            <th class="bg-[#5B5B5B] px-[10px] py-[12px] border border-gray-800 justify-start flex">Usersname</th>
                            <th class="bg-[#5B5B5B] px-[10px] py-[12px] border border-gray-800 justify-start flex">Password</th>
                            <th class="bg-[#5B5B5B] px-[10px] py-[12px] border border-gray-800 justify-start flex">User Fullname</th>
                            <th class="bg-[#5B5B5B] px-[10px] py-[12px] border border-gray-800 justify-start flex">Avatar</th>
                            <th class="bg-[#5B5B5B] px-[10px] py-[12px] border border-gray-800 justify-start flex">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="grid grid-cols-6">
                            <?php foreach($users as $key => $value): ?>
                                <td class="px-[12.5px] py-[22px]"> <?php echo $key+1; ?></td>
                                <td class="px-[12.5px] py-[22px]"> <?php echo $value["userName"]; ?></td>
                                <td class="px-[12.5px] py-[22px]"> <?php echo $value["userPassword"]; ?></td>
                                <td class="px-[12.5px] py-[22px]"> <?php echo $value["userFullName"]; ?></td>
                                <td  class="px-[12.5px] py-[22px] w-[50px] h-[50px] rounded-lg"> <img src="./image/<?php echo $value["userAvatar"]; ?>" alt=""></td>
                                <td class="px-[12.5px] py-[22px] flex justify-center">
                                    <div class="flex-col lg:flex-row flex space-y-3 lg:space-y-0 lg:space-x-3">
                                        <a href="./view/update-user.php?id=<?php echo $value["id"]?>"><button class="px-[20px] py-[10px] bg-[#1E74A4] text-white rounded-lg">Update</button></a>    
                                        <a href="./controller/delete-user.php?id=<?php echo $value["id"]?>"><button id="delete_user" onclick="return confirm('Are you sure you want to delete this user?')" class="px-[20px] w-full py-[10px] bg-[#AC3131] text-white rounded-lg">Delete</button></a>    
                                    </div>
                                </td>
                            <?php endforeach ?>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>  
    
    <script src="./javascript/main.js"></script>
</body>
</html>