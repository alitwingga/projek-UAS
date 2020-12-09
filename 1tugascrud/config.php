<?php 

//WEB CONFIG
$WEB_CONFIG = [
 'app_name' => 'SISTEM INFORMASI MAHASISWA', 
 'base_url' => 'http://localhost/1tugascrud/'
];

//DATABASE CONFIG
$DB_CONFIG = [
 'host' => 'localhost',
 'user' => 'root',
 'passwd' => '',
 'db_name' => 'phbweb2_crudnupev'
];  
//KONEK KE MYSQL
$connect = mysqli_connect($DB_CONFIG['host'], $DB_CONFIG['user'], $DB_CONFIG['passwd'], $DB_CONFIG['db_name']);

 ?>