<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">

    <title>Buku Tamu</title>
  </head>
  <body>
  <?php
		function tanggal($tanggal){
			$hari_array = array(
				'Minggu',
				'Senin',
				'Selasa',
				'Rabu',
				'Kamis',
				'Jumat',
				'Sabtu'
			);
			$hr = date('w', strtotime($tanggal));
			$hari = $hari_array[$hr];

			$bulan = array (
				1 =>   'Januari',
				'Februari',
				'Maret',
				'April',
				'Mei',
				'Juni',
				'Juli',
				'Agustus',
				'September',
				'Oktober',
				'November',
				'Desember'
			);
			$pecahkan = explode('-', $tanggal);
		
			return $hari . ', ' . $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
	}
	?>
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
			<div class="container">
				<a class="navbar-brand mr-5" href="#">Buku Tamu</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
					<ul class="navbar-nav">
						<li class="nav-item">
							<a class="nav-link" href="index.php">Home</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="list.php">Daftar tamu</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		
		<div class="container">
			
			<!-- Title -->
			<div class="row mt-3 justify-content-center">
				<div class="col-8">
					<h4>Edit Data</h4>
					<p class="text-secondary">Silahkan edit data yang perlu diedit</p>
				</div>
			</div>

            <?php
				include "koneksi.php";

				$id	=	$_GET['id'];

				$query	=	mysqli_query($koneksi, "SELECT * FROM tamu WHERE id = '".$id."'");
				$data	=	mysqli_fetch_array($query);
			?>

			<!-- Forms -->
			<div class="row mt-3 mb-5 justify-content-center">
				<div class="col-8">
				<form method="post" action="update.php">

                    <div>
						<input type="hidden" class="form-control" name="id" value="<?=$data['id']?>" required>
					</div>

                    <div class="mb-2">
						<label class="form-label">Hari/Tanggal</label>
						<input type="text" class="form-control" name="tanggal" value="<?=$data['tanggal']?>" required>
						<!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
					</div>
					<div class="mb-2">
						<label class="form-label">Nama Lengkap</label>
						<input type="text" class="form-control" name="nama" value="<?=$data['nama']?>" required>
					</div>
					<div class="mb-2">
						<label class="form-label">Alamat</label>
						<input type="text" class="form-control" name="alamat" value="<?=$data['alamat']?>" required>
					</div>
					<div class="mb-2">
						<label class="form-label">No. Telp</label>
						<input type="number" class="form-control" name="telp" value="<?=$data['telp']?>" required>
					</div>
					<div class="mb-2">
						<label class="form-label">Keperluan</label>
						<textarea class="form-control" rows="3" name="keperluan" required><?=$data['keperluan']?></textarea>
					</div>
					
					<button type="submit" class="btn btn-primary">Simpan</button>
                    <a class="btn btn-outline-primary" href="list.php" role="button">Batal</a>
				</form>
				</div>
			</div>

	</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>