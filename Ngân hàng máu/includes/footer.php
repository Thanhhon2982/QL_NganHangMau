<footer>
    <div class="w3ls-footer-grids pt-sm-4 pt-3">
      <div class="container py-xl-5 py-lg-3">
        <div class="row">
          <div class="col-md-4 w3l-footer">
            <h2 class="mb-sm-3 mb-2">
              <a href="index.php" class="text-white font-italic font-weight-bold">
                <span>Hệ thống quản lí </span>ngân hàng máu

                <i class="fas fa-syringe ml-2"></i>
              </a>
            </h2>
            <p>Chào mừng bạn đến với Hệ thống quản lý ngân hàng máu , nơi mà sự kết nối giữa người hiến máu và những người
               cần máu trở nên dễ dàng hơn bao giờ hết! Chúng tôi là hệ thống quản lý ngân hàng máu hiện đại, 
               nhằm mục đích tối ưu hóa quy trình quyên góp máu, giúp cải thiện và duy trì nguồn cung máu an toàn và đủ đối với cộng đồng.</p>
          </div>
          <div class="col-md-4 w3l-footer my-md-0 my-4">
            <h3 class="mb-sm-3 mb-2 text-white">Thông tin liên hệ</h3>
            <ul class="list-unstyled">
              <?php 
$pagetype="contactus";
$sql = "SELECT * from tblcontactusinfo";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{ ?>
              <li>
                <i class="fas fa-location-arrow float-left"></i>
                <p class="ml-4">
                  <span><?php  echo $result->Address; ?>. </p>
                <div class="clearfix"></div>
              </li>
              <li class="my-3">
                <i class="fas fa-phone float-left"></i>
                <p class="ml-4"><?php  echo $result->ContactNo; ?></p>
                <div class="clearfix"></div>
              </li>
              <li>
                <i class="far fa-envelope-open float-left"></i>
                <a href="mailto:info@example.com" class="ml-3"><?php  echo $result->EmailId; ?></a>
                <div class="clearfix"></div>
              </li>
              <li >
                <a  href="https://www.facebook.com/NTH.2982">
                <i style="font-size: 30px;color: #0866ff;" class="fab fa-facebook-f"></i>
                </a>
                                
                <a href="https://github.com/Thanhhon2982">
                <i style="font-size: 30px;margin: 0 20px;color: black;" class="fab fa-github"></i>
                </a>
                </li>
                          
            <?php } } ?></ul>
          </div>
          <div class="col-md-4 w3l-footer">
            <h3 class="mb-sm-3 mb-2 text-white"></h3>
            <div class="nav-w3-l">
              <ul class="list-unstyled">
                <li>
                  <a href="index.php">Trang chủ</a>
                </li>
                <li class="mt-2">
                  <a href="about.php">Giới thiệu</a>
                </li>
                <li class="mt-2">
                  <a href="contact.php">Liên hệ</a>
                </li>
            
              </ul>
            </div>
          </div>
        </div>
        <div class="border-top mt-5 pt-lg-4 pt-3 pb-lg-0 pb-3 text-center">
          <p class="copy-right-grids mt-lg-1">©  Design by Thanh Hơn
           
          </p>
        </div>
      </div>
    </div>
  </footer>
  <!-- //footer -->