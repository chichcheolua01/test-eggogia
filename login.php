<?php
include "./model/connect.php";
$query = "select * from users";
$users = getAll($query);
?>
<?php
session_start(); //bắt đầu session
$login_alert = "";
foreach ($users as $value) {
    if (isset($_POST['submit'])) {
        $userName = $_POST['userName'];
        $userPassword = $_POST['userPassword'];
        if ($userName == $value['userName'] && $userPassword == $value['userPassword']) {
            $_SESSION['userName'] = $userName;
            header('Location: index.php');
        } else {
            $login_alert = "Incorrect username or password";
        }
    }
}
if (isset($_SESSION["userName"])) {
    $username = $_SESSION['userName'];
    $query2 = "SELECT * FROM users WHERE userName like '$username'";
    $login_user = getOne($query2);
    $location = "admin.php";
} else {
    $login_user["userAvatar"] = "sample.png";
    $location = "index.php";
}
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
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="container mx-auto">
        <header class="py-[60px] flex justify-between items-center">
            <div class="flex justify-center items-center">
                <img class="h-[60px] w-auto" src="image/nike-logo.png" alt="">
            </div>
            <div class="flex justify-between items-center space-x-[100px]">
                <ul class="md:flex justify-between space-x-[52px] hidden">
                    <a href="index.php">
                        <li class="text-sm hover:-translate-y-1 duration-500">Home</li>
                    </a>
                    <a href="">
                        <li class="text-sm hover:-translate-y-1 duration-500">Store</li>
                    </a>
                    <a href="">
                        <li class="text-sm hover:-translate-y-1 duration-500">About</li>
                    </a>
                    <a href="">
                        <li class="text-sm hover:-translate-y-1 duration-500">Blog</li>
                    </a>
                    <a href="">
                        <li class="text-sm hover:-translate-y-1 duration-500">Point of Sale</li>
                    </a>
                </ul>
                <div name="avatar" id="avatar" class="">
                    <div class="flex space-x-10 justify-center items-center">
                        <a href="<?php echo $location; ?>"><img class="w-[50px] h-[50px] rounded-lg" src="./image/<?php echo $login_user["userAvatar"] ?>" alt=""></a>
                    </div>
                </div>
            </div>
        </header>
        <div class="flex justify-center">
            <div class="flex flex-col items-center space-y-10">
                <div>
                    <img class="h-10 w-auto" src="./image/nike-logo.png" alt="">
                </div>
                <div class="flex flex-col items-center">
                    <h3 class="text-2xl font-extrabold">YOUR ACCOUNT FOR </h3>
                    <h3 class="text-2xl font-extrabold">EVERYTHING NIKE</h3>
                </div>
                <p class="text-sm text-rose-900" id="login_alert"> <?php echo $login_alert; ?></p>
                <form action="" method="POST">
                    <div class="flex flex-col space-y-10">
                        <div class="flex flex-col space-y-2">
                            <input require class="border border-gray-300 p-2 text-sm w-[300px] outline-none" type="text" name="userName" placeholder="Username">
                            <input require class="border border-gray-300 p-2 text-sm w-[300px] outline-none" type="password" name="userPassword" placeholder="Password">
                        </div>
                        <button class="p-2 bg-black w-[300px]" type="submit" name="submit">
                            <p class="text-nm text-white font-extrabold">SIGN IN</p>
                        </button>
                        <p class="text-sm text-gray-500">Not a member? <a href="signup.php" class="text-black underline">Join us</a> </p>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <footer class="bg-slate-900 text-white w-full py-20 mt-32">
        <div class="grid grid-cols-2 container mx-auto">
            <div class="flex justify-between">
                <div class="grid grid-cols-3 space-x-32">
                    <div>
                        <p class="text-lg font-bold">FIND A STORE</p>
                        <p class="text-lg font-bold">BECOME A MEMBER</p>
                        <p class="text-lg font-bold">SIGN UP FOR EMAIL</p>
                        <p class="text-lg font-bold">SEND US FEED BACK</p>
                    </div>
                    <div>
                        <p class="text-lg font-bold">GET HELP</p>
                        <p class="text-xs text-gray-500 hover:text-white">Order Status</p>
                        <p class="text-xs text-gray-500 hover:text-white">Delivery</p>
                        <p class="text-xs text-gray-500 hover:text-white">Returns</p>
                        <p class="text-xs text-gray-500 hover:text-white">Payment Option</p>
                        <p class="text-xs text-gray-500 hover:text-white">Contact Us</p>
                    </div>
                    <div>
                        <p class="text-lg font-bold">ABOUT NIKE</p>
                        <p class="text-xs text-gray-500 hover:text-white">News</p>
                        <p class="text-xs text-gray-500 hover:text-white">Careers</p>
                        <p class="text-xs text-gray-500 hover:text-white">Investors</p>
                        <p class="text-xs text-gray-500 hover:text-white">Sustainability</p>
                    </div>
                </div>
            </div>
            <div>

            </div>
        </div>

    </footer>
    <script src="./javascript/main.js"></script>
</body>

</html>