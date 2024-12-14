<?php
include "../connection.php";
$keyword = $_GET['search'];
$students = getTabel("students");
$students = search($keyword);
// var_dump($students);
// die;
?>
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
        <th>Action</th>
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
            <td><a href="edit.php?id=<?= $student["id"] ?>" class="p-2 rounded-md hover:opacity-70 bg-green-400"><i class="ph ph-pencil"></i></a> | <a href="delete.php?id=<?= $student["id"] ?>" onclick="return confirm('Apa Kamu Ingin Menghapus?')" class="p-2 rounded-md hover:opacity-70 bg-red-400"><i class="ph ph-trash"></i></a></td>
        </tr>
        <?php $no++; ?>
    <?php endforeach ?>
</table>