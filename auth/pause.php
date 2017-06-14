<?php
session_start();
$uid = $_SESSION['id'];
require 'dbconnect.inc.php';
mysql_select_db(odifarmdb);

if ($_POST['pause']) {
  $dt = $_POST['paudt'];
  $val = 1;
  mysql_query("INSERT INTO hault (ui_id, paus, dt) VALUES ('$uid', '$val', '$dt')");
  header("Location:../dashboard.html?notify=pause");
}

if ($_GET['resume'] == 1) {
  mysql_query("DELETE FROM hault WHERE ui_id = '$uid'");
  header("Location:../dashboard.html?notify=resume");
}

 ?>
