<?php
require 'db.php';

$id =$_GET['id_d'];
$sql = 'SELECT * FROM division WHERE id_division=:uid';
$statement = $conn->prepare($sql);
$statement->execute([':uid' => $id ]);
$person = $statement->fetch(PDO::FETCH_OBJ);
if (isset ($_POST['update']) )  {
    $nom_div = $_POST['nom_div'];
    $sql = 'UPDATE division SET nom_division=:nom_div WHERE id_division=:id';
    $statement = $conn->prepare($sql);
    $statement->bindParam(':nom_div',$nom_div,PDO::PARAM_STR);
    $statement->bindParam(':id',$id,PDO::PARAM_STR);
    $statement->execute();
    // Mesage after updation
    echo "<script>alert('Record Updated successfully');</script>";
    // Code for redirection
    echo "<script>window.location.href='division.php'</script>";



}


 ?>
<?php require 'nav.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Update Fonc</h2>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      <form method="post">
      <div class="form-group">
			<input value="<?= $person->nom_division; ?>" name="nom_div" id="nom"  class="form-control">
	    </div>
          <button type="submit" class="btn btn-info" name = "update">Update division</button>
        </div>
      </form>
    </div>
  </div>
</div>