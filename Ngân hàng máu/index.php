
<?php
error_reporting(0);
include('includes/config.php');
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

	<!-- banner -->
	<div class="slider">
		<div class="callbacks_container">
			<ul class="rslides callbacks callbacks1" id="slider4">
				<li>
					<div class="banner-top1">
						<div class="banner-info_agile_w3ls">
							<div class="container">
								<h3>Mỗi lần hiến máu, bạn không chỉ cứu sống một người, mà còn trao đi sự hi vọng và tình yêu thương.
									
								</h3>
								
							</div>
						</div>
					</div>
				</li>
				<li>
					<div class="banner-top2">
						<div class="banner-info_agile_w3ls">
							<div class="container">
								<h3> Hiến máu không làm bạn mất đi gì, nhưng nó có thể mang lại cuộc sống mới cho người khác.
									
								</h3>
						
							</div>
						</div>
					</div>
				</li>
				<li>
					<div class="banner-top3">
						<div class="banner-info_agile_w3ls">
							<div class="container">
						<!-- 		<h3>"Sometimes money cannot save life
									<span>but donated blood can</span>
								</h3> -->
				
							</div>
						</div>
					</div>
				</li>
			</ul>
		</div>
	</div>
	<!-- //banner -->
	<div class="clearfix"></div>

	
	<!-- //banner bottom -->
	<!-- blog -->
	<div class="blog-w3ls py-xl-5" id="blog">
  <div class="container py-xl-5 py-lg-3">
    <div class="w3ls-titles text-center mb-5">
      <h3 class="title text-white">Danh sách nhà tài trợ</h3>
      <span><i class="fas fa-user-md text-white"></i></span>
    </div>
    <div class="row package-grids mt-5" id="sponsorCarousel">
     

      <?php
      $status = 1;
      $pageSize = 6; // Số lượng nhà tài trợ mỗi trang
      $page = isset($_GET['page']) ? $_GET['page'] : 1; // Lấy số trang từ tham số trên URL
      $startFrom = ($page - 1) * $pageSize;

      $sql = "SELECT * FROM tblblooddonars WHERE status = :status  LIMIT :start, :pageSize";
      $query = $dbh->prepare($sql);
      $query->bindParam(':status', $status, PDO::PARAM_STR);
      $query->bindParam(':start', $startFrom, PDO::PARAM_INT);
      $query->bindParam(':pageSize', $pageSize, PDO::PARAM_INT);
      $query->execute();
      $results = $query->fetchAll(PDO::FETCH_OBJ);

      foreach ($results as $result) { ?>
        <div class="col-md-4 pricing" style="margin-top:2%;">
          <div class="price-top">
            <img src="images/<?php
            if (($result->img) == null) {
              echo 'blood-donor.jpg';
            } else {
              echo $result->img;
            }
            ?>" alt="Blood Donor" style="border: 1px #000 solid; width: 435px; height: 340px;" class="img-fluid" />
            <h3><?php echo htmlentities($result->FullName);?></h3>
          </div>
          <div class="price-bottom p-4">
            <h4 class="text-dark mb-3">Giới tính: <?php echo htmlentities($result->Gender);?></h4>
            <p class="card-text"><b>Nhóm máu :</b> <?php echo htmlentities($result->BloodGroup);?></p>
            <a class="btn btn-primary" style="color: #fff"
               href="contact-blood.php?cid=<?php echo $result->id;?>">Gửi yêu cầu</a>
          </div>
        </div>
      <?php } ?>
    </div>
    <div class="pagination">
      <?php
      // Tính toán số trang
      $sql = "SELECT COUNT(*) AS total FROM tblblooddonars WHERE status = :status";
      $query = $dbh->prepare($sql);
      $query->bindParam(':status', $status, PDO::PARAM_STR);
      $query->execute();
      $result = $query->fetch(PDO::FETCH_ASSOC);
      $totalPages = ceil($result['total'] / $pageSize);

      // Hiển thị nút trang
      for ($i = 1; $i <= $totalPages; $i++) {
        $activeClass = ($i == $page) ? 'active' : '';
        echo '<a class="' . $activeClass . '" href="?page=' . $i . '">' . $i . '</a>';
      }
      ?>
    </div>
  </div>
