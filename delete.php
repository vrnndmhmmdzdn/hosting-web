<?php
require "connection.php";

$id = $_GET["id"];

// echo deleteStudent($id);

if(deleteStudent($id, "students") > 0){
    echo "<script>
    alert('Data Berhasil Dihapus!');
    document.location.href = 'index.php';
    </script>";
}else{
    echo "<script>
    alert('Data Gagal Dihapus!');
    document.location.href = 'index.php';
    </script>";
}


?>