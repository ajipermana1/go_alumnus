<?php 
session_start();
if (! isset($_SESSION["login"])){
header("Location:login.php");
die;
}

require ("functions.php");

$coba= query("SELECT * FROM coba ");

// tombol cari diklik

if (isset($_POST["cari"])){
$coba = cari($_POST["keyword"]);

}

// while ($db = mysqli_fetch_assoc($result)){

// var_dump ($db);
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<center><h1>Data</h1><br></center>

    <div><table border="1" cellspacing="0" cellpadding="10">
  <center> <a href="tambah.php" class="tambah">Tambah Data</a></center><br> 
  <center> <a href="logout.php" class="tambah">Logout</a></center><br> 
<center><br><form action="" method="post">
<input type="text" name="keyword" autofocus="" size="30" placeholder="Masukan Keyword" autocomplete="off" >
<button type="submit" name="cari">Cari</button>

</form>
</center>
   <thead>
    <tr>
    <th>No</th>
    <th>Foto</th>
    <th>Nama</th>
    <th>No.Wa</th>
    <th>Action</th>
    </tr>
    </thead>

<?php $i = 1; ?>
<?php foreach ($coba as $row):?>
    <tbody>
    <tr>
    <td><?= $i;?></td>
    <td><?=  "<img src='img/$row[foto]' width='70' height='90' />";?></td>
    <td><?= $row ["nama"];?></td>
    <td><?= $row ["no_wa"];?></td>
    <td><a href="edit3.php?id=<?= $row ["id"];?>" >Edit</a>&nbsp;|&nbsp;<a href="hapus.php?id=<?= $row ["id"];?>" onclick="return confirm('Hapus Data?');">Hapus</a></td>
    </tr>
    <?php $i++;?>
<?php endforeach ; ?>


    
</tbody>
    </table>
    </div>
</body>
</html>







