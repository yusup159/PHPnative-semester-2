<?php require_once 'header.php';?>

<div class="container">
	<div class="row justify-content-center">
		<div class="col-6">
			<div class="card mt-5">
				<div class="card-header">
					Edit Kategori
				</div>
					<div class="card-body">
                    <?php  
							include "koneksi.php";
							$id = $_GET['id'];
							$sql = "SELECT * FROM kategori WHERE id=$id";
							$query= mysqli_query($koneksi,$sql);
							$result = mysqli_fetch_assoc($query);
						?>
						<form method="post" id="form-kategori">
                            <input type="hidden" name="id" value="<?= $_GET['id']?>">
							<div class="mb-3">
								<label for="kategori" class="form-label">Kategori Barang<span class="text-danger">*</span>
								</label>
								<input type="text" name="kategori" id="kategori" class="form-control"  value="<?= $result ["kategori"]?>">
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

	if (isset($_POST['proses'])) {
		mysqli_query($koneksi,"update kategori set
			kategori = '$_POST[kategori]'
            WHERE id=$id");
		header("location:kategori.php");
		exit;
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
