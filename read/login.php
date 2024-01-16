<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Saya</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-4">
            <?php
                    if(isset($_GET['auth'])&& $_GET['auth']=='forbidden'){
                        echo'<div class="alert alert-danger mt-3">Anda tidak berhak untuk mengakses halaman tersebut</div>';
                    }
                ?>
                <div class="card mt-5">
                    <div class="card-headder text-center">
                        LOGIN
                    </div>
                    <div class="card-body">
                        <form method="post" id="login-form">
                        <input type="text" name="username" id="username " placeholder="Username" class="form-control mb-3">
                        <input type="password" name="password" id="password" placeholder="Password" class="form-control mb-3">
                        <button  type="submit" class="btn btn-primary">Login</button>
                        <a href="signin.php" class="btn btn-secondary">Daftar</a>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
        if($_POST){
            session_start();
            require_once 'koneksi.php';
            $username = $_POST['username'];
            $password = $_POST['password'];
            $sql ="SELECT * FROM admin WHERE username='$username' AND password='$password'";
            $query = mysqli_query($koneksi, $sql);
            $result = mysqli_num_rows($query);
            if($result > 0){
                //akses diberikan
                $_SESSION['toko-auth'] = true;
                header("location:home.php");
                exit;

            }else{
                //akses ditolak
                $_SESSION['toko'] = false;
                echo '<div class="container">
                <div class="row justify-content-center">
                    <div class="col-4">
                        <div class="alert alert-danger mt-5">
                            Username dan Password tidak cocok.
                        </div>
                     </div>
                </div>
            </div>';
                 
            }
        }
    ?>
 
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            $('#username').focus();

            $('#login-form').submit(function(){
                let username= $('#username').val();
                let password =$('#password').val();
                if(username=='' || password==''){
                    alert('Form tidak boleh kosong');
                    return false;
                }
            });
        });
    </script>
</body>
</html>