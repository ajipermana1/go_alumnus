<?php
// require_once 'functions.php';
// session_start();
// include_once('config.php');
// $database = new database();
 
// if(isset($_SESSION['is_login']))
// {
//     header('location:latihandb.php');
// }
 
// if(isset($_COOKIE['username']))
// {
//   $database->relogin($_COOKIE['username']);
//   header('location:latihandb.php');
// }
 
// if(isset($_POST['login']))
// {
//     $username = $_POST['username'];
//     $password = $_POST['password'];
//     if(isset($_POST['remember']))
//     {
//       $remember = TRUE;
//     }
//     else
//     {
//       $remember = FALSE;
//     }
 
//     if($database->login($username,$password,$remember))
//     {
//       header('location:latihandb.php');
//     }else {
//       echo "<script>
//         alert ('Proses Login Gagal, Mohon Coba Lagi Nanti.);
        
//         </script>";
//     }
// }
// if (isset($_POST["login"])){
//   $username = $_POST["username"];
//   $passworduser = $_POST["password"];

//   $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username'");

//   list($id ,$username, $password, $nama) = mysqli_fetch_array($result);

  // Jika data ditemukan dalam database, maka akan melakukan validasi dengan password_verify.
  // if (mysqli_num_rows($result) > 0) {

  // cek username

  // if (mysqli_num_rows($result)  === 1){

    // cek pw 
    // $row = mysqli_fetch_assoc($result);
    // var_dump ($row["password"]);
    // die;
//     $cekpw =  password_verify($passworduser, $password);
//     var_dump (password_hash($passworduser, PASSWORD_DEFAULT)); echo "<br>";
//     var_dump($password);echo "<br>";
//     var_dump ($cekpw);echo "<br>";
//     die;
    
//    if ( password_verify($passworduser, $password) ){
//     echo "<script>
//     alert ('Berhasil login. ');
    
//     </script>";

// header("Location:latihandb.php");
// exit;
//     }else {
//       echo "<script>
//     alert ('Gagal login. ');
    
//     </script>";
      
//     }
//   }
// }
session_start();
if (isset($_SESSION["login"])){
  header ("location:index.php");
}else {
  require 'functions.php';
  if (isset($_POST["login"])){
    $username = $_POST["username"];
    $passworduser = $_POST["password"];
  
    $result = mysqli_query ($conn, "SELECT * FROM tb_user WHERE username = '$username'");
    // cek username
  
    if (mysqli_num_rows($result) === 1){
  // cek password 
  $row = mysqli_fetch_assoc($result);
  if (password_verify($passworduser, $row["password"])){
    // set session
    $_SESSION ["login"]= true;
    
  
    header("Location: index.php");
    die;
  }else {
    echo "<script>
  alert ('Gagal login. ');
        
    </script>";
  }
  
    }
  }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login </title>
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/login.css">
</head>
<body>
  <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="container">
      <div class="card login-card">
        <div class="row no-gutters">
          <div class="col-md-5">
            <img src="assets/images/login.jpg" alt="login" class="login-card-img">
          </div>
          <div class="col-md-7">
            <div class="card-body">
              <div class="brand-wrapper">
                <img src="assets/images/user-profile.svg" alt="logo" class="logo">
              </div>
              <p class="login-card-description">Silahkan Login</p>
              <form action="" method="post">
                  <div class="form-group">
                    <label for="username" class="sr-only">Username</label>
                    <input type="text" name="username" required=""  id="username" class="form-control" placeholder="Username" autocomplete="off" >
                  </div>
                  <div class="form-group mb-4">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" name="password" required=""  id="password" class="form-control" placeholder="***********">
                  </div>
                            <div class="form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1" name="remember">
              <label class="form-check-label" for="exampleCheck1">Remember me?</label>
            </div>
                  <button type="submit" name="login" id="login" class="btn btn-block login-btn mb-4" type="button">Login</button>
                </form>
                <!-- <a href="#!" class="forgot-password-link">Forgot password?</a> -->
                <p class="login-card-footer-text">Belum Punya Akun? <a href="register.php" class="text-reset">Daftar Sekarang!</a></p>
                <nav class="login-card-footer-nav">
                <P> Copyright © <?php echo date("Y"); ?> -  AJI PERMANA </P>
                  <!-- <a href="#!">Terms of use.</a>
                  <a href="#!">Privacy policy</a> -->

                </nav>
            </div>
          </div>
        </div>
      </div>
      <!-- <div class="card login-card">
        <img src="assets/images/login.jpg" alt="login" class="login-card-img">
        <div class="card-body">
          <h2 class="login-card-title">Login</h2>
          <p class="login-card-description">Sign in to your account to continue.</p>
          <form action="#!">
            <div class="form-group">
              <label for="email" class="sr-only">Email</label>
              <input type="email" name="email" id="email" class="form-control" placeholder="Email">
            </div>
            <div class="form-group">
              <label for="password" class="sr-only">Password</label>
              <input type="password" name="password" id="password" class="form-control" placeholder="Password">
            </div>
            <div class="form-prompt-wrapper">
              <div class="custom-control custom-checkbox login-card-check-box">
                <input type="checkbox" class="custom-control-input" id="customCheck1">
                <label class="custom-control-label" for="customCheck1">Remember me</label>
              </div>              
              <a href="#!" class="text-reset">Forgot password?</a>
            </div>
            <input name="login" id="login" class="btn btn-block login-btn mb-4" type="button" value="Login">
          </form>
          <p class="login-card-footer-text">Don't have an account? <a href="#!" class="text-reset">Register here</a></p>
        </div>
      </div> -->
    </div>
  </main>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>
<?php 
// Memulai session.
// session_start();

// Jika ditemukan session, maka user akan otomatis dialihkan ke halaman admin.
// if (isset($_SESSION['username'])) {
//     header("location: admin.php");
// }

// Include koneksi database.
// require_once "connect.php";

// Jika tombol login ditekan, maka akan mengirimkan variabel yang berisi username dan password.
// if (isset($_POST['login'])) {

    // $username = $_POST['username'];
    // $userpass = $_POST['password']; // password yang di inputkan oleh user lewat form login.

    // Query ke database.
    // $sql = mysqli_query($connect_db, "SELECT username, password, nama FROM login WHERE username = '$username'");

    // list($username, $password, $nama) = mysqli_fetch_array($sql);

    // Jika data ditemukan dalam database, maka akan melakukan validasi dengan password_verify.
    // if (mysqli_num_rows($sql) > 0) {

        /*
            Validasi login dengan password_verify
            $userpass -----> diambil dari password yang diinputkan user lewat form login
            $password -----> diambil dari password dalam database
        */
        // if (password_verify($userpass, $password)) {

            // Buat session baru.
            // session_start();
            // $_SESSION['username'] = $username;
            // $_SESSION['nama']     = $nama;

            // Jika login berhasil, user akan diarahkan ke halaman admin.
//             header("location: admin.php");
//             die();
//         } else {
//             <!-- echo '<script language="javascript">
//                     window.alert("LOGIN GAGAL! Silakan coba lagi");
//                     window.location.href="./";
//                   </script>'; -->
//         }
//     } else {
//        <!-- echo '<script language="javascript">
//                 window.alert("LOGIN GAGAL! Silakan coba lagi");
//                 window.location.href="./";
//              </script>'; -->
//     }
// }
?>
