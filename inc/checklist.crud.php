<?php
class crud
{
 private $db;

 function __construct($DB_con)
 {
  $this->db = $DB_con;
 }

 public function create($name, $config)
 {
  try
  {
   $stmt = $this->db->prepare("INSERT INTO checklists(name,config) VALUES(:name, :config)");
   $stmt->bindparam(":name",$name);
   $stmt->bindparam(":config",$config);
   $stmt->execute();
   return true;
  }
  catch(PDOException $e)
  {
   echo $e->getMessage();
   return false;
  }

 }

 public function read($id)
 {
  $stmt = $this->db->prepare("SELECT * FROM checklists WHERE checklist_id=:id");
  $stmt->execute(array(":id"=>$id));
  $editRow=$stmt->fetch(PDO::FETCH_ASSOC);
  return $editRow;
 }

 public function update($id,$name,$config)
 {
  try
  {
   $stmt=$this->db->prepare("UPDATE tbl_users SET name=:name, config=:config WHERE id=:id ");
   $stmt->bindparam(":name",$name);
   $stmt->bindparam(":config",$config);
   $stmt->bindparam(":id",$id);
   $stmt->execute();

   return true;
  }
  catch(PDOException $e)
  {
   echo $e->getMessage();
   return false;
  }
 }

 public function delete($id)
 {
  $stmt = $this->db->prepare("DELETE FROM checklists WHERE id=:id");
  $stmt->bindparam(":id",$id);
  $stmt->execute();
  return true;
 }
}
