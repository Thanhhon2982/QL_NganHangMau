<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
	?>
<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	
	<title>Bảng điều khiển</title>

	<!-- Font awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="css/style.css">
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>

<body>
<?php include('includes/header.php');?>

	<div class="ts-main-content">
<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">

						<h2 class="page-title">Bảng điều khiển</h2>
						
						<div class="row">
							<div class="col-md-12">
								<div class="row">	
								
									<div class="col-md-4">
										<div class="panel panel-default">
											<div class="panel-body bk-success text-light">
												<div class="stat-panel text-center">
												<?php 
$sql1 ="SELECT id from tblblooddonars ";
$query1 = $dbh -> prepare($sql1);;
$query1->execute();
$results1=$query1->fetchAll(PDO::FETCH_OBJ);
$regbd=$query1->rowCount();
?>
													<div class="stat-panel-number h1 "><?php echo htmlentities($regbd);?></div>
													<div class="stat-panel-title text-uppercase">Người hiến máu</div>
												</div>
											</div>
											<a href="donor-list.php" class="block-anchor panel-footer text-center">Thông tin chi tiết &nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
									<div class="col-md-4">
										<div class="panel panel-default">
											<div class="panel-body bk-warning text-light">
												<div class="stat-panel text-center">
												<?php 
$sql6 ="SELECT id from tblcontactusquery ";
$query6 = $dbh -> prepare($sql6);;
$query6->execute();
$results6=$query6->fetchAll(PDO::FETCH_OBJ);
$query=$query6->rowCount();
?>
													<div class="stat-panel-number h1 "><?php echo htmlentities($query);?></div>
													<div class="stat-panel-title text-uppercase">Số tin nhắn khách hàng</div>
												</div>
											</div>
											<a href="manage-conactusquery.php" class="block-anchor panel-footer text-center">Thông tin chi tiết &nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
<!------------------------>
			<div class="col-md-4">
										<div class="panel panel-danger">
											<div class="panel-body bk-info text-light">
												<div class="stat-panel text-center">
												<?php 
$sql6 ="SELECT ID  from tblbloodrequirer ";
$query6 = $dbh -> prepare($sql6);;
$query6->execute();
$results6=$query6->fetchAll(PDO::FETCH_OBJ);
$totalreuqests=$query6->rowCount();
?>
													<div class="stat-panel-number h1 "><?php echo htmlentities($totalreuqests);?></div>
													<div class="stat-panel-title text-uppercase">Tổng số lượng yêu cầu nhận máu</div>
												</div>
											</div>
											<a href="requests-received.php" class="block-anchor panel-footer text-center">Thông tin chi tiêt &nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
									<div class="col-md-4">
										<div class="panel panel-danger">
											<div class="panel-body bk-primary text-light">
												<div class="stat-panel text-center">
<?php 
$current_date = date("Y-m-d");
$count_query = "SELECT COUNT(DISTINCT user_id) AS user_count FROM login_history WHERE login_date = :current_date";
$query = $dbh->prepare($count_query);
$query->bindParam(':current_date', $current_date, PDO::PARAM_STR);
$query->execute();
$result = $query->fetch(PDO::FETCH_ASSOC);
$user_count = $result['user_count'];
?>
													<div class="stat-panel-number h1 "><?php echo htmlentities($user_count);?></div>
													<div class="stat-panel-title text-uppercase">Số lượng người dùng đã đăng nhập hôm nay</div>
												</div>
											</div>
											<a href="requests-login.php" class="block-anchor panel-footer text-center">Thông tin chi tiết &nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>









							
								</div>
							</div>
							
							<div class="chart-container col-md-9" >
    <canvas id="bloodGroupChart"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<?php
$query = "SELECT BloodGroup, FLOOR(AVG(Age)) as AverageAge, COUNT(*) as Count FROM tblblooddonars GROUP BY BloodGroup";
$stmt = $dbh->prepare($query);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Tính tổng số người hiện có
$totalDonors = array_sum(array_column($result, 'Count'));

// Trích xuất dữ liệu cho biểu đồ
$labels = [];
$dataAge = [];
$dataCount = [];

foreach ($result as $row) {
    $labels[] = $row['BloodGroup'];
    $dataAge[] = $row['AverageAge'];
    $percentage = ($row['Count'] / $totalDonors) * 100;
    $dataCount[] = round($percentage, 2);
}
?>								



<script>
    var ctx = document.getElementById('bloodGroupChart').getContext('2d');
    var bloodGroupChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: <?php echo json_encode($labels, JSON_UNESCAPED_UNICODE); ?>,
            datasets: [
                {
                    label: 'Độ tuổi trung bình',
                    data: <?php echo json_encode($dataAge); ?>,
                    fill: false,
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 2
                },
                {
                    label: 'Nhóm máu',
                    data: <?php echo json_encode($dataCount); ?>,
                    fill: false,
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 2
                }
            ]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    max: 100,
                    title: {
                        display: true,
                        text: 'Phần trăm'
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Nhóm Máu'
                    },
                    
                }
            },
            
        }
    });
</script>

  

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
	

	<script>
		
	window.onload = function(){
    
		// Line chart from swirlData for dashReport
		var ctx = document.getElementById("dashReport").getContext("2d");
		window.myLine = new Chart(ctx).Line(swirlData, {
			responsive: true,
			scaleShowVerticalLines: false,
			scaleBeginAtZero : true,
			multiTooltipTemplate: "<%if (label){%><%=label%>: <%}%><%= value %>",
		}); 
		
		// Pie Chart from doughutData
		var doctx = document.getElementById("chart-area3").getContext("2d");
		window.myDoughnut = new Chart(doctx).Pie(doughnutData, {responsive : true});

		// Dougnut Chart from doughnutData
		var doctx = document.getElementById("chart-area4").getContext("2d");
		window.myDoughnut = new Chart(doctx).Doughnut(doughnutData, {responsive : true});

	}
	</script>
</body>
</html>
<?php } ?>