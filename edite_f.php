<?php
require 'db.php';

$id =$_GET['id_f'];
$sql = 'SELECT * FROM fonctionnaire WHERE id_fonction=:uid';
$statement = $conn->prepare($sql);
$statement->execute([':uid' => $id ]);
$person = $statement->fetch(PDO::FETCH_OBJ);
if (isset ($_POST['update']) ){
        $lname = $_POST['nom'];
        $fname = $_POST['prenom'];
        $division = $_POST['id_division'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $role = $_POST['role'];
        $phone = $_POST['phone'];
    $sql = 'UPDATE fonctionnaire SET nom=:nom, prenom=:prenom , id_division=:division , username=:username , password=:password , phone=:phone WHERE id_fonction=:id';
    $statement = $conn->prepare($sql);
    $statement->bindParam(':nom',$lname,PDO::PARAM_STR);
    $statement->bindParam(':prenom',$fname,PDO::PARAM_STR);
    $statement->bindParam(':division',$division,PDO::PARAM_STR);
    $statement->bindParam(':username',$username,PDO::PARAM_STR);
    $statement->bindParam(':password',$password,PDO::PARAM_STR);
    $statement->bindParam(':phone',$phone,PDO::PARAM_STR);
    $statement->bindParam(':id',$id,PDO::PARAM_STR);
    $statement->execute();
    // Mesage after updation
    echo "<script>alert('Record Updated successfully');</script>";
    // Code for redirection
    echo "<script>window.location.href='fonctionnaire.php'</script>";



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
						<input value="<?= $person->prenom; ?>" name="nom" placeholder="last name" id="nom"  class="form-control">
					</div>
                    <div class="form-group">
						<input value="<?= $person->nom; ?>" name="prenom" placeholder="first name" id="prenom"  class="form-control">
					</div>
                    <div class="form-group">
						<input value="<?= $person->id_division; ?>" name="id_division" placeholder="division" id="id_division"  class="form-control">
					</div>
                    <div class="form-group">
						<input value="<?= $person->username; ?>" name="username" placeholder="Username" id="username"  class="form-control">
					</div>
					<div class="form-group">
						<input value="<?= $person->password; ?>" name="password" placeholder="Enter Password" id="password"  class="form-control">
                    <div class="form-group">
						<input value="<?= $person->phone; ?>" name="phone" placeholder="entre phone" id="phone"  class="form-control">
					</div>
					<div class = "container">
					</div>
          <button type="submit" class="btn btn-info" name = "update">Update person</button>
        </div>
      </form>
    </div>
  </div>
</div>