<?php

session_start();

if (!isset($_SESSION['isLogin'])) {
    header('location:../Respond/index.php');
    die();
}
if (!isset($_POST['pay'])) {
    header('location:../Respond/index.php');
    die();
}


if (isset($_COOKIE['actionGateway'])) {
    // action already done
    setcookie('actionGateway', "set", time() - 180, "/");
    echo "N";
    unset($_POST['pay']);
    header('location:dashboard.php');
    die();
} else {
    setcookie('actionGateway', "set", time() + 180, "/");
    echo "Y";
}

include '../Respond/Connect/logcon.php';

$ids = $_SESSION['UID'];
$selectQuery = "
SELECT * FROM registrations WHERE ID=$ids";
$Query = mysqli_query($con, $selectQuery);
$res = mysqli_fetch_array($Query);


$apiKey = 'rzp_test_bRgEYh1U9UwsZc';
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="http://parsleyjs.org/dist/parsley.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"> </script>

<script>
    function paynow() {
        let name = "<?php echo $res['FIRST_NAME'] ?>";

        jQuery.ajax({
            type: 'post',
            url: "paymentProcess.php",
            data: "&amt=20000 &name=" + name,
            success: function(result) {
                let options = {
                    "key": "<?php echo $apiKey; ?>",
                    "amount": "20000",
                    "currency": "INR",
                    "name": "Devansh Tyagi",
                    "description": "Testing",
                    "image": "https://example.com/your_logo.jpg",
                    "handler": function(response) {
                        jQuery.ajax({
                            type: 'post',
                            url: "paymentProcess.php",
                            data: "payment_id=" + response.razorpay_payment_id,
                            success: function(result) {
                                window.location.href = "thankyou.php";
                            }
                        })
                    }
                };
                let rzp1 = new Razorpay(options);

                rzp1.open();
                <?php
                unset($_POST['pay']);
                ?>
            }
        })

    }
    paynow();
</script>
<?php
unset($_POST['pay']);
?>