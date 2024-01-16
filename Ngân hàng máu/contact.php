<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_POST['send']))
  {
$name=$_POST['fullname'];
$email=$_POST['email'];
$contactno=$_POST['contactno'];
$message=$_POST['message'];
$sql="INSERT INTO  tblcontactusquery(name,EmailId,ContactNumber,Message) VALUES(:name,:email,:contactno,:message)";
$query = $dbh->prepare($sql);
$query->bindParam(':name',$name,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':contactno',$contactno,PDO::PARAM_STR);
$query->bindParam(':message',$message,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{

echo '<script>alert("Cám ơn bạn đã phản hồi lại cho tôi. Vui lòng đợi 1 ít thời gian để chúng tôi trả lời. Hãy kiểm tra email thường xuyên để không bỏ qua câu trả lời của chúng tôi.")</script>';
}
else 
{
echo "<script>alert('Lỗi. Vui lòng nhập lại');</script>";  
}

}
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Hệ thống quản lý ngân hàng máu</title>
	<!-- Meta tag Keywords -->
	
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!--// Meta tag Keywords -->

	<!-- Custom-Files -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Bootstrap-Core-CSS -->
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<!-- Style-CSS -->
	<link rel="stylesheet" href="css/fontawesome-all.css">
	<!-- Font-Awesome-Icons-CSS -->
	<!-- //Custom-Files -->

	<!-- Web-Fonts -->
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
	    rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
	    rel="stylesheet">
	<!-- //Web-Fonts -->

</head>

<body>
	<?php include('includes/header.php');?>

	<!-- banner 2 -->
	<div class="inner-banner-w3ls">
		<div class="container">

		</div>
		<!-- //banner 2 -->
	</div>
	<!-- page details -->
	<div class="breadcrumb-agile">
		<div aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="index.php">Trang chủ</a>
				</li>
				<li class="breadcrumb-item active" aria-current="page">Liên hệ</li>
			</ol>
		</div>
	</div>
	<!-- //page details -->

	<!-- contact -->
	<div class="agileits-contact py-5">
		<div class="py-xl-5 py-lg-3">
			<div class="w3ls-titles text-center mb-5">
				<h3 class="title">Liên hệ</h3>
				<span>
					<i class="fas fa-user-md"></i>
				</span>
				<p class="mt-2"> Hiến máu là biểu hiện của lòng nhân ái và trách nhiệm với xã hội, nơi chúng ta có thể lan tỏa sự quan tâm, chăm sóc lẫn nhau.</p>
			</div>
			<div class="d-flex">
				<div class="col-lg-5 w3_agileits-contact-left">
				</div>
				<div class="col-lg-7 contact-right-w3l">
					<h5 class="title-w3 text-center mb-5">Điền thông tin</h5>
					<form action="#" method="post">
						<div class="d-flex space-d-flex">
							<div class="form-group grid-inputs">
								 <input type="text" class="form-control" id="name" name="fullname" placeholder="Vui lòng điền tên của bạn.">
							</div>
							<div class="form-group grid-inputs">
								<input type="tel" class="form-control" id="phone" name="contactno"  placeholder="Vui lòng điền số điện thoại.">
							</div>
						</div>
						<div class="form-group">
							<input type="email" class="form-control" id="email" name="email" required placeholder="Vui lòng điền email.">
						</div>
						

						<div class="form-group">
							<textarea rows="10" cols="100" class="form-control" id="message" name="message" placeholder="Hãy để lại lời nhắn" maxlength="999" style="resize:none"></textarea>
						</div>
						<div class="form-group">
							<input type="submit" value="Gửi yêu cầu" name="send">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- //contact -->

	


	<?php include('includes/footer.php');?>

	<!-- Js files -->
	<!-- JavaScript -->
	<script src="js/jquery-2.2.3.min.js"></script>
	<!-- Default-JavaScript-File -->

	<!-- banner slider -->
	<script src="js/responsiveslides.min.js"></script>
	<script>
		$(function () {
			$("#slider4").responsiveSlides({
				auto: true,
				pager: true,
				nav: true,
				speed: 1000,
				namespace: "callbacks",
				before: function () {
					$('.events').append("<li>before event fired.</li>");
				},
				after: function () {
					$('.events').append("<li>after event fired.</li>");
				}
			});
		});
	</script>
	<!-- //banner slider -->

	<!-- fixed navigation -->
	<script src="js/fixed-nav.js"></script>
	<!-- //fixed navigation -->

	<!-- smooth scrolling -->
	<script src="js/SmoothScroll.min.js"></script>
	<!-- move-top -->
	<script src="js/move-top.js"></script>
	<!-- easing -->
	<script src="js/easing.js"></script>
	<!--  necessary snippets for few javascript files -->
	<script src="js/medic.js"></script>

	<script src="js/bootstrap.js"></script>
	<!-- Necessary-JavaScript-File-For-Bootstrap -->

	<!-- //Js files -->

</body>

</html>