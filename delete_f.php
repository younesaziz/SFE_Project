<?php
require 'db.php';
$id = $_GET['id_f'];
$sql = 'DELETE FROM fonctionnaire WHERE id_fonction=:id';
$statement = $conn->prepare($sql);
if ($statement->execute([':id' => $id])) {
  header("Location: fonctionnaire.php");
}