<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Toko Saya</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.css"/>
 


</head>
<body>

<div class="container">
	<div class="row justify-content-center">
		<div class="col-6">
			<div class="card mt-5">
				<div class="card-header">
					Daftar
				</div>
					<div class="card-body">
						<form method="post" id="form-daftar">
							<div class="mb-3">
								<label for="username" class="form-label">Username<span class="text-danger">*</span>
								</label>
								<input type="text" name="username" id="username" class="form-control">
							</div>
                            <div class="mb-3">
								<label for="password" class="form-label">Passwword<span class="text-danger">*</span>
								</label>
								<input type="text" name="password" id="password" class="form-control">
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
		$username = $_POST['username'];
		$password = $_POST['password'];
		$sql = "INSERT INTO admin VALUES('$username','$password')";
		$query = mysqli_query($koneksi,$sql);
		if($query){
		header("location:login.php");
		}else{echo "Gagal! Pastikan isi data dengan benar";}
	}

 ?>

	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>

</body>
</html>

<script>
	$(document).ready(function(){
		$('#form-daftar').submit(function(){
            let username = $('#username').val();
			let password = $('#password').val();

			if (username =='' || password=='') {
				alert('Mohon Lengkapi Form');
				return false;
			}
		});
	});
</script>
