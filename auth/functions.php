<?php
session_start();
require 'dbconnect.inc.php';
mysql_select_db(odifarmdb);

function balnqty($user) {

$query = mysql_query("SELECT * FROM users WHERE id ='$user'") or die('not working');
$querows = mysql_fetch_array($query);
$_SESSION['qty'] = $querows['qty'];
return $querows['qty'];

}

function estimate($user) {
  $query = mysql_query("SELECT * FROM users WHERE id ='$user'") or die('not working');
  $querows = mysql_fetch_array($query);
  $_SESSION['plan'] = $querows['plan'];
  $_SESSION['qty'] = $querows['qty'];
  switch ($querows['plan']) {
    case '1':
      echo 'next month';
      break;

      case '2':
        echo '3 months';
        break;

        case '3':
          echo '6 months';
          break;

    default:
      echo 'Not available';
      break;
  }
}

function getUserData($uid, $data) {
  $query = mysql_query("SELECT * FROM users WHERE id ='$uid'") or die('not working');
  $querows = mysql_fetch_array($query);
  echo $querows[$data];

}

function paus($uid) {
  $query = mysql_query("SELECT * FROM hault WHERE ui_id = '$uid'") or die('not working');
  $querows = mysql_fetch_array($query);
  if ($querows['paus']) {
    echo '<div class="alert alert-danger">';
    echo '<h3>You have paused your delivery !!!</h3>';
    echo '<p>You can resume your orders anytime by clicking on "Resume" below or please contact us if you need any help!</p>';
    echo '<p>';
    echo '<a href="auth/pause.php?resume=1">';
    echo '<button type="button" class="btn btn-success waves-effect waves-light" name="resume">Resume</button>';
    echo '</a>';
    echo '</p>';
    echo '</div>';
  }
}



 ?>
