<?php require_once 'header.php';?>

<div class="container">
	<div class="row justify-content-center">
		<div class="col-6">
			<div class="card mt-5">
				<div class="card-header">
					Tambah Kategori
				</div>
					<div class="card-body">
						<form method="post" id="form-kategori">
							<div class="mb-3">
								<label for="kategori" class="form-label">Kategori Barang<span class="text-danger">*</span>
								</label>
								<input type="text" name="kategori" id="kategori" class="form-control">
							</div>
							<div>	
								<button type="reset" class="btn btn-secondary">Reset</button>
								<button type="submit" name="proses" class="btn btn-primary">Simpan</button>
							</div>
						</form>
				</div>
			</div>
		</div>
	</div>
</div>

<?php 
	include "koneksi.php";
	if($_POST){
		$kategori = $_POST['kategori'];
		$sql = $sql = "INSERT INTO kategori VALUES(null,'$kategori')";
		$query = mysqli_query($koneksi,$sql);
		if($query){
			header("location:kategori.php");
		}else{echo "Gagal Menambahkan Kategori";}

	}
	

 ?>
<?php require_once 'footer.php';?>

<script>
	$(document).ready(function(){
		$('#form-barang').submit(function(){
			let kategori = $('#kategori').val();

			if (kategori=='') {
				alert('Mohon Lengkapi Form');
				return false;
			}
		});
	});
</script>
