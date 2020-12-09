<?php 
$no = $_GET['no'];
$id = $_GET['id'];
if(isset($_POST['save'])){
        $query = "UPDATE `kuliah` SET `id`='$_GET[id]',
                                       
										`semester`='$_POST[semestertxt]',
										`tahun`='$_POST[tahuntxt]',
										`jlmh_sks`='$_POST[skstxt]',
										`ip`='$_POST[iptxt]',
										`ipk`='$_POST[ipktxt]' 
										WHERE no='$_GET[no]'";
         if (mysqli_query($connect, $query)) {
            echo "<div class=\"alert alert-success\" role=\"alert\">Berhasil diubah</div>";
        }else{
            echo "<div class=\"alert alert-danger\" role=\"alert\">Gagal diubah</div>";
        }
    }


//AMBIL ID PADA URL

$query = "SELECT * FROM user a,foto b WHERE a.id=b.id and a.id = '$id'";
$query_p = "SELECT * FROM kuliah WHERE no = '$no'";

//KONEKSI DATABASE DAN EXECUTE QUERY
$result = mysqli_query($connect, $query);
$result_p = mysqli_query($connect, $query_p);

//PENGAMBILAN DATA TERSIMPAN PADA VARIABEL $data
$data = mysqli_fetch_array($result);
$data_p = mysqli_fetch_array($result_p);

 ?>

<a href="<?= $WEB_CONFIG['base_url'] ?>data_kuliah" class="btn btn-warning mb-3">
    <svg style="width:20px;height:20px" viewBox="0 0 24 24">
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
            <input type="text" name="nama" class="form-control" id="inputNama" value="<?= $data['nama'] ?>" readonly>
           
        </div>
        </div>
        </div>
        <div class="form-group">
            <label for="inputNama">NIM</label>
            <input type="number" name="tahuntxt" class="form-control" value="<?= $data_p['tahun'] ?>"  required autofocus>   
        </div>
		 <div class="form-group">
            <label for="inputNama">Semester</label>
            <input type="number" name="semestertxt" class="form-control" value="<?= $data_p['semester'] ?>" required autofocus>   
        </div>
		
		 <div class="form-group">
            <label for="inputNama">Jumlah SKS</label>
            <input type="number" name="skstxt" class="form-control" value="<?= $data_p['jlmh_sks'] ?>" required autofocus>    
        </div>
		 <div class="form-group">
            <label for="inputNama">IP</label>
            <input type="number" name="iptxt" class="form-control" value="<?= $data_p['ip'] ?>" onchange="setTwoNumberDecimal" min="0.01" max="4" step="0.01" value="0.00"required autofocus>
        </div>
		 <div class="form-group">
            <label for="inputNama">IPK</label>
            <input type="number" name="ipktxt" class="form-control" value="<?= $data_p['ipk'] ?>" onchange="setTwoNumberDecimal" min="0.01" max="4" step="0.01" value="0.00"required autofocus>       
        </div>
       
        <input type="submit" class="btn btn-dark m-1" name="save" value="Update Now!">
    </form>
</div>