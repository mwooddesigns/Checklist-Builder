<?php
include_once 'inc/dbconfig.php';

if(isset($_GET['get_id'])) {
  $id = $_GET['get_id'];
  extract($crud->read($id));
  $result = json_encode(array($name, $config));
  exit($result);
}

if(isset($_GET['create'])) {
  $name = $_GET['name'];
  $config = urldecode($_GET['config']);
  $result = $crud->create($name, $config);
  if($result) {
    exit("Row added");
  } else {
    exit("An error occured");
  }
}
?>
