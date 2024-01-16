<?php
session_start();
error_reporting(0);
include('includes/config.php');

?>
<div class="brand clearfix">
	<a href="dashboard.php" style="font-size: 20px; padding-top:1%; color:#fff">Hệ thống quản lý ngân hàng máu </a>  
		<span class="menu-btn"><i class="fa fa-bars"></i></span>
		<ul class="ts-profile-nav">
			
			<li class="ts-account">
            <?php

$sql="SELECT * from  tbladmin";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
				<a href="#"><img src="img/<?php echo $row->Avatar?>" class="ts-avatar hidden-side" alt=""> Tài khoản <i class="fa fa-angle-down hidden-side"></i></a>
				<ul><li><a href="profile.php">Thông tin</a></li>
					<li><a href="change-password.php">Đổi mật khẩu</a></li>
					<li><a href="logout.php">Đăng xuất</a></li>
				</ul>
                <?php }} ?>
			</li>
		</ul>
	</div>
