<?php include('config.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>WEB CRUD KAMPUS</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container">
			<a class="navbar-brand" href="#"><b>WEB CRUD KAMPUS</b></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<a class="nav-link" href="index.php">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="tambah.php">Tambah Mahasiswa</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="tambah kelas.php">Tambah Kelas</a>
						</li>
					<li class="nav-item">
						<a class="nav-link" href="biodata diri.php">Biodata Diri</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="tambah dosen.php">Tambah Dosen</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="tambah mata kuliah.php">Tambah Mata Kuliah</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	
	<div class="container" style="margin-top:20px">
		<h2>Edit Mata Kuliah</h2>
		
		<hr>
		
		<?php
		//jika sudah mendapatkan parameter GET id dari URL
		if(isset($_GET['id'])){
			//membuat variabel $id untuk menyimpan id dari GET id di URL
			$id = $_GET['id'];
			
			//query ke database SELECT tabel mahasiswa berdasarkan id = $id
			$select = mysqli_query($koneksi, "SELECT * FROM mata_kuliah WHERE id='$id'") or die(mysqli_error($koneksi));
			
			//jika hasil query = 0 maka muncul pesan error
			if(mysqli_num_rows($select) == 0){
				echo '<div class="alert alert-warning">ID tidak ada dalam database.</div>';
				exit();
			//jika hasil query > 0
			}else{
				//membuat variabel $data dan menyimpan data row dari query
				$data = mysqli_fetch_assoc($select);
			}
		}
		?>
		
		<?php
		//jika tombol simpan di tekan/klik
		if(isset($_POST['submit'])){
			$id			= $_POST['id'];
			$jam			= $_POST['jam'];
			$dosen			= $_POST['dosen'];
			$jurusan		= $_POST['jurusan'];
			$hari			= $_POST['hari'];
			$mata_kuliah	= $_POST['mata_kuliah'];

			
			$sql = mysqli_query($koneksi, "UPDATE mata_kuliah SET jam='$jam', dosen='$dosen', jurusan='$jurusan', hari='$hari', mata_kuliah='$mata_kuliah' WHERE id='$id'") or die(mysqli_error($koneksi));
			
			if($sql){
				echo '<script>alert("Berhasil menyimpan data."); document.location="edit.php?id='.$id.'";</script>';
			}else{
				echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
			}
		}
		?>
		
		<form action="edit_mata_kuliah.php?id=<?php echo $id; ?>" method="post">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">JAM</label>
				<div class="col-sm-10">
					<input type="text" name="jam" class="form-control" value="<?php echo $data['jam']; ?>" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">DOSEN</label>
				<div class="col-sm-10">
					<input type="text" name="dosen" class="form-control" value="<?php echo $data['dosen']; ?>" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">JURUSAN</label>
				<div class="col-sm-10">
					<select name="jurusan" class="form-control" required>
						<option value="">PILIH JURUSAN</option>
						<option value="SISTEM INFORMASI" <?php if($data['jurusan'] == 'SISTEM INFORMASI'){ echo 'selected'; } ?>>SISTEM INFORMASI</option>
						<option value="TEKNIK INFORMATIKA" <?php if($data['jurusan'] == 'TEKNIK INFORMATIKA'){ echo 'selected'; } ?>>TEKNIK INFORMATIKA</option>
						<option value="TEKNIK SIPIL" <?php if($data['jurusan'] == 'TEKNIK SIPIL'){ echo 'selected'; } ?>>TEKNIK SIPIL</option>
						<option value="DESAIN PRODUK" <?php if($data['jurusan'] == 'DESAIN PRODUK'){ echo 'selected'; } ?>>DESAIN PRODUK</option>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">MATA KULIAH</label>
				<div class="col-sm-10">
					<select name="mata_kuliah" class="form-control" required>
						<option value="">MATA KULIAH</option>
						<option value="PEMROGRAMAN WEB" <?php if($data['mata_kuliah'] == 'PEMROGRAMAN WEB'){ echo 'selected'; } ?>>PEMROGRAMAN WEB</option>
						<option value="BISNIS INTELLEGENCE" <?php if($data['mata_kuliah'] == 'BISNIS INTELLEGENCE'){ echo 'selected'; } ?>>BISNIS INTELLEGENCE</option>
						<option value="BAHASA INDONESIA" <?php if($data['mata_kuliah'] == 'BAHASA INDONESIA'){ echo 'selected'; } ?>>BAHASA INDONESIA</option>
						<option value="KKL" <?php if($data['mata_kuliah'] == 'KKL'){ echo 'selected'; } ?>>KKL</option>
					</select>
	</div>
		</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">PILIH HARI</label>
				<div class="col-sm-10">
					<select name="hari" class="form-control" required>
						<option value="">PILIH HARI</option>
						<option value="SENIN" <?php if($data['hari'] == 'SENIN'){ echo 'selected'; } ?>>SENIN</option>
						<option value="SELASA" <?php if($data['hari'] == 'SELASA'){ echo 'selected'; } ?>>SELASA</option>
						<option value="RABU" <?php if($data['hari'] == 'RABU'){ echo 'selected'; } ?>>RABU</option>
						<option value="KAMIS" <?php if($data['hari'] == 'KAMIS'){ echo 'selected'; } ?>>KAMIS</option>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">&nbsp;</label>
				<div class="col-sm-10">
					<input type="submit" name="submit" class="btn btn-primary" value="SIMPAN">
					<a href="index.php" class="btn btn-warning">KEMBALI</a>
				</div>
			</div>
		</form>
	</div>
	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	
</body>
</html>