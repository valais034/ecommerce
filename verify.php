<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>تایید پرداخت</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>

<?php
require_once 'inc/config.php';

$MerchantID = '0e25eef0-f310-11e7-814b-000c295eb8fc';
$Authority = $_GET['Authority'];

$order_data = get_order_by_authority($Authority);
$Amount = $order_data['order_total']; //Amount will be based on Toman
clear_cart();

if ($_GET['Status'] == 'OK') {

    $client = new SoapClient('https://www.zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);

    $result = $client->PaymentVerification(
        [
            'MerchantID' => $MerchantID,
            'Authority' => $Authority,
            'Amount' => $Amount,
        ]
    );

    if ($result->Status == 100) {
        $ref_id = $result->RefID;
        if (final_pay($Authority, $ref_id)) {

            ?>
            <div class="final-pay">
                <?php
                echo 'پرداخت با موفقیت انجام شد. کد رهگیری:' . $result->RefID;
                echo "<br>";
                echo 'مبلغ تراکنش: ' . $order_data['order_total'] . ' تومان';
                echo "<br>";
                echo "<a href='" . PATH . "'>بازگشت به صفحه اصلی فروشگاه</a>";
                ?>
            </div>
            <?php
        }
    } else {
        echo 'خطایی پیش آمده است. کد خطا:' . $result->Status;

    }
} else {
    echo 'عملیات پرداخت توسط کاربر لغو شده است.';
}
?>


</body>
</html>