<!-- <?php require_once("../../connection.php");
global $conn;
$id = $_GET['donor_id'];
$donation_id = $_GET['donation_id'];
$sql = "SELECT donor_id FROM donor";
$sql2 = "SELECT donation_id FROM donation";
$result = mysqli_query($conn, $sql);
$result2 = mysqli_query($conn, $sql2);

$query = "DELETE  FROM donor WHERE donor_id = $id";
$query2 = "DELETE  FROM student WHERE donation_id = $donation_id";
$data = mysqli_query($conn, $query);
$data2 = mysqli_query($conn, $query2);
$map = false;
$map2 = false;
while ($row = mysqli_fetch_assoc($result)) {

    $ids = $row['donor_id'];
    if ($data and $ids == $id) {
        $map = true;
    }
}
while ($row = mysqli_fetch_assoc($result2)) {

    $ids = $row['donation_id'];
    if ($data2 and $ids == $donation_id) {
        $map2 = true;
    }
}
if ($map && $map2) {
?>
    <script>
        alert("data deleted successfully");
        window.open('http://localhost/zakatmanigment/admin/viewDonor/index.php', '_self');
    </script>
<?php
} else {
?>
    <script>
        alert("data not deleted successfully");
        window.open('http://localhost/zakatmanigment/admin/viewDonor/index.php', '_self');
    </script>


<?php }

?> -->