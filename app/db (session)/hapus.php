<?php 
require 'functions.php';
session_start();
if (!isset($_SESSION["login"])){
header("Location:login.php");
die;
}



$id = $_GET["id"];

if(hapus($id)){ //jika berhasil
    echo "<script>alert('Data Berhasil Di Hapus');document.location='index.php'</script>";
}else{  //jika gagal
    echo "<script>alert('Data Gagal Di Hapus, Coba ulangi lagi');document.location='index.php'</script>";
}

?>