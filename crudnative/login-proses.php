<?php
include "koneksi.php";
session_start();
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = mysqli_query($conf, "SELECT * FROM admin WHERE username = '$username' AND password = '$password' ");
    if (mysqli_num_rows($query) !== 0) {
        $get = mysqli_fetch_array($query);
        $level = $get['level'];
        $nama =$get['nm_admin'];
        $_SESSION['nama'] = $nama;
        $_SESSION['login_in'] = $username;
        if($level == "admin") {
             echo "<script type= 'text/javascript'>alert('selamat datang $level'); location.href=\"admin/home.php\" ;</script>";              
            }elseif ($level == "user"){
            echo "<script type= 'text/javascript'>alert('selamat datang $level');  location.href=\"user/home.php\" :</script>";
            }
    } else {
        echo "<script type= 'text/javascript'>alert('selamat datang $level'); location.href=\"login/home.php\"
        ;</script>";  
    }
}else {
    echo "<script type= 'text/javascript'>alert('anda tidak di perkenankan memasuki haaman ini...!'); location.href=\"login.php\"
    ;</script>";
}
?>