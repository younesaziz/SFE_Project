<?php
require 'db.php';
$id = $_GET['id_d'];
$sql = 'DELETE FROM division WHERE id_division=:id';
$statement = $conn->prepare($sql);
if ($statement->execute([':id' => $id])) {
  header("Location: division.php");
}