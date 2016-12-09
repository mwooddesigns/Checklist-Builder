<?php
include_once 'inc/dbconfig.php';

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

if(isset($_GET['read'])) {
  $id = $_GET['read'];
  extract($crud->read($id));
  $result = json_encode(array($name, $config));
  exit($result);
}

if(isset($_GET['update'])) {
  $id = $_GET['update'];
  $name = $_GET['name'];
  $config = urldecode($_GET['config'])
  $result = $crud->update($id,$name,$config);
  if($result) {
    exit("Row updated");
  } else {
    exit("An error occured");
  }
}
?>
