<?php require_once 'header.php';?>

	<div class="container">
		<div class="row">
			<div class="col">
				<a href="tambah-barang.php"class="btn btn-primary mt-5">Tambah Barang</a>
				<a href="home.php"class="btn btn-secondary mt-5">HOME</a>
				<div class="mt-3">
					<table class="table table-bordered" id="table-barang">
						<thead>
							<tr>
								<th>ID</th>
								<th>Kategori</th>
								<th>Nama Barang</th>
								<th>Stok</th>
								<th>Harga</th>
								<th>Catatan</th>
								<th>Ubah</th>
							</tr>
						</thead>
						<tbody>
							<?php
								include "koneksi.php";
								$query = mysqli_query($koneksi,"SELECT kategori.kategori, barang_toko.* FROM barang_toko JOIN kategori ON barang_toko.kategori=kategori.id");
								while ($result = mysqli_fetch_assoc($query)) {
									echo "<tr>";
										echo "<td>".$result['id']."</td>";
										echo "<td>".$result['kategori']."</td>";
										echo "<td>".$result['Nama_barang']."</td>";
										echo "<td>".$result['stok']."</td>";
										echo "<td>Rp".number_format($result['harga'], 0,',','.') .",-</td>";
										echo "<td>".$result['catatan']."</td>";
										echo "<td>
												<a href='edit-barang.php? id=".$result['id']."' class='btn btn-warning btn-sm'>Edit</a>
												<a href='hapus-barang.php? id=".$result['id']."' class='btn btn-danger btn-sm' onclick='return confirm(\"Apakah anda yakin ingin menghapus data ini?\")'>Hapus</a>
											</td>";
									echo "</tr>";
								}
							?>
						</tbody>
					</table>
				</div>
				
			</div>
		</div>
	</div>
<?php require_once 'footer.php';?>

<script type="text/javascript">
	$(document).ready(function () {
    $('#table-barang').DataTable(
    	{
    		'columns':[
    		null,
			null,
    		null,
    		null,
    		null,
    		null,
    		{'searchable':false, 'shortable':false}
    		]

    	});
	});
</script>