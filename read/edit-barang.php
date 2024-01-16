<?php require_once 'header.php';?>

<div class="container">
	<div class="row justify-content-center">
		<div class="col-6">
			<div class="card mt-5">
				<div class="card-header">
					Edit Barang
				</div>
					<div class="card-body">
						<?php  
							include "koneksi.php";
							$id = $_GET['id'];
							$sql = "SELECT * FROM barang_toko WHERE id=$id";
							$query= mysqli_query($koneksi,$sql);
							$result = mysqli_fetch_assoc($query);
						?>
						<form method="post" id="form-barang_toko">
							<input type="hidden" name="id_barang" value="<?= $_GET['id'] ?>">
							<div class="mb-3">
								<label for="nama_barang" class="form-label">Nama Barang<span class="text-danger">*</span>
								</label>
								<input type="text" name="nama_barang" id="nama_barang" class="form-control" value="<?= $result ["Nama_barang"]?>">
							</div>
							<div class="mb-3">
								<label for="stok_barang" class="form-label">Stok Barang<span class="text-danger">*</span>
								</label>
								<input type="number" min="0" name="stok_barang" id="stok_barang" class="form-control" value="<?= $result ["stok"]?>">
								
							</div>
							<div class="mb-3">
								<label for="harga_barang" class="form-label">Harga Barang<span class="text-danger">*</span>
								</label>
								<input type="number" min="0" name="harga_barang" id="harga_barang" class="form-control" value="<?= $result ["harga"]?>">
								
							</div>
							<div class="mb-3">
								<label for="catatan" class="form-label">Catatan
								</label>
								<input type="text" name="catatan" id="catatan" class="form-control" value="<?= $result ["catatan"]?>">
								
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
	if (isset($_POST['id_barang'])) {
		mysqli_query($koneksi,"UPDATE barang_toko SET
			nama_barang = '$_POST[nama_barang]',
			stok = '$_POST[stok_barang]',
			harga = '$_POST[harga_barang]',
			catatan = '$_POST[catatan]'
			WHERE id=$id");
		header("location:barang.php");
		exit;
	}


 ?>
<?php require_once 'footer.php';?>

<script>
	$(document).ready(function(){
		$('#form-barang_toko').submit(function(){
			let nama_barang = $('#nama_barang').val();
			let stok_barang = $('#stok_barang').val(); 
			let harga_barang = $('#harga_barang').val(); 

			if (nama_barang==''|| stok_barang==''|| harga_barang=='') {
				alert('Mohon Lengkapi Form');
				return false;
			}else if(!$.isNumeric(stok_barang) || !$.isNumeric(harga_barang)){
				alert('stok_barang dan harga_barang harus berupa angka');
				return false;
			}else if(stok_barang < 0 || harga_barang < 0){
				alert('harga_barang dan stok barang tidak boleh kurang dari 0');
				return false;
			}
		});
	});
</script>
