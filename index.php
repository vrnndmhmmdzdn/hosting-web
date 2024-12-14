<?php
require "connection.php";
session_start();
$students = getTabel("students");
if (!isset($_SESSION["is_login"])) {
    echo "<script>
        alert('Anda belum login');
        document.location.href = 'login.php';
        </script>";
}
if (isset($_POST["logout"])) {
    session_destroy();
    session_unset();
    header("location: login.php");
}
if (isset($_POST["button"])) {
    $keyword = $_POST["search"];
    $students = search($keyword);
};
// $rombles = getData("SELECT * FROM rombles");
// var_dump($students);

// $done = mysqli_affected_rows($connection);
// echo "$done";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="script/query.js"></script>
    <title>Document</title>
    <!-- <link rel="stylesheet" href="../src/output.css"> -->
</head>

<body>
    <nav class="w-full h-14 flex items-center bg-blue-400 justify-center">
        <form action="" method="post" class="space-x-1 mt-3 relative">
            <div class="relative overflow-hidden">
                <input id="search" type="text" name="search" class="px-4 py-1 w-72 bg-white text-gray-500 rounded-md border border-gray-500" placeholder="Search">
                <button id="button" type="submit" name="button" class="bg-[#238636] hover:opacity-70 h-fit py-1 px-3 rounded-md text-white hidden">Search</button>
                <img id="loader" src="img/loader.gif" class="absolute top-0.5 right-1 w-10 object-cover">
            </div>
        </form>
    </nav>
    <section class="w-full bg-[#EAEAEA] py-20">
        <div class="w-fit mx-auto flex flex-col justify-center items-end">
            <div class="py-5 w-full text-center">
                <h1>Selamat Datang</h1>
            </div>
            <div class="print:hidden flex flex-row justify-between w-full">
                <form action="" method="post">
                    <button onclick="return confirm('beneran?')" name="logout" class="py-2 px-4 bg-blue-400 text-center rounded-lg hover:opacity-70">Log out</button>
                </form>
                <a href="create.php" class="py-2 px-4 h-fit bg-blue-400 text-center rounded-lg hover:opacity-70">+ Add New</a>
                <a href="print/student.php" target="_blank" class="py-2 px-4 h-fit bg-blue-400 text-center rounded-lg hover:opacity-70">Print</a>
            </div>
            <div id="content">
                <table cellpadding="20" cellspacing="5" border="1" class="bg-white border text-center">
                    <tr class="bg-blue-400 rounded-t-lg">
                        <!-- th = table head -->
                        <th>No</th>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Age</th>
                        <th>Image</th>
                        <th>NIS</th>
                        <th>NIK</th>
                        <th>Class</th>
                        <th>Addrress</th>
                        <th class="print:hidden">Action</th>
                    </tr>
                    <?php $no = 1; ?>
                    <?php foreach ($students as $student) : ?>
                        <tr class="border-b-[1px]">
                            <!-- td = table data -->
                            <td><?= $no ?></td>
                            <td><?= $student['name'] ?></td>
                            <td><?= $student['gender'] ?></td>
                            <td><?= $student['age'] ?></td>
                            <td><img src="img/<?= $student['image'] ?>" width="50px"></td>
                            <td><?= $student['nis'] ?></td>
                            <td><?= $student['nik'] ?></td>
                            <td><?= $student['class'] ?></td>
                            <td><?= $student['address'] ?></td>
                            <td class="print:hidden"><a href="edit.php?id=<?= $student["id"] ?>" class="p-2 rounded-md hover:opacity-70 bg-green-400"><i class="ph ph-pencil"></i></a> | <a href="delete.php?id=<?= $student["id"] ?>" onclick="return confirm('Apa Kamu Ingin Menghapus?')" class="p-2 rounded-md hover:opacity-70 bg-red-400"><i class="ph ph-trash"></i></a></td>
                        </tr>
                        <?php $no++; ?>
                    <?php endforeach ?>
                </table>
            </div>
        </div>
    </section>

    <script src="script/script.js"></script>
</body>

</html>