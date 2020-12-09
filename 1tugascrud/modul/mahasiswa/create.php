<?php 
//VARIABEL UNTUK MENYIMPAN PESAN (VALIDASI)
$namaErr = $usernameErr = $passwordErr = $emailErr = "";
$_SESSION['halaman']="Tambah Data Mahasiswa";
//JIKA MENGIRIMKAN DATA DENGAN NAME "SAVE" (TOMBOL SAVE TELAH DI KLIK)
if(isset($_POST['save'])){
    //JIKA DATA ADA YANG KOSONG
    if(!isset($_POST['nama']) || !isset($_POST['username']) ||  !$_POST['email']){
        if($_POST['nama'] == ""){
        $namaErr = "Nama tidak boleh kosong!";
        }
        if($_POST['username'] == ""){
            $usernameErr = "Username tidak boleh kosong!";
        }
        if($_POST['email'] == ""){
            $emailErr = "Email tidak boleh kosong!";
        }
    }else{
        //SELAIN DATA ADA YANG KOSONG (BERARTI SEMUA FORM TERISI)
        $nama = $_POST['nama'];
        $username = $_POST['username'];
        $email = $_POST['email'];
		$foto = addslashes(file_get_contents($_FILES['gambartxt']['tmp_name']));
			
        $query1 = "INSERT INTO user (`nama`, `username`, `password`, `email`, `hp`, `tmpt_lahir`, `tgl_lahir`, `alamat`) 
							VALUES('$nama', '$username', '$password', '$email','$_POST[hptxt]','$_POST[tempattxt]','$_POST[tanggaltxt]','$_POST[alamattxt]')";
		$query2 = "INSERT INTO `foto` (`id`, `foto`) VALUES ((SELECT max(id) FROM `user`),'$foto')";
		$query3 = "INSERT INTO `prestasi` (`id`) VALUES ((SELECT max(id) FROM `user`))";
		$query4 = "INSERT INTO `kuliah` (`id`) VALUES ((SELECT max(id) FROM `user`))";
		
        //KONEKSI DATABASE DAN EKSEKUSI QUERY 
        if (mysqli_query($connect, $query1)) {
			mysqli_query($connect, $query2);
			mysqli_query($connect, $query3);
			mysqli_query($connect, $query4);

            echo "<div class=\"alert alert-success\" role=\"alert\">Berhasil disimpan</div>";
        }else{
            //JIKA GAGAL KONEK DATABASE / EKSEKUSI QUERY
            echo "<div class=\"alert alert-danger\" role=\"alert\">Gagal disimpan</div>";
        }
    }
}
 ?>

<a href="<?= $WEB_CONFIG['base_url'] ?>" class="btn btn-warning mb-3">
    <svg style="width:20px;height:20px" viewBox="0 0 24 24" class="mb-1">
        <path fill="#000000" d="M2,12A10,10 0 0,1 12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12M18,11H10L13.5,7.5L12.08,6.08L6.16,12L12.08,17.92L13.5,16.5L10,13H18V11Z" />
    </svg> kembali
</a>
<div class="container">
     <form method="POST" enctype="multipart/form-data" action="">
		<div class="form-group">
            <label for="inputNama">Foto</label>
			<p><img id="output" width="70" /></p>
            <!-- MENGISIKAN FORM DENGAN VALUE UNTUK UPDATE DATA -->
             <input type="file" accept="image/x-png,image/jpeg"  id="file"  onchange="loadFile(event)" class="form-control" name="gambartxt" required>
        
		</div>
        <div class="form-group">
            <label for="inputNama">Nama</label>
            <input type="text" name="nama" class="form-control" id="inputNama" maxlength="40" required autofocus>
            
            <small class="text-danger"><?= $namaErr == "" ? "":"* $namaErr " ?></small>
        </div>
        <div class="form-group">
            <label for="inputUsername">NIM</label>
            <input type="username" name="username" class="form-control" id="inputUsername" maxlength="30" required>
            <small class="text-danger"><?= $usernameErr == "" ? "":"* $usernameErr" ?></small>
        </div>
        <div class="form-group">
            <label for="inputEmail">Email</label>
            <input type="email" name="email" class="form-control" id="inputEmail" maxlength="50" required>
            <small class="text-danger"><?= $emailErr == "" ? "":"* $emailErr" ?></small>
        </div>
		<div class="form-group">
            <label>No HP</label>
            <input type="number" name="hptxt" class="form-control" required>    
        </div>
		<div class="form-group">
            <label>Tempat Lahir</label>
            <input type="text" name="tempattxt" class="form-control" required>    
        </div>
		<div class="form-group">
            <label>Tanggal Lahir</label>
            <input type="date" name="tanggaltxt" class="form-control" required>    
        </div>
		<div class="form-group">
            <label>Alamat</label>
            <textarea name="alamattxt" rows="4" cols="50" class="form-control" required></textarea>   
        </div>
		
        <input type="submit" class="btn btn-dark m-1" name="save" value="Save Now!">
    </form>
</div>