<?php
include "../connection.php";
$students = getTabel("students");
// var_dump($students);
// die;
require_once __DIR__ . '/../vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf();
$content = '
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
    </tr>
';
$no = 1;
foreach ($students as $student) {
    $content .= '
    <tr class="border-b-[1px]">
        <!-- td = table data -->
        <td>' . $no . '</td>
        <td>' . $student["name"] . '</td>
        <td>' . $student["gender"] . '</td>
        <td>' . $student["age"] . '</td>
        <td><img src="../img/' . $student["image"] . '" width="50px"></td>
        <td>' . $student["nis"] . '</td>
        <td>' . $student["nik"] . '</td>
        <td>' . $student["class"] . '</td>
        <td>' . $student["address"] . '</td>
        </tr>
';
    $no++;
}
$content .= '</table>';
$mpdf->WriteHTML($content);
$mpdf->Output();
