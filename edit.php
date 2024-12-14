<?php
include "connection.php";
$id = $_GET["id"];      
$students = getTabel("students WHERE id = $id");

if(isset($_POST["submit"])){
    updateDataStudent($_POST, $id);
    var_dump($_POST);
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- <link rel="stylesheet" href="../src/output.css"> -->
</head>
<body>
    <section class="w-full bg-[#EAEAEA] px-10 py-20 ">
    <div class="w-96 mx-auto bg-white rounded-lg">
        <form action="" method="post" class="flex flex-col gap-3 p-5">
            <?php foreach ($students as $student) : ?>
            <label for="name">Nama</label>
            <input required class="rounded-xl p-2 border-2 ring ring-blue-500" type="text" name="name" id="name" value="<?= $student["name"] ?>">
             <label for="gender">Gender</label>
            <select name="gender" id="gender">
                <option value="laki-laki">Male</option>
                <option value="perempuan">Female</option>
            </select>
            <label for="age">Umur</label>
            <input required class="rounded-xl p-2 border-2 ring ring-blue-500" type="text" name="age" id="age" value="<?= $student["age"] ?>">

            <label for="image">Image</label>
            <input required class="rounded-xl p-2 border-2 ring ring-blue-500" type="text" name="image" id="image" value="<?= $student["image"] ?>">

            <label for="nis">NIS</label>
            <input required class="rounded-xl p-2 border-2 ring ring-blue-500" type="text" name="nis" id="nis" value="<?= $student["nis"] ?>">

            <label for="nik">NIK</label>
            <input required class="rounded-xl p-2 border-2 ring ring-blue-500" type="text" name="nik" id="nik" value="<?= $student["nik"] ?>">

            <label for="class">Kelas</label>
            <input required class="rounded-xl p-2 border-2 ring ring-blue-500" type="text" name="class" id="class" value="<?= $student["class"] ?>">

            <label for="address">Alamat</label>
            <textarea required class="rounded-xl p-2 border-2 ring ring-blue-500" type="text" name="address" id="address"><?= $student["address"] ?></textarea>
            <?php endforeach ?>
            <button type="submit" name="submit" class="w-24 px-4 py-2 rounded-lg self-end mt-3 bg-blue-400">Submit</button>
        </form>
    </div>
    </section>
</body>
</html>