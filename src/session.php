<?php
include('config.php');

session_start();
if (!isset($_SESSION['username']) && !isset($_SESSION['company_id']) && !isset($_SESSION['editor_id'])) {
  header("location: userLogin.php");
}
