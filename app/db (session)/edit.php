<?php
error_reporting(0); //abaikan error pada browser
//panggil file koneksi.php yang sudah anda buat
include "functions.php";
?>
<!doctype html public "-//W3C//DTD HTML 4.0 //EN">
<html>
<head>
       <title>JUDUL WEBSITE ANDA</title>
</head>
<body>
<h1 align="center"> Edit Data</h1>
<?php
//ambil data berdasarkan parameter GET id
$id = $_GET["id"];
$b = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM coba where id='$_GET[id]'"));

//buat variabel dari setiap field name form produk
$nama= mysqli_real_escape_string($conn, $_POST['nama']);    //varibel field nama
$no_telp= mysqli_real_escape_string($conn, $_POST['no_wa']);    //varibel field stok
    //varibel field diskon

if(isset($_POST['submit'])){
 if(empty($nama)){    //jika nama kosong maka muncul pesan
        $error="<p style='color:#F00;'>* Masukan Nama </p>";
    }
    elseif(empty($no_telp)){ //jika kategori kosong maka muncul pesan
        $error="<p style='color:#F00;'>* Masukan No Wa</p>";
    }
    }
    else{  //jika semua sudah terpenuhi maka update ke tb_produk
   
    if(edit($id, $nama , $no_telp)){ //jika update berhasil maka muncul pesan dan menuju ke halaman produk
        echo "<script>alert('Data Nama Berhasil Diedit');document.location='produk.php'</script>";
    }else{  //jika update gagal maka muncul pesan
         echo "<script>alert('Proses edit gagal');document.location='input.php'</script>";
    }
}

?>
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

</body>
</html>