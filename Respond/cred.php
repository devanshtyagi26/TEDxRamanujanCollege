<?php

session_start()

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cred</title>
    <link rel="stylesheet" href="../Style/cred.css">
</head>

<body>
    <p>Hi</p> <?php echo $_SESSION['fName'] ?>

    <div id="stars"></div>
    <div id="stars2"></div>
    <div id="stars3"></div>
</body>

</html>