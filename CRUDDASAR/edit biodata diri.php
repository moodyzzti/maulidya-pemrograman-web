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
                        <a class="nav-link" href="biodata diri.php">Biodata Diri</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="tambah kelas.php">Tambah Kelas</a>
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
        <h2>Edit Biodata Diri</h2>
        <hr>
        
        <?php
        // Jika sudah mendapatkan parameter GET id dari URL
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            // Query ke database SELECT tabel mahasiswa berdasarkan id = $id
            $select = mysqli_query($koneksi, "SELECT * FROM biodata_diri WHERE id='$id'") or die(mysqli_error($koneksi));

            // Jika hasil query = 0 maka muncul pesan error
            if (mysqli_num_rows($select) == 0) {
                echo '<div class="alert alert-warning">ID tidak ada dalam database.</div>';
                exit();
            } else {
                // Membuat variabel $data dan menyimpan data row dari query
                $data = mysqli_fetch_assoc($select);
            }
        } else {
            echo '<div class="alert alert-warning">ID tidak ditemukan.</div>';
            exit();
        }
        ?>

        <?php
        // Jika tombol simpan di tekan/klik
        if (isset($_POST['submit'])) {
            $nim = $_POST['nim'];
            $nama = $_POST['nama'];
            $jenis_kelamin = $_POST['jenis_kelamin'];
            $jurusan = $_POST['jurusan'];
            $alamat = $_POST['alamat'];

            // Update data ke database
            $sql = mysqli_query($koneksi, "UPDATE biodata_diri SET nim='$nim', nama='$nama', jenis_kelamin='$jenis_kelamin', jurusan='$jurusan', alamat='$alamat' WHERE id='$id'") or die(mysqli_error($koneksi));

            if ($sql) {
                echo '<script>alert("Berhasil menyimpan data."); document.location="edit biodata diri.php?id='.$id.'";</script>';
            } else {
                echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
            }
        }
        ?>

        <form action="edit biodata diri.php?id=<?php echo $id; ?>" method="post">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">NIM</label>
                <div class="col-sm-10">
                    <input type="text" name="nim" class="form-control" value="<?php echo htmlspecialchars($data['nim'] ?? '', ENT_QUOTES); ?>" >
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">NAMA MAHASISWA</label>
                <div class="col-sm-10">
                    <input type="text" name="nama" class="form-control" value="<?php echo htmlspecialchars($data['nama'] ?? '', ENT_QUOTES); ?>" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">JENIS KELAMIN</label>
                <div class="col-sm-10">
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="jenis_kelamin" value="LAKI-LAKI" <?php echo (isset($data['jenis_kelamin']) && $data['jenis_kelamin'] == 'LAKI-LAKI') ? 'checked' : ''; ?> required>
                        <label class="form-check-label">LAKI-LAKI</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="jenis_kelamin" value="PEREMPUAN" <?php echo (isset($data['jenis_kelamin']) && $data['jenis_kelamin'] == 'PEREMPUAN') ? 'checked' : ''; ?> required>
                        <label class="form-check-label">PEREMPUAN</label>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">JURUSAN</label>
                <div class="col-sm-10">
                    <select name="jurusan" class="form-control" required>
                        <option value="">PILIH JURUSAN</option>
                        <option value="SISTEM INFORMASI" <?php echo (isset($data['jurusan']) && $data['jurusan'] == 'SISTEM INFORMASI') ? 'selected' : ''; ?>>SISTEM INFORMASI</option>
                        <option value="TEKNIK INFORMATIKA" <?php echo (isset($data['jurusan']) && $data['jurusan'] == 'TEKNIK INFORMATIKA') ? 'selected' : ''; ?>>TEKNIK INFORMATIKA</option>
                        <option value="TEKNIK SIPIL" <?php echo (isset($data['jurusan']) && $data['jurusan'] == 'TEKNIK SIPIL') ? 'selected' : ''; ?>>TEKNIK SIPIL</option>
                        <option value="DESAIN PRODUK" <?php echo (isset($data['jurusan']) && $data['jurusan'] == 'DESAIN PRODUK') ? 'selected' : ''; ?>>DESAIN PRODUK</option>
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
