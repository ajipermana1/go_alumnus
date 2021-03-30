<?php
/**
 * using mysqli_connect for database connection
 */
 
class database{
	var $host = "localhost";
	var $username = "root";
	var $password = "";
	var $database = "bljr_crud";
	var $conn ;
 
	function __construct(){
		global $conn;
		$this->conn = mysqli_connect($this->host, $this->username, $this->password,$this->database);
		if (!$conn) {
			die('Koneksi Error : '.mysqli_connect_errno() 
			.' - '.mysqli_connect_error());
		 }else {
			
		 // koneksi berhasil
		 echo 'Koneksi Berhasil : '.mysqli_get_host_info($conn)."<br />";
		 }
	}
	// cek koneksi



function register($username,$password,$nama)
	{	
		$insert = mysqli_query($this->$conn,"INSERT INTO tb_user VALUES ('','$username','$password','$nama')");
		return $insert;
	}
 
	function login($username,$password,$remember)
	{
		$query = mysqli_query($this->$conn,"select * from tb_user where username='$username'");
		$data_user = $query->fetch_array();
		if(password_verify($password,$data_user['password']))
		{
			
			if($remember)
			{
				setcookie('username', $username, time() + (60 * 60 * 24 * 5), '/');
				setcookie('nama', $data_user['nama'], time() + (60 * 60 * 24 * 5), '/');
			}
			$_SESSION['username'] = $username;
			$_SESSION['nama'] = $data_user['nama'];
			$_SESSION['is_login'] = TRUE;
			return TRUE;
		}
	}

	function relogin($username)
	{
		$query = mysqli_query($this->conn,"select * from tb_user where username='$username'");
		$data_user = $query->fetch_array();
		$_SESSION['username'] = $username;
		$_SESSION['nama'] = $data_user['nama'];
		$_SESSION['is_login'] = TRUE;
	}
}
?>
<!-- $databaseHost = 'localhost';
$databaseName = 'bljr_crud';
$databaseUsername = 'root';
$databasePassword = '';
 
$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);  -->
 