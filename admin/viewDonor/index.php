<?php
// require_once('../dashbord/connection.php');
require("../connection.php");
$sqliAmout = 'SELECT * FROM donation';
$resultAmount = mysqli_query($conn, $sqliAmout) or die('Error');

$currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
$limi = 10;
$offset = ($currentPage - 1) * $limi;
$query = "SELECT donor.*, donation.donation_amout FROM donor JOIN donation ON donor.donation_id = donation.donation_id LIMIT   {$offset},  {$limi}";

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC' crossorigin='anonymous'>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css'>
  <title>Admin</title>
</head>

<body>
  <div class="d-flex justify-content-center align-items-center h-75 flex-column ">
    <h1 class="text-center pt-4 pb-2">Donors</h1>
    <div class="cardsp card bg-light col-10 p-4 h-75">

      <div class="d-flex justify-content-between p-1">
        <h4 class="bolder">Admin</h4>
        <form class="d-flex" method="post">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search" />
          <button class="btn btn-info" type="search">Search</button>
        </form>
      </div>
      <table class="table text-center table-bordered pt-4">
        <thead class="table-dark">
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">email</th>
            <th scope="col">Phon Number</th>
            <th scope="col">Addres</th>
            <th scope="col">Amout</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <?php
            if (!empty(isset($_POST['search']))) {
              $searchTerm = $_POST['search'];
              // Execute the search query
              $whereClause = "donor_id LIKE '%$searchTerm%' OR donor_name LIKE '%$searchTerm%' OR donor_email LIKE '%$searchTerm%'";
              $sql = "SELECT donor.*, donation.donation_amout FROM donor JOIN donation ON donor.donation_id = donation.donation_id  WHERE $whereClause  LIMIT   {$offset},  {$limi}";
              $searchresult = mysqli_query($conn, $sql);
              if (
                mysqli_num_rows($searchresult) >
                0
              ) {
                while ($row = mysqli_fetch_assoc($searchresult)) { ?>
                  <td>
                    <?php echo $row['donor_id'];
                    ?>
                  </td>
                  <td>
                    <?php echo $row['donor_name'];
                    ?>
                  </td>
                  <td>
                    <?php echo $row['donor_email'];
                    ?>
                  </td>
                  <td>
                    <?php echo $row['donor_phn'];
                    ?>
                  </td>
                  <td>
                    <?php echo $row['donor_addres'];
                    ?>
                  </td>
                  <td>
                    <!--
                       <?php
                        while ($row2 = mysqli_fetch_assoc($donresult)) {
                          echo $row2['donation_amout'];
                        }
                        ?>
                  </td> -->
                    <!-- <td>
                    <a href="view/index.php?id=<?php echo $row['donor_id']; ?>" class="btn btn-info" type="view" name="view" id="view"><i class="fa-solid fa-eye"></i></a>
                  </td>
                  <td>

                    <a onclick="return confirm('Are you sure to delete this?')" href="./delet/index.php?donor_id=<?php echo $row['donor_id']; ?>" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>

                  </td> -->

          </tr>
      <?php
                }
              } else {
                echo 'no result founfd';
              }
            } else {
      ?>
      <tr>
        <?php

              $result = mysqli_query($conn, $query);
              while ($row = mysqli_fetch_assoc($result)) {
        ?>

          <td>
            <?php echo $row['donor_id'];
            ?>
          </td>
          <td>
            <?php echo $row['donor_name'];
            ?>
          </td>
          <td>
            <?php echo $row['donor_email'];
            ?>
          </td>
          <td>
            <?php echo $row['donor_phn'];
            ?>
          </td>
          <td>
            <?php echo $row['donor_addres'];
            ?>
          </td>


          <!-- <td>
              <?php
                echo $row2['donation_amout'];

              ?>
            </td> -->

          <!-- <td>
            <a href="view/index.php?id=<?php echo $row['donor_id']; ?>" class="btn btn-info" type="view" name="view" id="view"><i class="fa-solid fa-eye"></i></a>
          </td>
          <td>

            <a onclick="return confirm('Are you sure to delete this?')" href="./delet/index.php?donor_id=<?php echo $row['donor_id']; ?>" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>

          </td> -->

      </tr>
  <?php
              }
            }


  ?>
        </tbody>
      </table>
      <?php

      $sqli1 = 'SELECT * FROM donor';

      $result1 = mysqli_query($conn, $sqli1) or die('Error');

      if (
        mysqli_num_rows($result1) >
        0
      ) {
        $totalrecords = mysqli_num_rows($result1);
        $total_pages =
          ceil($totalrecords / $limi); ?>
        <div>
          <style>
            .active {
              text-decoration: none;
              background-color: aquamarine;
            }
          </style>
          <ul class="d-flex justify-content-end gap-1">
            <?php

            for ($i = 1; $i <= $total_pages; $i++) {
              $active = $i == $currentPage ? 'active' : '';
            ?>
              <li class="btn btn-info <?php $active ?>">
                <a href="index.php?page=<?php echo $i;  ?>">
                  <?php echo $i; ?></a>
              </li>
          <?php
            }
          }
          ?>
          </ul>
        </div>
    </div>
  </div>
</body>

</html>