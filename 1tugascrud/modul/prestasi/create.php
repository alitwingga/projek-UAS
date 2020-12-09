<?php 
//VARIABEL UNTUK MENYIMPAN PESAN (VALIDASI)
$namaErr = $usernameErr = $passwordErr = $emailErr = "";

//JIKA MENGIRIMKAN DATA DENGAN NAME "SAVE" (TOMBOL SAVE TELAH DI KLIK)
if(isset($_POST['save'])){
    
        //SELAIN DATA ADA YANG KOSONG (BERARTI SEMUA FORM TERISI)

		$foto = addslashes(file_get_contents($_FILES['gambartxt']['tmp_name']));
			
        $query = "INSERT INTO `prestasi`(`id`,`nama_prestasi`, `tahun`, `tingkatan`, `foto`) 
								 VALUES ('$_GET[id]','$_POST[prestasitxt]','$_POST[tahuntxt]','$_POST[tingkatantxt]','$foto')";
					
		// VALUES ('$_GET[id]','$_POST[prestasitxt]','$_POST[tahuntxt]','$_POST[tingkatantxt]',$foto)";
        //KONEKSI DATABASE DAN EKSEKUSI QUERY 
        if (mysqli_query($connect, $query)) {
            echo "<div class=\"alert alert-success\" role=\"alert\">Berhasil disimpan</div>";
        }else{
            //JIKA GAGAL KONEK DATABASE / EKSEKUSI QUERY
            echo "<div class=\"alert alert-danger\" role=\"alert\">Gagal disimpan</div>";
        }
    }


//AMBIL ID PADA URL
$id = $_GET['id'];
$query = "SELECT * FROM user a,foto b  WHERE a.id=b.id and a.id = $id";

//KONEKSI DATABASE DAN EXECUTE QUERY
$result = mysqli_query($connect, $query);

//PENGAMBILAN DATA TERSIMPAN PADA VARIABEL $data
$data = mysqli_fetch_array($result);
 ?>

<a href="<?= $WEB_CONFIG['base_url'] ?>data_prestasi" class="btn btn-warning mb-3">
    <svg style="width:20px;height:20px" viewBox="0 0 24 24" class="mb-1">
        <path fill="#000000" d="M2,12A10,10 0 0,1 12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12M18,11H10L13.5,7.5L12.08,6.08L6.16,12L12.08,17.92L13.5,16.5L10,13H18V11Z" />
    </svg> Kembali
</a>
<div class="container">
     <form method="POST" enctype="multipart/form-data" action="">
		<div class="form-group">
            <label for="inputNama">Foto</label><br>
            <?php echo'<img class="img" width ="100px" src="data:image/jpeg;base64,'.base64_encode( $data['foto'] ).'"/>'; ?>
		</div>
        <div class="form-group">
            <label for="inputNama">Nama</label>
            <input type="text" name="nama" class="form-control" id="inputNama" maxlength="40" value="<?php echo $data['nama']; ?>" readonly>
           
        </div>
        <div class="form-group">
            <label for="inputUsername">Nama Prestasi</label>
            <input type="text" name="prestasitxt" class="form-control" required>
        </div>
		<div class="form-group">
            <label for="inputUsername">Tahun</label>
			<input type="number" min="1900" max="2030" step="1" value="2020" class="form-control" name="tahuntxt" required>
        </div>
        <div class="form-group">
            <label for="inputUsername">Tingkatan</label>
            <input type="text" name="tingkatantxt" class="form-control" required>
        </div>
		<div class="form-group">
            <label for="inputNama">Foto Sertifikat/Piagam</label>
			<p><img id="output" width="70" /></p>
            <!-- MENGISIKAN FORM DENGAN VALUE UNTUK UPDATE DATA -->
             <input type="file" accept="image/x-png,image/jpeg"  id="file"  onchange="loadFile(event)" class="form-control" name="gambartxt" required>
		</div>
        <input type="submit" class="btn btn-dark m-1" name="save" value="Save Now!">
    </form>
</div><br>