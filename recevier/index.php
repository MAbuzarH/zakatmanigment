<?php
// Assuming you have established a database connection
require_once('./connection.php');
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Retrieve form data
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phoneNumber = $_POST['phone_number'];
  $amount = $_POST['amount'];
  $addres = $_POST['addres'];
  $currentDate = date('Y-m-d');
  // Insert the donor data into the database
  $sql = "INSERT INTO `recevier` (`payment_id`, `recevier_name`, `recevier_email`, `recevier_phn`, `recevier_addres`) VALUES (NULL, '$name', '$email', '$phoneNumber', ' $addres')";
  $sql1 = "INSERT INTO `payment`(`payment_id` ,`amout`,`payment_date`) VALUES (NULL,'$amount','$currentDate')";
  $result = mysqli_query($conn, $sql1);
  if (mysqli_query($conn, $sql)) { 
    if (mysqli_query($conn, $sql1)) {
    ?>

    <script>
      alert("Your Application has been successfully submitted");
      window.open('http://localhost/zakatmanigment/', '_self');
    </script>
<?php
  }} else {
    // Error occurred while inserting data
    echo "Error: " . mysqli_error($conn);
  }

  // Close the database connection
  mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html>

<head>
  <title>Recevier Form</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</head>

<body>

  <div class="container pt-4">
    <h1 class="text-center">Receiver Form</h1>

    <form action="" method="POST" class="card p-4 gap-2">
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name" required>
      </div>

      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" required>
      </div>

      <div class="form-group">
        <label for="phone_number">Phone Number</label>
        <input type="text" class="form-control" id="phone_number" name="phone_number" required>
      </div>

      <div class="form-group">
        <label for="addres">Addres</label>
        <input type="text" class="form-control" id="addres" name="addres" required>
      </div>

      <div class="form-group">
        <label for="amount">Amount</label>
        <input type="number" class="form-control" id="amount" name="amount" required>
      </div>

      <button type="submit" class="btn btn-primary">Appaly Now</button>
    </form>
  </div>

</body>

</html>