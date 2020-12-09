<?php 

//MENGAMBIL ID DARI URL (METHOD GET)
$delete_id = $_GET['id'];
$query = "DELETE FROM prestasi WHERE no='$delete_id'";


if (mysqli_query($connect, $query, mysqli_query($connect, $query_img))) {
    //JIKA DATABASE TERKONEKSI DAN QUERY DIEKSEKUSI 
    $_SESSION['flash'] = "<div class=\"alert alert-success\" role=\"alert\">Data telah terhapus</div>";
}else{
    $_SESSION['flash'] = "<div class=\"alert alert-danger\" role=\"alert\">Data gagal terhapus</div>";
}

//REDIRECT KE base_url = http://localhost/1tugascrud/
echo "<script>window.location='".$WEB_CONFIG["base_url"]."data_prestasi';</script>";