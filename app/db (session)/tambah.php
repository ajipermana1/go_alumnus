<?php  
session_start();
if (!isset($_SESSION["login"])){
header("Location:login.php");
die;
}
// hubungkan ke functions
require("functions.php");
// koneksi ke database
// if (!$conn) {
//     die("Koneksi gagal: " . mysqli_connect_error());
include_once("config.php");
// }
// echo "Koneksi berhasil";
// mysqli_close($conn);


// cek tombol 
if (isset($_POST["submit"])){
    // ambil data dari form 
    // var_dump($_FILES); die;
    // $foto =htmlspecialchars( $_POST["foto"]);
    // $nama =htmlspecialchars( $_POST["nama"]);
    // $no_wa =htmlspecialchars( $_POST["no_wa"]);
    

    // // query 
    // $query = "INSERT INTO coba VALUES 
    // ( '' , '$nama' , '$no_wa')";
    // mysqli_query ($conn, $query);
// cek apakah data berhasil ditambahkan
// $cek = mysqli_affected_rows($conn);
// var_dump (mysqli_affected_rows($conn));

// if (mysqli_affected_rows($conn)> 0){
//     echo "Berhasil Menambahkan ", $cek ," Data";
// }else{
//     echo "Gagal Menambahkan Data";
//     echo "<br>";
//     echo mysqli_error($conn);
// }
if (tambah($_POST) > 0){
  echo "<script>
  alert('sukses Menambahkan Data');
  </script>";
}else {
    // echo "Gagal Menambahkan data";
    echo "<script>
    alert('Gagal Menambahkan Data');
    </script>";
    header("tambah.php");
    // $ga = 'echo "Gagal Menambahkan data"';
}

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tambah</title>
    <link rel="stylesheet" href="styletambah.css">
</head>
<body>
      <center>
        <h1>Tambah Data</h1>
      <center>
      <center><a href="index.php">Kembali</a></center><br>
      <form method="POST" action="" enctype="multipart/form-data" >
      <section class="base">
      <div>
          <label>Foto:</label>
          <input type="file" name="gambar" autofocus=""  autocomplete="off" />
        </div>
        <div>
          <label>Nama:</label>
          <input type="text" name="nama" autofocus="" required="" autocomplete="off" />
        </div>
        <div>
          <label>No.Wa</label>
         <input type="text" name="no_wa" autocomplete="off" />
        </div>
        <div>
         <button type="submit" name="submit">Simpan Data</button>
        </div>
        </section>
      </form>
  </body>
</html>