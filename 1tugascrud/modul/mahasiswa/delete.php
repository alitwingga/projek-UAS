<?php 

//MENGAMBIL ID DARI URL (METHOD GET)
$delete_id = $_GET['id'];
$query = "DELETE FROM user WHERE id='$delete_id'";
$query_img = "DELETE FROM foto WHERE id='$delete_id'";
$query1 = "DELETE FROM prestasi WHERE id='$delete_id'";
$query2 = "DELETE FROM kuliah WHERE id='$delete_id'";
mysqli_query($connect, $query_img); 
mysqli_query($connect, $query1);
mysqli_query($connect, $query2);
 if ( mysqli_query($connect, $query)) {
    //JIKA DATABASE TERKONEKSI DAN QUERY DIEKSEKUSI 
    $_SESSION['flash'] = "<div class=\"alert alert-success\" role=\"alert\">Data telah terhapus</div>";
}else{
    $_SESSION['flash'] = "<div class=\"alert alert-danger\" role=\"alert\">Data gagal terhapus</div>";
}

//REDIRECT KE base_url = http://localhost/1tugascrud/
echo "<script>window.location='".$WEB_CONFIG["base_url"]."';</script>";