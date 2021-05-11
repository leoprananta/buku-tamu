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
							<a class="nav-link active" href="#">Home</a>
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
				<div class="col-6">
					<h4>Selamat datang di Buku Tamu</h4>
					<p class="text-secondary">Silahkan mengisi data diri Anda di bawah ini.</p>
				</div>
				<div class="col-2 mt-4">
					<h6 class="text-grey"><?=tanggal(date('Y-m-d'))?></h6>
				</div>
			</div>

			<!-- Forms -->
			<div class="row mt-3 mb-5 justify-content-center">
				<div class="col-8">
				<form method="post" action="create.php">

					
					<div class="mb-2">
						<label class="form-label">Nama Lengkap</label>
						<input type="text" class="form-control" name="nama" required>
					</div>
					<div class="mb-2">
						<label class="form-label">Alamat</label>
						<input type="text" class="form-control" name="alamat" required>
					</div>
					<div class="mb-2">
						<label class="form-label">No. Telp</label>
						<input type="number" class="form-control" name="telp" required>
					</div>
					<div class="mb-2">
						<label class="form-label">Keperluan</label>
						<textarea class="form-control" rows="3" name="keperluan" required></textarea>
					</div>
					
					<button type="submit" class="btn btn-primary">Simpan</button>
				</form>
				</div>
			</div>

	</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>