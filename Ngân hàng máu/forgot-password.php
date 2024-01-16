<?php
session_start();
include('includes/config.php');
if(isset($_POST['submit']))
  {
$email=$_POST['emailid'];
$mobile=$_POST['mobilephone'];
$newpassword=md5($_POST['newpassword']);
$sql ="SELECT EmailId FROM tblblooddonars WHERE EmailId=:email and MobileNumber=:mobile";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> bindParam(':mobile', $mobile, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
{
$con="update tblblooddonars set Password=:newpassword where EmailId=:email and MobileNumber=:mobile";
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
	<title>Hệ thống quản lý ngân hàng máu</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<link rel="stylesheet" href="css/fontawesome-all.css">
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
	    rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
	    rel="stylesheet">
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
	
<?php include('includes/header.php');?>

	<div class="inner-banner-w3ls">
		<div class="container">

		</div>
	</div>

	<div class="breadcrumb-agile">
		<div aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="index.php">Trang chủ</a>
				</li>
				<li class="breadcrumb-item active" aria-current="page">Quên mật khẩu</li>
			</ol>
		</div>
	</div>

	<section class="about py-5">
    <div class="container py-xl-5 py-lg-3">
        <div class="login px-4 mx-auto mw-100">
            <form method="post" name="chngpwd" onsubmit="return checkpass();" class="form-horizontal">
                
            <h5 class="text-center mb-4">Quên mật khẩu</h5>
                    <div class="form-group">
                    <label>Email</label>
                        <input type="email" class="form-control" name="emailid" id="emailid" placeholder="Email">
                        
                    </div>
                    <div class="form-group help">
                    <label>Số điện thoại</label>
                        <input type="text" class="form-control" name="mobilephone" id="mobilephone" placeholder="Số điện thoại">
                       
                       
                    </div>
                    <div class="form-group help">
                    <label>Mật khẩu mới</label>
                        <input type="password" class="form-control" name="newpassword" id="newpassword" placeholder="Mật khẩu mới">
                        
                       
                    </div>
                    <div class="form-group help">
                    <label>Xác nhận mật khẩu</label>
                        <input type="password" class="form-control" name="cfpassword" id="cfpassword" placeholder="Nhập lại mật khẩu">
                        
                       
                    </div>
                    <div class="form-group" >
                        <button type="submit" class="btn submit mb-4" name="submit">Đổi mật khẩu</button>
                    </div>
                    <div class="form-group" style="float:right;" >
                                        <div><a href="../index.php">Trở về trang chủ</a></div>
                                    </div><br>
					<p class="account-w3ls text-center pb-4" style="color:#000">
                                    Bạn chưa có tài khoản?
                                    <a href="sign-up.php" >Đăng kí ngay</a>
                                </p>
                </form>
				
    </div>
</div>
	
<?php include('includes/footer.php');?>

	<script src="js/jquery-2.2.3.min.js"></script>
	<script src="js/responsiveslides.min.js"></script>
	<script src="js/fixed-nav.js"></script>
	<script src="js/SmoothScroll.min.js"></script>
	<script src="js/move-top.js"></script>
	<script src="js/easing.js"></script>
	<script src="js/medic.js"></script>
	<script src="js/bootstrap.js"></script>
</body>

</html>