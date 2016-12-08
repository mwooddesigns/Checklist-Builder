<?php
include_once 'inc/dbconfig.php';

if(isset($_GET['get_id'])) {
  $id = $_GET['get_id'];
  extract($crud->read($id));
  $result = json_encode(array($name, $config));
  exit($result);
}
?>
