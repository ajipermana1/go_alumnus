<?php
// include database connection file
require("functions.php");
session_start();
if (!isset($_SESSION["login"])){
header("Location:login.php");
die;
}
 
// Check if form is submitted for user update, then redirect to homepage after update
// get data id from url 
$id = $_GET ["id"];
// query data berdasarkan id
$dt = query("SELECT * FROM coba WHERE id = $id")[0]or die(mysql_error());;

if(isset($_POST['edit']))
{	

	// update user data
	if (edit($_POST) > 0){
		echo "<script>
		alert('sukses Mengedit Data');
		</script>";
	// Redirect to homepage to display updated user in list
	header("Location: index.php");
}else {
	echo "<script>
		alert('Gagal Mengedit Data');
		</script>";
}
}
?>
<?php
// Display selected user data based on id
// Getting id from url
// $id = $_GET['id'];
 
// // Fetech user data based on id
// $result = mysqli_query($conn, "SELECT * FROM coba WHERE id=$id");
 
// while($user_data = mysqli_fetch_array($result))
// {
// 	$foto = $user_data['foto'];
// 	$nama = $user_data['nama'];
// 	$no_wa = $user_data['no_wa'];

// }
?>
<html>
<head>	
	<title>Edit User Data</title>
	<link rel="stylesheet" href="styleedit.css">
</head>
 
<body>
<center><h1>Edit Data </h1></center>
<center><a href="index.php">Kembali</a></center><br>
	<br/><br/>
	<form  method="post" action="" enctype="multipart/form-data">
	<section class="base">
	<div>

          <label for="foto">Foto:</label><br>
		  <img src="img/<?= $dt["foto"]?>" style="width: 120px;float: left;margin-bottom: 5px;" alt=""><br>
          <input type="file" name="gambar"  autofocus="" autocomplete="off"  >
        </div>
	<div>
          <label for="nama">Nama:</label>
          <input type="text" name="nama" required="" autofocus="" autocomplete="off" value=<?=  $dt["nama"];?> >
        </div>
		<div>
          <label for="no_wa">No Wa:</label>
          <input type="text" name="no_wa" required="" autofocus="" autocomplete="off" value=<?=  $dt ["no_wa"];?>>
        </div>
		<div>
		<input type="hidden" name="id" value=<?php echo $_GET['id'];?>>
		<input type="hidden" name="gambarLama" value=<?=$dt ["foto"];?>>
		<button type="submit" name="edit" >EDIT!!!</button>
		</div>
		</section>
	</form>
</body>
</html>