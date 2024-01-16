<?php
session_start();
include('includes/config.php');
if(isset($_POST['login']))
{
$username=$_POST['username'];
$password=md5($_POST['password']);
$sql ="SELECT UserName,Password FROM tbladmin WHERE UserName=:username and Password=:password";
$query= $dbh -> prepare($sql);
$query-> bindParam(':username', $username, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
$_SESSION['alogin']=$_POST['username'];
echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
} else{
  
  echo "<script>alert('Tài khoản hoặc mật khẩu không đúng.');</script>";

}

}

?>
<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>BloodBank & Donor Management System | Admin Login</title>
	<link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/form.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="css/style.css">

</head>

<body>
	
<div class="form-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-offset-3 col-md-6">
                <form method="post" class="form-horizontal">
                    <span class="heading">Log In</span>
                    <div class="form-group">
                        <input type="text" class="form-control" name="username" id="username" placeholder="Username">
                        <i class="fa fa-user"></i>
                    </div>
                    <div class="form-group help">
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                        <i class="fa fa-lock"></i>
                       
                    </div>
                    <div class="form-group">
                        <button type="submit" name="login" class="btn btn-default">Đăng nhập</button>
                    </div>
					
					<div class="card-footer text-center" style="padding-bottom: 30px;" >
                    <a href="forgot-password.php" class="btn" style="float: left;margin-left: 35px;margin-bottom: 30px;">Quên mật khẩu</a>
                                        <div  style="float: right" class="small"><a href="../index.php" class="btn btn-primary">Trở về trang chủ</a></div>
                                    </div>
                </form>
				
            </div>
        </div>
    </div>
</div>
	

</body>

</html>


