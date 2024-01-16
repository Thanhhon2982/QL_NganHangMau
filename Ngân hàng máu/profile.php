
<?php 
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['bbdmsdid']==0)) {
  header('location:logout.php');
  } else{

 if(isset($_POST['update']))
  {
    $uid=$_SESSION['bbdmsdid'];
    $name=$_POST['fullname'];
    $mno=$_POST['mobileno']; 
    $emailid=$_POST['emailid'];
    $age=$_POST['age']; 
    $gender=$_POST['gender'];
    $bloodgroup=$_POST['bloodgroup']; 
    $address=$_POST['address'];
    $message=$_POST['message']; 
    
	$fileInput = $_FILES['fileInput'];
    // Thông tin cơ bản về tệp
    $fileName = $fileInput['name'];
    $fileType = $fileInput['type'];
    $fileSize = $fileInput['size'];
    $fileTmpName = $fileInput['tmp_name'];
    $fileError = $fileInput['error'];
    if (empty($_FILES["fileInput"]["name"])) {
    $sql="update tblblooddonars set FullName=:name,MobileNumber=:mno, Age=:age,Gender=:gender,BloodGroup=:bloodgroup,Address=:address,Message=:message where id=:uid";
    $query = $dbh->prepare($sql);
    $query->bindParam(':name',$name,PDO::PARAM_STR);
    $query->bindParam(':mno',$mno,PDO::PARAM_STR);
    $query->bindParam(':age',$age,PDO::PARAM_STR);
    $query->bindParam(':gender',$gender,PDO::PARAM_STR);
    $query->bindParam(':bloodgroup',$bloodgroup,PDO::PARAM_STR);
    $query->bindParam(':address',$address,PDO::PARAM_STR);
    $query->bindParam(':message',$message,PDO::PARAM_STR);
    $query->bindParam(':uid',$uid,PDO::PARAM_STR);
    $query->execute();
    }  else {
    $sql="update tblblooddonars set FullName=:name,MobileNumber=:mno, Age=:age,Gender=:gender,BloodGroup=:bloodgroup,Address=:address,Message=:message, img =:img where id=:uid";
    $query = $dbh->prepare($sql);
    $query->bindParam(':name',$name,PDO::PARAM_STR);
    $query->bindParam(':mno',$mno,PDO::PARAM_STR);
    $query->bindParam(':age',$age,PDO::PARAM_STR);
    $query->bindParam(':gender',$gender,PDO::PARAM_STR);
    $query->bindParam(':bloodgroup',$bloodgroup,PDO::PARAM_STR);
    $query->bindParam(':address',$address,PDO::PARAM_STR);
    $query->bindParam(':message',$message,PDO::PARAM_STR);
    $query->bindParam(':uid',$uid,PDO::PARAM_STR);
	$query->bindParam(':img',$fileName,PDO::PARAM_STR);
    $query->execute();
    $uploadDir = 'images/';
    $targetPath = $uploadDir . $fileName;
    move_uploaded_file($fileTmpName, $targetPath);
       
    echo '<script>alert("Thông tin của bạn đã được cập nhật")</script>';
	echo "<script>window.location.href ='profile.php'</script>";

    }
        
  }

  ?>
<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Hệ thống quản lý ngân hàng máu</title>
	
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
				<li class="breadcrumb-item active" aria-current="page">Thông tin cá nhân</li>
			</ol>
		</div>
	</div>
	<!-- //page details -->

	<!-- contact -->
	<div class="appointment py-5">
		<div class="py-xl-5 py-lg-3">
			<div class="w3ls-titles text-center mb-5">
				<h3 class="title">Thông tin cá nhân</h3>
				<span>
					<i class="fas fa-user-md"></i>
				</span>
			</div>
			<?php
$uid=$_SESSION['bbdmsdid'];
$sql="SELECT * from  tblblooddonars where id=:uid"; // Câu lệnh sql
$query = $dbh -> prepare($sql); // kết nối tới sql
$query->bindParam(':uid',$uid,PDO::PARAM_STR); // Truyền dữ liệu
$query->execute(); // Thực hiện câu lệnh sql
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
			<div class="d-flex">
			
				
			
				<div class="contact-right-w3l appoint-form" style="width: 100%;">
					
					<form method="post" enctype="multipart/form-data">
                    <div  style="float: left;margin: 0 50px;" >
						<img style="border-style: solid;border-radius: 50%;" height="400px" width="350px" src="images/<?php echo $row->img?> "><br>
						<input style=" margin:20px 40px;" type="file" name="fileInput" id="fileInput" ></input>
				    </div>
                    <div class="profile-ctr">
						<div class="form-group">
							<label for="recipient-name" class="col-form-label">Họ và tên</label>
							<input type="text" class="form-control" name="fullname" id="fullname" value="<?php  echo $row->FullName;?>">
						</div>
						<div class="form-group">
							<label for="recipient-phone" class="col-form-label">Số điện thoại</label>
							<input type="text" class="form-control" name="mobileno" id="mobileno" required="true" maxlength="10" pattern="[0-9]+" value="<?php  echo $row->MobileNumber;?>">
						</div>
						<div class="form-group">
							<label for="recipient-phone" class="col-form-label">Email <span style="color:red; font-size:10px;">(Không thể đổi)</span></label>
							<input type="email" name="emailid" class="form-control" value="<?php  echo $row->EmailId;?>" readonly>
						</div>
						<div class="form-group">
							<label for="recipient-phone" class="col-form-label">Tuổi</label>
							<input type="text" class="form-control" name="age" id="age" required="" value="<?php  echo $row->Age;?>">
						</div>
						<div class="form-group">
							<label for="datepicker" class="col-form-label">Giới tính</label>
							<select required="" class="form-control" name="gender">
								<option value="<?php  echo $row->Gender;?>"><?php  echo $row->Gender;?></option>
<option value="Nam">Nam</option>
<option value="Nữ">Nữ</option>
							</select>
						</div>
						<div class="form-group">
							<label for="datepicker" class="col-form-label">Nhóm máu</label>
							<select name="bloodgroup" class="form-control" required>
								<option value="<?php  echo $row->BloodGroup;?>"><?php  echo $row->BloodGroup;?></option>
<?php $sql = "SELECT * from  tblbloodgroup ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>  
<option value="<?php echo htmlentities($result->BloodGroup);?>"><?php echo htmlentities($result->BloodGroup);?></option>
<?php }} ?>
</select>
						</div>
						<div class="form-group">
							<label for="datepicker" class="col-form-label">Address</label>
							<input type="text" class="form-control" name="address" id="address" required="true" value="<?php  echo $row->Address;?>">
						</div>
						<div class="form-group">
							<label for="datepicker" class="col-form-label">Message</label>
							<textarea class="form-control" name="message" required><?php  echo $row->Message;?></textarea>
						</div>
						
						<?php $cnt=$cnt+1;}} ?>
						<input type="submit" value="Update" name="update" class="btn_apt">
                </div>
					</form>
				</div>
				<div class="clerafix"></div>
			</div>
		</div>
	</div>
	<!-- //contact -->

	<?php include('includes/footer.php');?>
	<!-- Js files -->
	<!-- JavaScript -->
	<script src="js/jquery-2.2.3.min.js"></script>
	<!-- Default-JavaScript-File -->

	<!--start-date-piker-->
	<link rel="stylesheet" href="css/jquery-ui.css" />
	<script src="js/jquery-ui.js"></script>
	<script>
		$(function () {
			$("#datepicker,#datepicker1").datepicker();
		});
	</script>
	<!-- //End-date-piker -->

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

</html><?php } ?>