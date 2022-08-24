<?php
require 'function.php';
session_start();
unset($_SESSION['login']);
unset($_SESSION['level']);
unset($_SESSION['id']);
session_destroy();
header('location:' . $base_url . 'login.php');
die;