<?php

session_start();
if (!isset($_SESSION['isLogin'])) {
  header('location:../Respond/index.php');
  die();
}
if (!isset($_GET['post'])) {
  header('location:../Respond/index.php');
  die();
}

include './Respond/Connect/logcon.php';

$selectQuery = "SELECT * FROM registrations";
$query = mysqli_query($con, $selectQuery);

$selectQueryPay = "SELECT * FROM paymentuser";
$querypay = mysqli_query($con, $selectQueryPay);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin</title>
  <link rel="stylesheet" href="Style/admin.css" />
</head>

<body>
  <a href="Dashboard/dashboard.php">Go back</a><br>
  <a href="#pay">Payment Details</a>
  <h1>Registered Users - 2024</h1>
  <div class="hero">
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>FIRST_NAME</th>
          <th>LAST_NAME</th>
          <th>EMAIL</th>
          <th>PHONE</th>
          <th>COLLEGE</th>
          <th>PASSWORD</th>
          <th>IMAGE</th>
          <th>ADMIN</th>
          <th>TOKEN</th>
          <th>STATUS</th>
          <th>PAYMENT</th>
          <th colspan="2">OPERATIONS</th>
        </tr>
      </thead>
      <tbody>

        <?php
        while ($res = mysqli_fetch_array($query)) {
        ?>
          <tr>
            <td><?php echo $res['ID']; ?></td>
            <td><?php echo $res['FIRST_NAME']; ?></td>
            <td><?php echo $res['LAST_NAME']; ?></td>
            <td><?php echo $res['EMAIL']; ?></td>
            <td><?php echo $res['PHONE']; ?></td>
            <td><?php echo $res['COLLEGE']; ?></td>
            <td><?php echo $res['PASSWORD']; ?></td>
            <td><?php echo $res['IMAGE']; ?></td>
            <td><?php echo $res['ADMIN']; ?></td>
            <td><?php echo $res['TOKEN']; ?></td>
            <td><?php echo $res['STATUS']; ?></td>
            <td><?php echo $res['PAYMENT']; ?></td>
            <td id="update"><ion-icon name="create-outline"></ion-icon></td>
            <td id="delete"><ion-icon name="trash-outline"></ion-icon></td>
          </tr>

        <?php } ?>

      </tbody>
    </table>
  </div>
  <div class="hero" id="pay">
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>FIRST_NAME</th>
          <th>LAST_NAME</th>
          <th>AMOUNT</th>
          <th>STATUS</th>
          <th>PAYMENT_ID</th>
          <th>ADDED_ON</th>
          <th colspan="2">OPERATIONS</th>
        </tr>
      </thead>
      <tbody>

        <?php
        while ($respay = mysqli_fetch_array($querypay)) {
        ?>
          <tr>
            <td><?php echo $respay['ID']; ?></td>
            <td><?php echo $respay['FIRST_NAME']; ?></td>
            <td><?php echo $respay['LAST_NAME']; ?></td>
            <td><?php echo $respay['AMOUNT'] / 100; ?></td>
            <td><?php echo $respay['STATUS']; ?></td>
            <td><?php echo $respay['PAYMENT_ID']; ?></td>
            <td><?php echo $respay['ADDED_ON']; ?></td>
            <td id="update"><ion-icon name="create-outline"></ion-icon></td>
            <td id="delete"><ion-icon name="trash-outline"></ion-icon></td>
          </tr>

        <?php } ?>

      </tbody>
    </table>
  </div>
</body>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</html>