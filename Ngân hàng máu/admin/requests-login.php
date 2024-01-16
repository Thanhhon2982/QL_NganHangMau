<?php
session_start();
error_reporting(0);
error_reporting(E_ALL);
ini_set('display_errors', 1);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
	if (isset($_POST['submit'])) {
		require('fpdf/fpdf.php');
	
		// Tạo đối tượng PDF mới
		$pdf = new FPDF();
		$pdf->AddPage();
		$pdf->SetFont('Arial', 'B', 12);
		$pdf->Cell(40, 10, 'Login info');
		$pdf->Ln(10);
		$sql = "SELECT * FROM login_history";
		$query = $dbh->prepare($sql);
		$query->execute();
		$results = $query->fetchAll(PDO::FETCH_OBJ);
		if ($query->rowCount() > 0) {
			// Đặt chiều rộng của cột
			$colWidths = array(20, 80, 50, 40);
			
			// Hàng tiêu đề
			$pdf->Cell($colWidths[0], 10, 'ID', 1);
			$pdf->Cell($colWidths[1], 10, 'User ID', 1);
			$pdf->Cell($colWidths[2], 10, 'Login Time', 1);
			$pdf->Cell($colWidths[3], 10, 'Login Date', 1);
			$pdf->Ln();
		
			// Các hàng dữ liệu
			$pdf->SetFont('Arial', '', 12);
			foreach ($results as $row) {
				$pdf->Cell($colWidths[0], 10, htmlentities($row->id), 1);
				$pdf->Cell($colWidths[1], 10, htmlentities($row->user_id), 1);
				$pdf->Cell($colWidths[2], 10, htmlentities($row->login_time), 1);
				$pdf->Cell($colWidths[3], 10, htmlentities($row->login_date), 1);
				$pdf->Ln();
			}
		}
		
	
		// Lưu PDF vào một tệp tạm thời
		$tempFilename = 'temp.pdf';
		$pdf->Output($tempFilename, 'F');
	
		// Thiết z	
		header('Content-Description: File Transfer');
		header('Content-Type: application/pdf');
		header('Content-Disposition: attachment; filename="downloaded_file.pdf"');
		header('Expires: 0');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');
		header('Content-Length: ' . filesize($tempFilename));
	
		// Đọc và xuất nội dung của file
		readfile($tempFilename);
	
		// Xóa tệp tạm thời
		unlink($tempFilename);
		exit;
		
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
	<meta name="theme-color" content="#3e454c">
	
	<title>BBDMS | Donor List  </title>

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
  <style>
		.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
		</style>

</head>

<body>
<body>
    <?php include('includes/header.php');?>
    <div class="ts-main-content">
        <?php include('includes/leftbar.php');?>
        <div class="content-wrapper">
            <div class="container-fluid">
                <div class="col-md-12">
                    <h3> History login</h3>
                    <hr />
                    <!-- Zero Configuration Table -->
                    <div class="panel panel-default">
                        <div class="panel-heading" >Login info</div>
                        <div  style="margin-top: 15px;margin-left: 15px;">
                            <form action="#" method="post">
                                <button  name="submit" type="submit">In PDF</button>
                            </form>
                        </div>
                        <div class="panel-body">
                            <table border="1" class="table table-responsive" id="login-history-table">
                            <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>Email</th>
                                            <th>Time login</th>
                                            <th>Date login</th>
                                        </tr>
                                    </thead>
                                   
                                    
                                <tbody>
                                    <?php
                                    $sql = "SELECT * FROM login_history";
                                    $id = 1;
                                    $day = '';
                                    $query = $dbh->prepare($sql);
                                    $query->execute();
                                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                                    if($query->rowCount() > 0) {
                                        foreach($results as $row) { ?>
                                            <tr>
                                                <td><?php  echo htmlentities($row->id);?></td>
                                                <td><?php  echo htmlentities($row->user_id);?></td>
                                                <td><?php  echo htmlentities($row->login_time);?></td>
                                                <td><?php  echo htmlentities($row->login_date);?></td>
                                            </tr>
                                    <?php }} ?>
                                </tbody>
                            </table>
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
    <!-- Initialize DataTable -->
    <script>
        $(document).ready(function() {
            $('#login-history-table').DataTable();
        });
    </script>
</body>
</html>
<?php } ?>

