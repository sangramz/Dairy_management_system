<?php


  if ($_SERVER['REQUEST_METHOD'] == 'POST')
  {
    $fname = $_POST['fname'];
    $sname = $_POST['mname'];
    $lname = $_POST['lname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $pwd = $_POST['password1'];
    $add1 = $_POST['add1'];
    $add2 = $_POST['add2'];
    $city = $_POST['city'];
    $lndmk = $_POST['lndmk'];
    $pin = $_POST['pin'];
    $recurr = $_POST['recurr'];
    $altpats = $_POST['altpats'];
    $altdays = $_POST['altdays'];
    $paysched = $_POST['paysched'];
    $days_check = $_POST['days_check'];
    if ($_POST['pay']) {
        $pay = $_POST['pay'];
    }
    if (!$recurr) {
    $qty = $_POST['qty'];
    }
    elseif ($recurr) {
      $qty = $_POST['qty1'];

    }

  }


//-----------------------Dates here--------------------------------------
  $dt = getdate();
  $pay_date = $dt['mday'].'/'.$dt['mon'].'/'.$dt['year'];
  switch ($paysched) {
    case '1':
      $exp_date = date('d/m/Y', strtotime('+1 months'));
      break;

    case '2':
      $exp_date = date('d/m/Y', strtotime('+3 months'));
      break;

    case '3':
      $exp_date = date('d/m/Y', strtotime('+5 months'));
      break;

    default:
      # code...
      break;
  }
//------------------------ Dates Stop here  ------------------------------------

//------------------------ Plan STARTS here ------------------------------------

if ($recurr == 1) {
  if ($altpats == 1) {
    $plan = 'Every Alternate 2 Days';
  }
  elseif ($altpats == 2) {
    $plan = 'Every Alternate '.$altdays.' days';
  }

}
elseif ($recurr == 2) {
  $plan = 'Every Alternate '.implode(', ', $days_check);
}


//------------------------ Plan STOPS here ------------------------------------







  require 'dbconnect.inc.php';
  mysqli_select_db(odifarmdb);
  $que = "INSERT INTO
          users (email, pwd, phone, name1, name2, name3, add1, add2, lndmk, pin, city, qty, plan, plan_id, payment, pay_date, renew_date)
          VALUES ('$email', '$pwd', '$phone', '$fname', '$sname', '$lname', '$add1', '$add2', '$lndmk', '$pin', '$city', '$qty', '$plan', '$paysched', '$pay', '$pay_date', '$exp_date')";
  $add = $conn->exec($que);
  if ($add) {
    header("Location: ../index.html?attempt=2");
  }
  else {
    echo 'not added';
  }
 ?>
