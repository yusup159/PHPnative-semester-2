<?php require_once 'header.php';?>

<div class="container">
	<div class="row justify-content-center">
		<div class="col-6">
			<div class="card mt-5">
				<div class="card-header">
					Tambah Barang
				</div>
					<div class="card-body">
						<form method="post" id="form-barang">
							<div class="mb-3">
								<label for="kategori">Kategori Barang</label>
								<select name="kategori" id="kategori" class="form-select">
								<option selected>--Pilih Kategori--</option>
								<?php
									include "koneksi.php";
									$sql = "SELECT * FROM kategori";
									$query = mysqli_query($koneksi, $sql);
									while($result = mysqli_fetch_assoc($query)){
										echo '<option value="'.$result['id'].'">'.$result['kategori'].'</option>';
									}
								?>
								</select>
							</div>
							<div class="mb-3">
								<label for="nama_barang" class="form-label">Nama Barang<span class="text-danger">*</span>
								</label>
								<input type="text" name="nama_barang" id="nama_barang" class="form-control">
							</div>
							<div class="mb-3">
								<label for="stok_barang" class="form-label">Stok Barang<span class="text-danger">*</span>
								</label>
								<input type="number" min="0" name="stok_barang" id="stok_barang" class="form-control">
								
							</div>
							<div class="mb-3">
								<label for="harga_barang" class="form-label">Harga Barang<span class="text-danger">*</span>
								</label>
								<input type="number" min="0" name="harga_barang" id="harga_barang" class="form-control">
								
							</div>
							<div class="mb-3">
								<label for="catatan" class="form-label">Catatan
								</label>
								<input type="text" name="catatan" id="catatan" class="form-control">
								
							</div>
							<div>	
								<button type="reset" class="btn btn-secondary">Reset</button>
								<button type="submit" class="btn btn-primary">Simpan</button>
							</div>
						</form>
				</div>
			</div>
		</div>
	</div>
</div>

<?php 
	
	if ($_POST) {
			$kategori = $_POST['kategori'];
			$nama_barang = $_POST['nama_barang'];
			$stok_barang = $_POST['stok_barang'];
			$harga_barang = $_POST['harga_barang'];
			$catatan = $_POST['catatan'];
		$sql = "INSERT INTO barang_toko VALUES(NULL, $kategori,'$nama_barang',$stok_barang,$harga_barang,'$catatan')";
		$query = mysqli_query($koneksi,$sql);
		if($query){
		header("location:barang.php");
		}else{echo "Gagal Menambahkan Barang";}
	}

 ?>
<?php require_once 'footer.php';?>

<script>
	$(document).ready(function(){
		$('#form-barang').submit(function(){
			let kategori = $('#kategori').val();
			let nama_barang = $('#nama_barang').val();
			let stok_barang = $('#stok_barang').val(); 
			let harga_barang = $('#harga_barang').val(); 

			if (kategori=='' ||nama_barang==''|| stok_barang==''|| harga_barang=='') {
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
