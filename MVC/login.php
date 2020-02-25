<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="assets/img/logo/logo.png" rel="icon">
  <title>Đăng Nhập - Trắc nghiệm học đường</title>
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="assets/css/ruang-admin.min.css" rel="stylesheet">
  <link href="assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
   
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="assets/js/ruang-admin.min.js"></script>
  <!-- Page level plugins -->
  <script src="assets/js/countdown.js"></script>  
  <script src="assets/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <script src="assets/vendor/chart.js/Chart.min.js"></script>
  <script src="assets/js/demo/chart-area-demo.js"></script>  
  <script src="assets/js/jquery-1.9.1.min.js"></script>
  <script src="assets/js/watch.js"></script>
  
</head>

<body class="bg-gradient-login">
<?php
	//Gọi file connection.php ở bài trước
  require_once('./conf.php');
	// Kiểm tra nếu người dùng đã ân nút đăng nhập thì mới xử lý
	if (isset($_POST["btn_submit"])) {
		// lấy thông tin người dùng
		$username = $_POST["username"];
		$password = $_POST["password"];
		//làm sạch thông tin, xóa bỏ các tag html, ký tự đặc biệt 
		//mà người dùng cố tình thêm vào để tấn công theo phương thức sql injection
		$username = strip_tags($username);
		$username = addslashes($username);
		$password = strip_tags($password);
		$password = addslashes($password);
		if ($username == "" || $password =="") {
      echo '<script language="javascript">';
      echo 'alert("Tên đăng nhập và mật khẩu không được để trống!")';
      echo '</script>';
		}else{
			$sql = "SELECT * FROM sinhvien where TenDN = '$username' and MatKhau = '$password' ";
      $query = mysqli_query($conn,$sql);
      while($row=mysqli_fetch_array($query,MYSQLI_ASSOC))
      {
        $TenSV=$row['TenSV'];        
        $_SESSION['MaSV'] = $row['MaSV'];
        $_SESSION['hinh'] = $row['hinh'];
      }
      $num_rows = mysqli_num_rows($query);
			if ($num_rows==0) {
        echo '<script language="javascript">';
        echo 'alert("Tên đăng nhập hoặc mật khẩu không đúng!")';
        echo '</script>';
			}else{
        // Nếu có kết quả thì hiển thị, ngược lại thì thông báo không tìm thấy kết quả
				//tiến hành lưu tên đăng nhập vào session để tiện xử lý sau này
                $_SESSION['username'] = $TenSV;
        
                // Thực thi hành động sau khi lưu thông tin vào session
                // ở đây mình tiến hành chuyển hướng trang web tới một trang gọi là index.php
                header('Location: index.php');
			}
		}
	}
?>
  <!-- Login Content -->
  <div class="container-login">
    <div class="row justify-content-center">
      <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                  <h1 class=" h3 mb-4" style="color:blue;size:20">Trắc nghiệm học đường</h1>
                    <h1 class="h4 text-gray-900 mb-4">Đăng Nhập</h1>
                  </div>
                  <form method="POST" action="login.php">
                    <div class="form-group">
                      <input type="text" name="username" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp"
                        placeholder="Nhập tài khoản...">
                    </div>
                    <div class="form-group">
                      <input type="password" name="password" class="form-control" id="exampleInputPassword" placeholder="Mật Khẩu">
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small" style="line-height: 1.5rem;">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Nhớ tài khoản
                          </label>
                      </div>
                    </div>
                    <div class="form-group">
                    <input name="btn_submit" type="submit" value="Đăng nhập" class="btn btn-primary btn-block">
                    </div>
                    <hr>
                    <a href="#" class="btn btn-google btn-block">
                      <i class="fab fa-google fa-fw"></i> Đăng nhập với Google
                    </a>
                    <a href="#." class="btn btn-facebook btn-block">
                      <i class="fab fa-facebook-f fa-fw"></i> Đăng Nhập với Facebook
                    </a>
                  </form>

                  <hr>
                  <div class="text-center">
                    <a class="font-weight-bold small" href="register.html">Tạo tài khoản mới.!</a>
                  </div>
                  <div class="text-center">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Login Content -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/ruang-admin.min.js"></script>
</body>

</html>