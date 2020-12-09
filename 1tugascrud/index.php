<?php 
error_reporting(0);
session_start();
require 'config.php'; 
?>

<!DOCTYPE html>
<html>
 <head>
    <title><?= $WEB_CONFIG['app_name'] ?></title>
    <link rel="stylesheet" href="assets/style.css">
    <script type="text/javascript" src="assets/jquery/jquery.min.js"></script>
    <link rel="stylesheet" href="assets/bootstrap/bootstrap.min.css">
	<script type="text/javascript" src="script/validation.min.js"></script>
	<script type="text/javascript" src="script/login.js"></script>

	<style>
	ol {
    counter-reset: item;
}
ol li { display: block }

ol li:before {
    content: counter(item) ". ";
counter-increment: item;
    font-weight: bold;
}
	</style>
</head>
<body>
    <nav class="navbar navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="#">
       
        <?= $WEB_CONFIG['app_name'] ?>
      </a>
	  <ul class="navbar-brand">
		<?php if($_SESSION['id']==""){ 
		echo "";
		}else{
		echo "<a href='logout.php' ><span ><b>Logout</b></span></a>";
		}
		
		?>
	  </ul>
    </nav>

    <?php 
	if ($_SESSION['id']==""){
		$page="";
		$line="";
	}else{
    $link = $_SERVER['REQUEST_URI'];
    $link_array = explode('/',$link);
    $page = end($link_array);
	
	
	$line="<hr>";
	}
	session_start();
    //MENGAMBIL VALUE PAGE YANG TERDAPAT PADA URL
    $content = (isset($_GET["page"])) ? $_GET["page"] : ""; ?> 
    <div class="container-fluid">
        <div><h4 class='text-capitalize header'><?= str_replace("_"," ",$page); ?></h4></div><?= $line; ?>
		<div class="row">
		
            <div class="col-md-2" <?php if ($_SESSION['id']==""){ echo 'hidden';} ?>>
               <b>Data :</b> 
				 <ol class="navbar-nav">
					<li class="nav-item"><a href="data_mahasiswa">Data Mahasiswa</a></li>
					<li class="nav-item"><a href="data_prestasi">Data Prestasi</a></li>
					<li class="nav-item"><a href="data_kuliah">Data Kuliah</a></li>
				 </ol>
				 
            </div>
            <div class="col-md-10">
            <?php
            //UNTUK PEMBERITAHUAN SUCCES DATA SUDAH DIOLAH 
            if(isset($_SESSION['flash'])){
                echo $_SESSION['flash'];
                unset($_SESSION['flash']);
            }
			
			if($_SESSION['id']==""){
					require 'view/login.php';
			}else{			
            //PERPINDAHAAN PAGES WEBSITE
            switch ($content) {
                case 'add':
                    require 'modul/mahasiswa/create.php';
                    break;
                case 'delete':
                    require 'modul/mahasiswa/delete.php';
                    break;
                case 'update':
                    require 'modul/mahasiswa/update.php';
                    break;
				case 'mahasiswa':
                    require 'modul/mahasiswa/read.php';
                    break;	
				case 'prestasi':
                    require 'modul/prestasi/read.php';
                    break;
				case 'tambah_prestasi':
                    require 'modul/prestasi/create.php';
                    break;
				 case 'update_prestasi':
                    require 'modul/prestasi/update.php';
                    break;	
				case 'delete_prestasi':
                    require 'modul/prestasi/delete.php';
                    break;		
				case 'kuliah':
                    require 'modul/kuliah/read.php';
                    break;	
				case 'tambah_kuliah':
                    require 'modul/kuliah/create.php';
                    break;
				case 'update_kuliah':
                    require 'modul/kuliah/update.php';
                    break;	
				case 'delete_kuliah':
                    require 'modul/kuliah/delete.php';
                    break;		
                //YANG PERTAMA KALI DI JALANKAN SELAIN DARI CASE DIATAS
                default:
                    require 'modul/mahasiswa/read.php';
                    break;
					
					}
            } ?>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="assets/script.js"></script>
    <script type="text/javascript" src="assets/bootstrap/bootstrap.min.js"></script>

	<script>
var loadFile = function(event) {
	var image = document.getElementById('output');
	image.src = URL.createObjectURL(event.target.files[0]);
};
</script>

</body>
</html>