<?php
include "connection.php";
session_start();
$email = "";
if(isset($_COOKIE["username"])){
    // $_SESSION["is_login"] = true;
    $email = $_COOKIE["username"];
}
if(isset($_SESSION["is_login"])){
    header("location: index.php");
    exit;
}
if(isset($_POST["submit"])){
    $remember = $_POST["remember"];
    $result = login($_POST);
    if($result !== false){
        if(isset($remember)){
            setcookie('username',$result["email"],time() + 60);
        }
        $_SESSION["is_login"] = true;
        echo "<script>
        alert('Login berhasil');
        document.location.href = 'index.php';
        </script>";
    }else{
        echo "<script>
        alert('Password atau username salah!');
        </script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <div class="container mx-auto flex flex-col items-center justify-center">
        <div class="py-5 text-center"><h1 class="text-3xl text-blue-400 font-bold">Login</h1></div>
        <form action="" method="post">
            <div class="mt-5 flex justify-between items-center w-full gap-5">
                <label for="email">Email</label>
                <input class="text-white bg-blue-400 rounded-lg w-56 px-3 py-1" type="email" id="email" name="email" value="<?= $email ?>">
            </div>
            <div class="mt-5 flex justify-between items-center w-full gap-5">
                <label for="password">Password</label>
                <input class="text-white bg-blue-400 rounded-lg w-56 px-3 py-1" type="Password" id="password" name="password">
            </div>
            <div class="mt-5 flex justify-end items-center w-full gap-1">
                <input class="text-white bg-blue-400" type="checkbox" id="remember" name="remember">
                <label for="remember">Remember me</label>
            </div>
            <div class="mt-5 flex justify-center hover:opacity-70 items-center w-full gap-5">
                <button class="px-4 p-1.5 rounded-xl bg-blue-400 text-white font-semibold" type="submit" name="submit">Submit</button>
            </div>
        </form>
    </div>
</body>
</html>