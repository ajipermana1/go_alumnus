<?php 

$conn=mysqli_connect ("localhost", "root","","bljr_crud");

function query( $query){
    global $conn;
    $result = mysqli_query ($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

// function register($username,$password,$nama)
// 	{	
// 		$insert = mysqli_query($this->koneksi,"insert into tb_user values ('','$username','$password','$nama')");
// 		return $insert;
// 	}
 
// 	function login($username,$password,$remember)
// 	{
// 		$query = mysqli_query($this->koneksi,"select * from tb_user where username='$username'");
// 		$data_user = $query->fetch_array();
// 		if(password_verify($password,$data_user['password']))
// 		{
			
// 			if($remember)
// 			{
// 				setcookie('username', $username, time() + (60 * 60 * 24 * 5), '/');
// 				setcookie('nama', $data_user['nama'], time() + (60 * 60 * 24 * 5), '/');
// 			}
// 			$_SESSION['username'] = $username;
// 			$_SESSION['nama'] = $data_user['nama'];
// 			$_SESSION['is_login'] = TRUE;
// 			return TRUE;
// 		}
// 	}

// 	function relogin($username)
// 	{
// 		$query = mysqli_query($this->koneksi,"select * from tb_user where username='$username'");
// 		$data_user = $query->fetch_array();
// 		$_SESSION['username'] = $username;
// 		$_SESSION['nama'] = $data_user['nama'];
// 		$_SESSION['is_login'] = TRUE;
// 	}

function tambah($data){
    // mengambil variabel $conn
    global $conn ;
   
    // ambil data pada form
    $nama =htmlspecialchars( $_POST["nama"]);
    $no_wa =htmlspecialchars( $_POST["no_wa"]);
     // Uploud gambar
     $foto = uploud();

     if (! $foto){
         return false;
     }
    
    $query = "INSERT INTO coba (id,foto, nama, no_wa) VALUES 
    ( '','$foto' , '$nama' , '$no_wa')";
    mysqli_query ($conn, $query);

    return mysqli_affected_rows($conn);

}

function uploud(){
    
   $namaFile= $_FILES ['gambar']['name'];
   $ukuranFile= $_FILES ['gambar']['size'];
   $error= $_FILES ['gambar']['error'];
   $tmpNama= $_FILES ['gambar']['tmp_name'];



//    cek apakah tidak ada gambar yang diuploud 
if ($error === 4){

    echo "<script>
    alert('Pilih gambar terlebih dahulu!!!')
    </script>";
    return false;
}

// cek apakah yang diuploud itu gambar 
$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
$ekstensiGambar = explode('.',$namaFile);
$ekstensiGambar = strtolower(end($ekstensiGambar));
if (!in_array($ekstensiGambar,$ekstensiGambarValid)){
    echo "<script>
    alert('Yang anda uploud bukan gambar!')
    </script>";
    return false;

}
// cek ukuran 

if ($ukuranFile > 2000000){
    echo "<script>
    alert('Ukuran gambar yang anda pilih terlalu besar !')
    </script>";
    return false;
}

// lolos pengecekan 
// generate nama baru
$namaFileBaru= uniqid();
$namaFileBaru .= '.';
$namaFileBaru.= $ekstensiGambar;

move_uploaded_file($tmpNama, 'img/'. $namaFile);

return $namaFileBaru;




}


function hapus($id){
    global $conn;
    $hapus = "DELETE FROM `coba` WHERE id = $id";
    mysqli_query ($conn, $hapus);
    return mysqli_affected_rows($conn);


}
function edit($data){
    global $conn;
        // ambil data pada form
    // $foto =htmlspecialchars( $_POST["foto"]);
    $nama =htmlspecialchars( $data["nama"]);
    $no_wa =htmlspecialchars( $data["no_wa"]);
        $id =$data ["id"]; 
        $gambarLama = htmlspecialchars($data["gambarLama"]);
        // cek user pilih gambar
        if ($_FILES["gambar"]["error"] === 4){
            $foto = $gambarLama;
        }else {
            $foto = uploud();
        }
       

       
    $edit = "UPDATE coba SET foto='$foto',
     nama = $nama,
     no_wa = $no_wa" ;
     $edit .= " WHERE id = '$id'";
    $save=mysqli_query($conn,$edit);
    return mysqli_affected_rows($conn);
}
function cari($keyword){
    global $conn ;
    $query = "SELECT * FROM coba 
                WHERE nama LIKE '%$keyword%' OR no_wa LIKE '%$keyword%'";
    return query($query);
        
}
function registrasi($data){
    global $conn;

    $username =strtolower( stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn,$data["password"]);
    $password2 = mysqli_real_escape_string($conn,$data["password2"]);
    $nama = $data ["nama"];

    // cek apa username sudah ada 
    $cek= mysqli_query($conn, "SELECT username FROM tb_user WHERE username = '$username'");

    if (mysqli_fetch_assoc($cek)){
        echo "<script>
        alert ('Anda sudah pernah daftar, Silahkan Login!')
        </script>"; 
        return false;
    }else {
        
        echo "<script>
        alert ('User Berhasil Ditambahkan!')
        </script>";
        header ("location:login.php");
    
       
    }
    // cek konfirmasi password 
    if ($password !== $password2){
        echo "<script>
        alert('Password Tidak Sama!')
        </script>";
        return false;
    }
    // enkripsi pw
    $password = password_hash($password, PASSWORD_DEFAULT);
    // insert user baru
    $tambah = "INSERT INTO tb_user VALUES ('','$username','$password','$nama') ";
    mysqli_query($conn, $tambah );

    return mysqli_affected_rows ($conn);
}


?>