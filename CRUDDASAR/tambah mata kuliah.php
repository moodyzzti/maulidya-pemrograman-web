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
		<h2>Daftar Mata Kuliah</h2>
		
		<hr>
		
		<?php
		if(isset($_POST['submit'])){
			$jam			= $_POST['jam'];
			$dosen		= $_POST['dosen'];
			$jurusan		= $_POST['jurusan'];
            $hari		    = $_POST['hari'];
            $mata_kuliah	= $_POST['mata_kuliah'];
			
			$cek = mysqli_query($koneksi, "SELECT * FROM mata_kuliah WHERE mata_kuliah='$mata_kuliah'") or die(mysqli_error($koneksi));
			
			if(mysqli_num_rows($cek) == 0){
				$sql = mysqli_query($koneksi, "INSERT INTO mata_kuliah(jam, dosen, jurusan, hari, mata_kuliah) VALUES('$jam', '$dosen', '$jurusan', '$hari', '$mata_kuliah')") or die(mysqli_error($koneksi));
				
				if($sql){
					echo '<script>alert("Berhasil menambahkan data."); document.location="tambah.php";</script>';
				}else{
					echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
				}
			}else{
				echo '<div class="alert alert-warning">Gagal, NIM sudah terdaftar.</div>';
			}
		}
		?>
		
		<form action="tambah mata kuliah.php" method="post">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">JAM</label>
				<div class="col-sm-10">
					<input type="text" name="jam" class="form-control" size="4" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">NAMA DOSEN</label>
				<div class="col-sm-10">
					<input type="text" name="dosen" class="form-control" required>
            </div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">JURUSAN</label>
				<div class="col-sm-10">
					<select name="jurusan" class="form-control" required>
						<option value="">PILIH JURUSAN</option>
						<option value="TEKNIK INFORMATIKA">SISTEM INFORMASI</option>
						<option value="TEKNIK INFORMATIKA">TEKNIK INFORMATIKA</option>
						<option value="TEKNIK SIPIL">TEKNIK SIPIL</option>
						<option value="PERTANIAN">DESAIN PRODUK</option>
					</select>
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
				<label class="col-sm-2 col-form-label">MATA KULIAH</label>
				<div class="col-sm-10">
					<select name="mata kuliah" class="form-control" required>
						<option value="">PILIH MATA KULIAH</option>
						<option value="PEMROGRAMAN WEB">PEMROGRAMAN WEB</option>
						<option value="BISNIS INTELLEGENCE">BISNIS INTELLEGENCE</option>
						<option value="BAHASA INDONESIA">BAHASA INDONESIA</option>
						<option value="KKL">KKL</option>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">&nbsp;</label>
				<div class="col-sm-10">
					<input type="submit" name="submit" class="btn btn-primary" value="SIMPAN">
					<a href="edit mata kuliah.php?id=<?php echo $id; ?>" class="btn btn-primary">EDIT</a>
					<a href="delete mata kuliah.php?id=<?php echo $id; ?>" class="btn btn-danger">DELETE</a>
				</div>
			</div>
		</form>
	</div>
	

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	
</body>
</html>