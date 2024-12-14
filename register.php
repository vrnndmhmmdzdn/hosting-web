<?php
include "connection.php";
session_start();
if(isset($_POST["submit"])){
    if(register($_POST) > 0){
        echo "<script>
        alert('Register berhasil');
        document.location.href = 'index.php';
        </script>";
        $_SESSION["is_login"] = true;
    }else{
        echo "<script>
        alert('Register gagal');
        </script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <div class="container mx-auto flex flex-col items-center justify-center">
        <div class="py-5 text-center"><h1 class="text-3xl text-blue-400 font-bold">Register</h1></div>
        <form action="" method="post">
            <div class="mt-5 flex justify-between items-center w-full gap-5">
                <label for="username">Username</label>
                <input class="text-white bg-blue-400 rounded-lg w-56 px-3 py-1" type="text" id="username" name="username">
            </div>
            <div class="mt-5 flex justify-between items-center w-full gap-5">
                <label for="email">Email</label>
                <input class="text-white bg-blue-400 rounded-lg w-56 px-3 py-1" type="email" id="email" name="email">
            </div>
            <div class="mt-5 flex justify-between items-center w-full gap-5">
                <label for="password">Password</label>
                <input class="text-white bg-blue-400 rounded-lg w-56 px-3 py-1" type="Password" id="password" name="password">
            </div>
            <div class="mt-5 flex justify-between items-center w-full gap-5">
                <label for="confirm">Confirm</label>
                <input class="text-white bg-blue-400 rounded-lg w-56 px-3 py-1" type="password" id="confirm" name="confirm">
            </div>
            <div class="mt-5 flex justify-center hover:opacity-70 items-center w-full gap-5">
                <button class="px-4 p-1.5 rounded-xl bg-blue-400 text-white font-semibold" type="submit" name="submit">Submit</button>
            </div>
        </form>
    </div>
</body>
</html>