<?php
session_start();
include __DIR__ . "/../../../config/koneksi.php";
include __DIR__ . "/../../../class/barang.php";

$db = new Database();
$conn = $db->getConnection();
$barang = new Barang($conn);

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $result = $barang->store($_POST);

    if ($result['status']) {
        $_SESSION['success'] = $result['message'];
    }else{
        $_SESSION['error'] = $result['message'];
    }

    header("Location: barang.php");
}