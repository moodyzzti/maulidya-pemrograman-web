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
					<li class="nav-item active">
						<a class="nav-link" href="tambah.php">Tambah Mahasiswa</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="tambah kelas.php">Tambah Kelas</a>
						</li>
                    <li class="nav-item">
						<a class="nav-link" href="tambah dosen.php">Tambah Dosen</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="biodata diri.php">Biodata diri</a>
					</li>
                    <li class="nav-item">
						<a class="nav-link" href="tambah mata kuliah.php">Tambah Mata Kuliah</a>
				</ul>
			</div>
		</div>
	</nav>
	
	<div class="container" style="margin-top:20px">
		<h2>Tambah Dosen</h2>
		
		<hr>
		
		<?php
		if(isset($_POST['submit'])){
			$id			    = $_POST['id'];
			$nama			= $_POST['nama'];
			$mata_kuliah    = $_POST['mata_kuliah'];
			$hari			= $_POST['hari'];
            $semester		= $_POST['semester'];
			
			$cek = mysqli_query($koneksi, "SELECT * FROM dosen WHERE id='$id'") or die(mysqli_error($koneksi));
			
			if(mysqli_num_rows($cek) == 0){
				$sql = mysqli_query($koneksi, "INSERT INTO dosen(id, nama, mata_kuliah, hari, semester) VALUES('$id', '$nama', '$mata_kuliah', '$hari',  '$semester')") or die(mysqli_error($koneksi));
				
				if($sql){
					echo '<script>alert("Berhasil menambahkan data."); document.location="tambah dosen.php";</script>';
				}else{
					echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
				}
			}else{
				echo '<div class="alert alert-warning">Gagal, kode kelas sudah terdaftar.</div>';
			}
		}
		?>
		
		<form action="tambah dosen.php" method="post">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">ID</label>
				<div class="col-sm-10">
					<input type="text" name="id" class="form-control" size="4" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">NAMA</label>
				<div class="col-sm-10">
					<input type="text" name="nama" class="form-control" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">MATA KULIAH</label>
				<div class="col-sm-10">
					<input type="text" name="mata_kuliah" class="form-control" required>
                    </div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">HARI</label>
				<div class="col-sm-10">
					<select name="hari" class="form-control" required>
						<option value="">PILIH HARI</option>
						<option value="SENIN">SENIN</option>
						<option value="SELASA">SELASA</option>
						<option value="RABU">RABU</option>
						<option value="KAMIS">KAMIS</option>
					</select>
                    </div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">SEMESTER</label>
				<div class="col-sm-10">
					<input type="text" name="semester" class="form-control" required>
				</div>
			</div>
			<!-- <div class="form-group row">
				<label class="col-sm-2 col-form-label">KODE DOSEN</label>
				<div class="col-sm-10">
					<div class="form-check">
						<input type="radio" class="form-check-input" name="kode_dosen" value="LAKI-LAKI" required>
						<label class="form-check-label">RUANG</label>
					</div>
					<div class="form-check">
						<input type="radio" class="form-check-input" name="jenis_kelamin" value="PEREMPUAN" required>
						<label class="form-check-label">PEREMPUAN</label>
					</div>
				</div>
			</div> -->
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">&nbsp;</label>
				<div class="col-sm-10">
                    <input type="submit" name="submit" class="btn btn-primary" value="SIMPAN">
					<input type="submit" name="submit" class="btn btn-primary" value="EDIT">
                    <input type="submit" name="submit" class="btn btn-primary" value="DELETE">
				</div>
			</div>
		</form>
	</div>
	

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	
</body>
</html>