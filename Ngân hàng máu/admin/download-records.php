<?php
session_start();
session_regenerate_id(true);
include('includes/config.php');

if (strlen($_SESSION['alogin']) == 0) {
    header("Location: index.php");
    exit; // Nếu chưa đăng nhặp thì dừng thực thi
}

$filename = "Donor list";

// Retrieve data from the database
$sql = "SELECT * FROM tblblooddonars";
$query = $dbh->prepare($sql);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_OBJ);

if ($query->rowCount() > 0) {
    // Set Excel export headers before any output
    header("Content-type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=" . $filename . "-report.xls");
    header("Pragma: no-cache");
    header("Expires: 0");

    // Output the HTML content
    ?>
    <table border="1">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Mobile No</th>
                <th>Email</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Blood Group</th>
                <th>Address</th>
                <th>Message</th>
                <th>Posting Date</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $cnt = 1;
            foreach ($results as $result) {
                echo '<tr>';
                echo '<td>' . $cnt . '</td>';
                echo '<td>' . $result->FullName . '</td>';
                echo '<td>' . $result->MobileNumber . '</td>';
                echo '<td>' . $result->EmailId . '</td>';
                echo '<td>' . $result->Gender . '</td>';
                echo '<td>' . $result->Age . '</td>';
                echo '<td>' . $result->BloodGroup . '</td>';
                echo '<td>' . $result->Address . '</td>';
                echo '<td>' . $result->Message . '</td>';
                echo '<td>' . $result->PostingDate . '</td>';
                echo '</tr>';
                $cnt++;
            }
            ?>
        </tbody>
    </table>
<?php
}
?>