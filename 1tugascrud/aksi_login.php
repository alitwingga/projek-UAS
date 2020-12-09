<?php

require 'config.php';
function antiinjection($data){
  $filter_sql = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter_sql;
}

$username = antiinjection($_POST['username']);
$pass     = antiinjection($_POST['password']);

//$username = "admin";
//$pass     = "admin";


$login=mysqli_query($connect,"SELECT * FROM data_login WHERE username='$username' AND password='$pass'");
$ketemu=mysqli_num_rows($login);
$r=mysqli_fetch_array($login);

// Apabila username dan password ditemukan
if ($ketemu > 0){
  session_start();
 
  $_SESSION[id]     	= $r[id];
  $_SESSION[username]   = $r[username];
  $_SESSION[level]     	= $r[level];
  
  header('location:mahasiswa');	
  

}else{
  echo "<link href=config/adminstyle.css rel=stylesheet type=text/css>";
  echo "<center>LOGIN GAGAL! <br> 
        Username atau Password Anda tidak benar.<br>
        Atau account Anda sedang diblokir.<br>";
  echo "<a href=index.php><b>ULANGI LAGI</b></a></center>";
}
?>
