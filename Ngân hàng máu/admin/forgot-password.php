<?php
session_start();
include('includes/config.php');
if(isset($_POST['submit']))
  {
$email=$_POST['email'];
$mobile=$_POST['mobilephone'];
$newpassword=md5($_POST['newpassword']);
$sql ="SELECT Email FROM tbladmin WHERE Email=:email and MobileNumber=:mobile";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> bindParam(':mobile', $mobile, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
{
$con="update tbladmin set Password=:newpassword where Email=:email and MobileNumber=:mobile";
$chngpwd1 = $dbh->prepare($con);
$chngpwd1-> bindParam(':email', $email, PDO::PARAM_STR);
$chngpwd1-> bindParam(':mobile', $mobile, PDO::PARAM_STR);
$chngpwd1-> bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
$chngpwd1->execute();
echo "<script>alert('Bạn đã đổi mật khẩu thành công');</script>";
}
else {
echo "<script>alert('Email hoặc số điện thoại không đúng');</script>"; 
}
}

?>
<!doctype html>
<html lang="UTF-8" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Hệ thống ngân hàng máu</title>
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/form.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="css/style.css">
	<script type="text/javascript">
function valid()
{
    if (document.chngpwd.newpassword.value != document.chngpwd.cfpassword.value)

{
alert("Mật khẩu không trùng nhau!");
document.chngpwd.confirmpassword.focus();
return false;
}
return true;
}
</script>
</head>

<body>
	
<div class="form-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-offset-3 col-md-6">
            <form method="post" name="chngpwd" onsubmit="return checkpass();" class="form-horizontal">
                
                    <span class="heading">Quên mật khẩu</span>
                    <div class="form-group">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                        <i class="fa fa-envelope"></i>
                    </div>
                    <div class="form-group help">
                        <input type="text" class="form-control" name="mobilephone" id="mobilephone" placeholder="Số điện thoại">
                        <i class="fa fa-phone"></i>
                       
                    </div>
                    <div class="form-group help">
                        <input type="password" class="form-control" name="newpassword" id="newpassword" placeholder="Mật khẩu mới">
                        <i class="fa fa-lock"></i>
                       
                    </div>
                    <div class="form-group help">
                        <input type="password" class="form-control" name="cfpassword" id="cfpassword" placeholder="Nhập lại mật khẩu">
                        <i class="fa fa-lock"></i>
                       
                    </div>
                    <div class="form-group" >
                        <button type="submit" name="submit" class="btn btn-default" style="width: 50%;">Đổi lại</button><br>
                        <a href="index.php" style="float: right;"  >Đăng nhập</a>
                    </div>
                    
					<div class="form-group"  >
                                        <div><a href="../index.php" class="btn btn-primary">Trở về trang chủ</a></div>
                                    </div>
                </form>
				
            </div>
        </div>
    </div>
</div>
	

</body>

</html>