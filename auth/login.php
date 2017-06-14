<?php
session_start();
$email = $_POST['email'];
$pwd = $_POST['password'];

  require 'dbconnect.inc.php';
  mysql_select_db(odifarmdb);

  $que = mysql_query("SELECT * FROM users WHERE email = '$email' AND pwd = '$pwd'") or die("Not working");
  $querow = mysql_fetch_array($que);
  $queno = mysql_num_rows($que);

  if ($queno == 1)
  {
    $_SESSION['id'] = $querow['id'];
    $_SESSION['name1'] = $querow['name1'];
    $_SESSION['name2'] = $querow['name2'];
    $_SESSION['name3'] = $querow['name3'];
    $_SESSION['email'] = $querow['email'];
    $_SESSION['phone'] = $querow['phone'];
    $_SESSION['plan'] = $querow['plan'];
    $_SESSION['payment'] = $querow['payment'];
    $_SESSION['add1'] = $querow['add1'];
    $_SESSION['add2'] = $querow['add2'];
    $_SESSION['lndmk'] = $querow['lndmk'];
    $_SESSION['city'] = $querow['city'];
    $_SESSION['qty'] = $querow['qty'];

    if (empty($querow['plan']))
    {
        $home_url = '/ms/dashboard.html';
        header("Location: ".$home_url);
    }
      else
      {
        $home_url = '/ms/dashboard.html';
          header("Location: ".$home_url);
      }
  }
  else {
    $indexe_url = '/ms/index.html?attempt=1';
      header("Location: ".$indexe_url);
  }


 ?>
