	<nav class="ts-sidebar">
			<ul class="ts-sidebar-menu">
			
				<li class="ts-label">Main</li>
				<li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Bảng điều khiển</a></li>
			
<li><a href="#"><i class="fa fa-files-o"></i> Nhóm máu</a>
<ul>
<li><a href="add-bloodgroup.php">Thêm nhóm máu</a></li>
<li><a href="manage-bloodgroup.php">Quản lí nhóm máu</a></li>
</ul>
</li>


<li><a href="#"><i class="fa fa-files-o"></i> Danh sách</a>
<ul>
<?php

$sqlCount = "SELECT COUNT(*) as count FROM tblblooddonars WHERE status=0";
$queryCount = $dbh->prepare($sqlCount);
$queryCount->execute();
$countResult = $queryCount->fetch(PDO::FETCH_ASSOC);
$CountDonor = $countResult['count'];

?>

<?php if ($CountDonor > 0): ?>
    <li><a href="Approve-blood-donor.php"><i class="fa fa-users"></i>Phê duyệt người mới (<?php echo $CountDonor; ?>)</a></li>
<?php  ?>
<?php else: ?>
    <li><a href="Approve-blood-donor.php"><i class="fa fa-users"></i>Phê duyệt người mới </a></li>
<?php endif; ?>
				<li><a href="donor-list.php"><i class="fa fa-users"></i>Danh sách người hiến máu</a></li>
				</ul>
</li>
				<li><a href="manage-conactusquery.php"><i class="fa fa-desktop"></i>Quản lí tin nhắn từ khách hàng</a></li>
			<li><a href="manage-pages.php"><i class="fa fa-files-o"></i>Quản lí trang</a></li>
			<li><a href="update-contactinfo.php"><i class="fa fa-files-o"></i>Cập nhật thông tin liên hệ</a></li>
			<li><a href="blood-requests.php"><i class="fa fa-users"></i>Thông tin yêu cầu</a></li>
<li><a href="request-received-bydonar.php"><i class="fa fa-search"></i>Tìm yêu cầu</a></li>

			</ul>
		</nav>
	