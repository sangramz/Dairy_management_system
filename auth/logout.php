<?php

session_start();
unset($_SESSION['id']);
header("Location: http://localhost/ms/index.html");
 ?>
