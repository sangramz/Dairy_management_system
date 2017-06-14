<?php

  $db_host = 'localhost';
  $db_user = 'root';
  $db_pwd = 'qazxsw123';
  $db_name = 'odifarmdb';
  $con_err = 'The Database can\'t be connected';

  if(!@mysql_connect($db_host, $db_user, $db_pwd) || !@mysql_select_db($db_name))
  {
    echo $con_err;
  }

 ?>
