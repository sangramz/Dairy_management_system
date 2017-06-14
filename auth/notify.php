<?php
$notify = $_GET['notify'];
switch ($notify) {
  case 'adhoc':
    $qty = $_GET['qty'];
    $a = "$.Notification.notify('black', 'top right', 'Adhoc Change successful', 'You Updated you order to ".$qty." Litres.');";
    echo "<script>";
    echo $a;
    echo "</script>";
    break;

  case 'req_update':
    $qty = $_GET['qty'];
    $a = "$.Notification.notify('black', 'top right', 'New Requirement Updated', 'You updated your requirement to ".$qty." Litres. If there is any issue with the deliveries or orders then please feel free to contact us');";
    echo "<script>";
    echo $a;
    echo "</script>";
    break;

  case 'resume':
    $qty = $_GET['qty'];
    $dt = getdate();
    $a = "$.Notification.notify('black', 'top right', 'Thanks for resuming your orders', 'Your accounts requirements resumed from ".$dt['mday'].'/'.$dt['mon'].'/'.$dt['year']." In case of any issues, please contact us');";
    echo "<script>";
    echo $a;
    echo "</script>";
    break;

  case 'def':
    $a = "$.Notification.notify('black', 'top right', 'Delivery Preferences Updated', 'You have set your default delivery preferences');";
    echo "<script>";
    echo $a;
    echo "</script>";
    break;

  default:
    # code...
    break;
}

 ?>
