<?php  
// hubungkan ke functions
require("functions.php");
// koneksi ke database
// if (!$conn) {
//     die("Koneksi gagal: " . mysqli_connect_error());
// }
// echo "Koneksi berhasil";
// mysqli_close($conn);
$id = $_GET ["id"];

// cek tombol 
if (isset($_POST["submit"])){
    // ambil data dari form 
    // $nama = $_POST["nama"];
    // $no_wa = $_POST["no_wa"];
    

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
if (edit($_POST) > 0){
    echo "Berhasil Mengedit Data";
}else {
  echo mysqli_error ($conn);
}

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
</head>
<body>

<table>
<form action="" method="post">
<thead>
<th >Silahkan Edit Data</th>
</thead>
<tbody>
<tr>
<td><label for="nama">Nama</label></td>
<td><input type="text" name="nama" id="nama" placeholder="Nama"></td>
</tr>
<tr>
<td><label for="no_wa">No.Wa</label></td>
<td><input type="number" name="no_wa" id="no_wa" placeholder="No Wa"></td>
</tr>
<tr>
<td><button type="submit" name="submit" >Edit Data!</button></td>
</tr>
</tbody>
</form>
</table>
<a href="latihandb.php">Kembali</a>
    
</body>
</html>d