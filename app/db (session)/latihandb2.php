<?php 

$conn=mysqli_connect ("localhost", "root","","bljr_crud");

$result = mysqli_query ($conn , "SELECT * FROM coba");


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
</head>
<body>
    <table border="1" cellspacing="0" cellpadding="10">
    <tr>
    <th>No</th>
    <th>Nama</th>
    <th>No.Wa</th>
    </tr>
<?php $i = 1; ?>
<?php while ($row = mysqli_fetch_assoc($result)):?>
    
    <tr>
    <td><?= $i;?></td>
    <td><?= $row ["nama"];?></td>
    <td><?= $row ["no_wa"];?></td>

    </tr>
    <?php $i++;?>
<?php endwhile ; ?>
    
    
    </table>
</body>
</html>







