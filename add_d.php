<?php
    require 'db.php';
    $message = '';
    if (isset($_POST['nom_div']) && isset($_POST['id_div'])) {
        if (!empty($_POST['nom_div']) && !empty($_POST['id_div'])) {
          $nom_div = $_POST['nom_div'];
          $id_division = $_POST['id_div'];
          $sql="INSERT INTO division (id_division,nom_division) VALUES(:id_div,:nom_div)";
          $statement = $conn->prepare($sql);
          if ($statement->execute([':nom_div' =>$nom_div , ':id_div' =>$id_division])) {
            $message = 'data inserted successfully';
          }
        }else{
          $message2 = 'somthing wrong';
        }



    }


 ?>
<?php require 'admin.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>ADD NEW DIVISION</h2>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      <?php if(!empty($message2)): ?>
        <div class="alert alert-danger">
          <?= $message2; ?>
        </div>
      <?php endif; ?>
      <form method="post">
        <input type="text" name="nom_div" placeholder="ENTRE NEW DIVISION"><br> <br>
        <input  type="number"  name="id_div" placeholder="ENTRE LE NUMERO DE DIVISION"><br><br>
          <button type="submit" class="btn btn-info">Add a division</button>
        </div>
      </form>
    </div>
  </div>
</div>