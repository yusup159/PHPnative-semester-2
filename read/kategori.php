<?php require_once 'header.php';?>

	<div class="container">
		<div class="row">
			<div class="col">
				<a href="kategori-tambah.php"class="btn btn-primary mt-5">Tambah Kategori</a>
				<a href="home.php"class="btn btn-secondary mt-5">HOME</a>
				<div class="mt-3">
					<table class="table table-bordered" id="table-kategori">
						<thead>
							<tr>
								<th>ID</th>
								<th>Kategori</th>
								<th>Ubah</th>
							</tr>
						</thead>
						<tbody>
							<?php
								include "koneksi.php";
								$query = mysqli_query($koneksi,"select * from kategori");
								while ($result = mysqli_fetch_assoc($query)) {
									echo "<tr>";
										echo "<td>".$result['id']."</td>";
										echo "<td>".$result['kategori']."</td>";

										echo "<td>
												<a href='edit-kategori.php? id=".$result['id']."' class='btn btn-warning btn-sm'>Edit</a>
												<a href='hapus-kategori.php? id=".$result['id']."' class='btn btn-danger btn-sm' onclick='return confirm(\"Apakah anda yakin ingin menghapus data ini?\")'>Hapus</a>
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
    		{'searchable':false, 'shortable':false}
    		]

    	});
	});
</script>