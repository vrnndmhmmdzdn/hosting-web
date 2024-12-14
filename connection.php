<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "school_blog";

$connection = mysqli_connect($server, $username, $password, $database);

if (!$connection) {
    echo "Gagal Terhubung!";
}

function getTabel($tabel)
{
    global $connection;
    $hasilTabel = "SELECT * FROM $tabel";
    $result = mysqli_query($connection, $hasilTabel);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
function getData($query)
{
    global $connection;
    $result = mysqli_query($connection, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function showDataStudent($id)
{
    global $connection;
    $query = "SELECT * FROM students WHERE id = $id";
    $result = mysqli_query($connection, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}


function insertDataStudent($data)
{
    global $connection;

    $name = $data["name"];
    $gender = $data["gender"];
    $age = $data["age"];
    $image = $data["image"];
    $nis = $data["nis"];
    $nik = $data["nik"];
    $class = $data["class"];
    $address = $data["address"];

    $query = "INSERT INTO students VALUES (null, '$name','$gender','$age','$image','$nis','$nik','$class','$address')";

    mysqli_query($connection, $query);

    if (mysqli_affected_rows($connection) > 0) {
        echo "<script>
        alert('Data Berhasil Ditambahkan!');
        document.location.href = 'index.php';
        </script>";
    } else {
        echo ('Data Gagal Ditambahkan');
    }
}

function updateDataStudent($data, $id)
{
    global $connection;

    $name = $data["name"];
    $gender = $data["gender"];
    $age = $data["age"];
    $image = $data["image"];
    $nis = $data["nis"];
    $nik = $data["nik"];
    $class = $data["class"];
    $address = $data["address"];

    $query = "UPDATE students SET name= '$name', gender= '$gender', age= '$age', image= '$image', nis= '$nis', nik= '$nik', class= '$class', address= '$address' WHERE id = $id";

    mysqli_query($connection, $query);

    if (mysqli_affected_rows($connection) > 0) {
        echo "<script>
        alert('Data Berhasil Diupdate!');
        document.location.href = 'index.php';
        </script>";
    } else {
        echo ('Data Gagal Diupdate');
    }
}

function deleteStudent($id, $tabel)
{
    global $connection;
    $query = "DELETE FROM $tabel WHERE id = $id";
    mysqli_query($connection, $query);
    return mysqli_affected_rows($connection);
    //  
}
function register($data)
{
    global $connection;
    $username = mysqli_real_escape_string($connection, $data['username']);
    $email = mysqli_real_escape_string($connection, $data['email']);
    $password = mysqli_real_escape_string($connection, $data['password']);
    $confirm = mysqli_real_escape_string($connection, $data['confirm']);

    if ($password !== $confirm) {
        return false;
    }
    $email_db = mysqli_query($connection, "SELECT email FROM users WHERE email = '$email'");
    if (mysqli_fetch_assoc($email_db)) {
        echo "<script>alert('Email telah terdaftar')</script>";
        return false;
    }
    $password = password_hash($password, PASSWORD_DEFAULT);
    $query = "INSERT INTO users VALUES (null,'$username','$email','$password')";
    mysqli_query($connection, $query);
    return mysqli_affected_rows($connection);
}
function login($data)
{
    global $connection;
    $email = $data["email"];
    $password = $data["password"];
    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($connection, $query);
    if (mysqli_num_rows($result) !== 1) {
        return false;
    }
    $data_db = mysqli_fetch_assoc($result);
    if (!password_verify($password, $data_db["password"])) {
        return false;
    }
    return $data_db;
}
function search($keyword)
{
    $query = "SELECT * FROM students WHERE name LIKE '%$keyword%' OR gender LIKE '%$keyword%' OR age LIKE '%$keyword%' OR nis LIKE '%$keyword%' OR nik LIKE '%$keyword%' OR class LIKE '%$keyword%'";
    return getData($query);
}

?>

<script src="https://cdn.tailwindcss.com"></script>
<script src="https://unpkg.com/@phosphor-icons/web"></script>