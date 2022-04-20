<?php
if (!defined('host')) define('host', 'localhost');
if (!defined('dbname')) define('dbname', 'cs353_project');
if (!defined('username')) define('username', 'root');
if (!defined('password')) define('password', '');
$mysqli = new mysqli(host, username, password, dbname);
if ($mysqli->connect_errno) {
  echo "Failed to connect to mqsql: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
