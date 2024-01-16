<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_POST['send']))
  {
    $cid=$_GET['cid'];
$name=$_POST['fullname'];
$email=$_POST['email'];
$contactno=$_POST['contactno'];
$brf=$_POST['brf'];
$message=$_POST['message'];
$sql="INSERT INTO  tblbloodrequirer(BloodDonarID,name,EmailId,ContactNumber,BloodRequirefor,Message) VALUES(:cid,:name,:email,:contactno,:brf,:message)";
$query = $dbh->prepare($sql);
$query->bindParam(':cid',$cid,PDO::PARAM_STR);
$query->bindParam(':name',$name,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':contactno',$contactno,PDO::PARAM_STR);
$query->bindParam(':brf',$brf,PDO::PARAM_STR);
$query->bindParam(':message',$message,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{

echo '<script>alert("Yêu cầu đã được gửi. Chúng tôi sẽ sớm liên lạc lại với bạn.")</script>';
}
else 
{
echo "<script>alert('Có gì đó đã sai. Vui lòng thử lại.');</script>";  
}

}
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Hệ thống quản lý ngân hàng máu </title>
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
                <li class="breadcrumb-item active" aria-current="page">Yêu cầu nhận máu cho người thân</li>
            </ol>
        </div>
    </div>
    <!-- //page details -->

    <!-- contact -->
    <div class="agileits-contact py-5">
        <div class="py-xl-5 py-lg-3">
            <div class="w3ls-titles text-center mb-5">
                <h3 class="title">Yêu cầu nhận máu</h3>
                <span>
                    <i class="fas fa-user-md"></i>
                </span>
            </div>
            <div class="d-flex">
                <div class="col-lg-5 w3_agileits-contact-left">
                </div>
                <div class="col-lg-7 contact-right-w3l">
                    <h5 class="title-w3 text-center mb-5"><h5 class="title-w3 text-center mb-5">Điền vào mẫu </h5></h5>
                    <form action="#" method="post">
                        <div class="d-flex space-d-flex">
                            <div class="form-group grid-inputs">
                                <label for="recipient-name" class="col-form-label">Tên của bạn</label>
                                 <input type="text" class="form-control" id="name" name="fullname" placeholder="Vui lòng nhập họ tên.">
                            </div>
                            <div class="form-group grid-inputs">
                                <label for="recipient-name" class="col-form-label">Số điện thoại</label>
                                <input type="tel" class="form-control" id="phone" name="contactno"  placeholder="Vui lòng nhập số điện thoại.">
                            </div>
                        </div>
                        
                        <div class="d-flex space-d-flex">
                            <div class="form-group grid-inputs">
                                <label for="recipient-name" class="col-form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required placeholder="Vui lòng nhập email.">
                            </div>
                            <div class="form-group grid-inputs">
                                <label for="recipient-name" class="col-form-label">Người nhận máu</label>
                                <select  class="form-control" id="phone" name="brf">
                                    <option value="">-----------</option>
                                    <option value="Ba">Ba</option>
                                    <option value="Mẹ">Mẹ</option>
                                    <option value=">Anh trai / Em trai">Anh trai / Em trai</option>
                                    <option value="Chị gái / Em giá">Chị gái / Em giá</option>
                                    <option value="Khác">Khác</option>
                                    </select>
                            </div>
                        </div>

                        <div class="form-group">
                             <label for="recipient-name" class="col-form-label">Lời nhắn</label>
                            <textarea rows="10" cols="100" class="form-control" id="message" name="message" placeholder="Vui lòng nhập lời nhắn." maxlength="999" style="resize:none"></textarea>
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
                    $('.events').append("<li>Trước khi cập nhật.</li>");
                },
                after: function () {
                    $('.events').append("<li>Sau khi cập nhật</li>");
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