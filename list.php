<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css">
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
							<a class="nav-link active" href="#">Daftar tamu</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		
		<div class="container">

			<!-- Title -->
			<div class="row mt-3">
				<div class="col">
					<h2>Daftar Tamu</h2>
					<p class="text-secondary">Berikut adalah daftar tamu di sini.</p>
				</div>
			</div>

			<!-- Table -->
			<div class="card p-4 row mt-3 justify-content-center">
				<div class="col-12">
					<table id="table" class="table table-striped mb-3">
                        <thead>
                            <tr>
								<th>No. </th>			
                                <th>Hari/Tanggal</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>No. Telp</th>
                                <th>Keperluan</th>
								<th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
							<?php
								$no=1;
								include "koneksi.php";
								$query	=	mysqli_query($koneksi, "SELECT * FROM tamu");

								while ($data = mysqli_fetch_array($query)) {
									echo "
									<tr>
										<td>".$no."</td>
										<td>".tanggal($data['tanggal'])."</td>
										<td>".$data['nama']."</td>
										<td>".$data['alamat']."</td>
										<td>".$data['telp']."</td>
										<td>".$data['keperluan']."</td>
										<td><a href='edit.php?id=".$data['id']."' class='btn btn-primary btn-sm'>Edit</a>
										<a onclick='javascript:confirmationDelete($(this));return false;' href='delete.php?id=".$data['id']."' class='btn btn-danger btn-sm'>Hapus</a></td>
									</tr>
										";
									$no++;	
								}
							?>
                        </tbody>
					</table>
				</div>
			</div>

	</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>
<script>
	function confirmationDelete(anchor)
	{
	var conf = confirm('Yakin ingin menghapus data ini?');
	if(conf)
		window.location=anchor.attr("href");
	}

    $(document).ready(function() {
    $('#table').DataTable({
		"autoWidth": false
	});
} );
</script>
</html>