</div>
	<!-- //blog -->
	<script src="https://www.gstatic.com/dialogflow-console/fast/messenger/bootstrap.js?v=1"></script>
<df-messenger
  chat-title="AI_Bot_Chat"
  agent-id="9d55b0a2-85fa-472f-824b-56996fe6b904"
  language-code="vi"
></df-messenger>
	<!-- treatments -->
	<div class="screen-w3ls py-5">
		<div class="container py-xl-5 py-lg-3">
			<div class="w3ls-titles text-center mb-5">
				<h3 class="title">Nhóm máu</h3>
				<span>
					<i class="fas fa-user-md"></i>
				</span>
				<p class="mt-2">Các nhóm máu cơ bản bảo gồm các nhóm máu sau</p>
			</div>
			<div class="row">
            <div class="col-lg-6">
               
                <ul>
                
                
<li>A</li>
<li>B </li>
<li>O </li>
<li>AB</li>
                </ul>
               

    <b>Chế độ ăn uống lành mạnh có thể đóng góp quan trọng vào quá trình hiến máu và giữ cho cơ thể bạn ở trạng thái tốt nhất. Dưới đây là một số thực phẩm được khuyến khích trước khi hiến máu:</b>

    <ul style="margin-left: 40px;">
        <li><strong>Thực phẩm giàu sắt:</strong> Thịt đỏ, thịt gia cầm, cá hồi, thịt heo.</li>
        <li><strong>Thực phẩm giàu vitamin C:</strong> Cam, dâu, kiwi, quýt, dưa hấu.</li>
        <li><strong>Thực phẩm giàu axit folic:</strong> Rau xanh như rau cải, cần tây, bóccoli.</li>
        <li><strong>Thực phẩm giàu năng lượng:</strong> Các loại hạt như hạt lanh, hạt óc chó, hạt hạnh nhân.</li>
        <li><strong>Thực phẩm giàu protein:</strong> Thịt, cá, trứng, đậu, sữa, yogurt.</li>
        <li><strong>Thực phẩm giàu nước:</strong> Trái cây như dưa hấu, cam, dâu.</li>
        <li><strong>Thực phẩm hạn chế chất béo và đường:</strong> Tránh thức ăn nhanh, thực phẩm chế biến sẵn, đồ uống có đường cao.</li>
        <li><strong>Nước:</strong> Uống đủ nước để duy trì sự cân bằng nước trong cơ thể.</li>
    </ul>

    <b style="font-size: large;"><em>Trước khi thực hiện bất kỳ thay đổi nào trong chế độ ăn uống hoặc quyết định hiến máu, hãy thảo luận với bác sĩ hoặc chuyên gia dinh dưỡng. Họ có thể cung cấp lời khuyên dựa trên tình trạng sức khỏe cụ thể của bạn.</em></b>
            </div>
            <div class="col-lg-6">
                <img class="img-fluid rounded" src="images/blood-help.jpg" alt="">
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-8">
            <h4 style="padding-top: 30px;">Một số thông tin về các nhóm máu</h4>
               
				Loại máu phổ biến nhất là O, tiếp theo là loại A.

Các cá nhân loại O thường được gọi là "các nhà tài trợ phổ biến" vì máu của họ có thể được truyền vào những người có bất kỳ nhóm máu nào. Những người có máu AB được gọi là "người nhận phổ biến" vì họ có thể nhận được máu thuộc bất kỳ loại nào.
            </div>
            <div class="col-md-4" style="padding-top: 30px;"> 
    
                <a class="btn btn-lg btn-secondary btn-block login-button ml-lg-5 mt-lg-0 mt-4 mb-lg-0 mb-3"href="login.php" > Hãy trở thành nhà tài trợ</a>
            </div>
        </div>
		</div>
	</div>
	<!-- //treatments -->

	<!-- footer -->
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