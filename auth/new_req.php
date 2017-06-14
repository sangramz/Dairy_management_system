<?php
session_start();
include 'dbconnect.inc.php';
mysql_select_db(odifarmdb);
$uid = $_SESSION['id'];

if (isset($_POST['reqchng'])) {
  $recur = $_POST['recur'];
  $altdays = $_POST['altdays'];
  $subs = $_POST['subs'];
  $days_check = $_POST['days_check'];

  //-----------------------Dates here--------------------------------------

    switch ($subs) {
      case '1':
        $exp_dt = date('d/m/Y', strtotime('+1 months'));
        break;

      case '2':
        $exp_dt = date('d/m/Y', strtotime('+3 months'));
        break;

      case '3':
        $exp_dt = date('d/m/Y', strtotime('+5 months'));
        break;

      default:
        $exp_dt = date('d/m/Y', strtotime('+1 months'));
        break;
    }
  //------------------------ Dates Stop here  ------------------------------------


  if ($recur == 1) {
    $plan = 'Every alternate 2 Days';
  }
  elseif ($recur == 2) {
    $plan = 'Every alternate '.$altdays.' Days';
  }
  elseif ($recur == 3) {
    $plan = 'Every Alternate '.implode(', ', $days_check);
  }
  elseif (!$recur) {
    $plan = 'Every Day';
  }

  $date1 = strtr($_REQUEST['reqdt'], '/', '-');
  $dt = date('d-m-Y', strtotime($date1));
  $qty = $_POST['qty'];
  mysql_query("UPDATE users SET qty='$qty', plan='$plan' WHERE id = '$uid'") or die('Error here');
  mysql_query("UPDATE users SET pay_date ='$dt', renew_date='$exp_dt' WHERE id = '$uid'") or die('Error here');
  $activity = 'You updated for milk requirement: '.$qty.' Litres on '.$dt;
  mysql_query("INSERT INTO activities (user_id, activity) VALUES ('$uid', '$activity')");
  header("Location: ../dashboard.html?notify=req_update&qty=$qty");
}



if (isset($_POST['adhoc'])) {
  $adhocdt = $_POST['adhocdt'];
  $qnty = $_POST['qnty'];
  mysql_query("UPDATE users SET qty = '$qnty', pay_date = '$adhocdt' WHERE id = '$uid'") or die('Error There');
  header("Location: ../dashboard.html?notify=adhoc&qty=$qnty");
}

if ($_GET['pref'] == 'change') {
  $def_dm = $_POST['default'];
  $sun = $_POST['sun'];
  $mon = $_POST['mon'];
  $tue = $_POST['tue'];
  $wed = $_POST['wed'];
  $thu = $_POST['thu'];
  $fri = $_POST['fri'];
  $sat = $_POST['sat'];
  $que = mysql_query("SELECT * FROM preferences WHERE ui_id = '$uid'");
  if ($que) {
    if (isset($def_dm)) {
      mysql_query("UPDATE preferences SET def = '$def_dm' WHERE ui_id = '$uid'") or die('Error There');
      header("Location:../preferences.html?notify=def");
    }

  } else {
    mysql_query("INSERT INTO preferences (sun, mon, tue, wed, thu, fri, sat) VALUES ('$sun', '$mon', '$tue', '$wed', '$thu', '$fri', '$sat')");
    header("Location:../preferences.html?notify=def");
  }

}

 ?>
