<?php
    require 'db.php';
    $message = '';
    if (isset ($_POST['fname'])  && isset($_POST['lname']) && isset($_POST['division']) && isset($_POST['username']) && isset($_POST['password'])
           && isset($_POST['phone']) ) {
          if(!empty($_POST['fname'])  && !empty($_POST['lname']) && !empty($_POST['division']) && !empty($_POST['username']) && !empty($_POST['password'])
            && !empty($_POST['phone'])){
            $name = $_POST['fname'];
            $lname = $_POST['lname'];
            $division = $_POST['division'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $phone = $_POST['phone'];
            $sql="INSERT INTO fonctionnaire (nom,prenom,id_division,username,password,phone) VALUES(:fn,:ln,:id_div,:usn,:pss,:phone)";
            $statement = $conn->prepare($sql);
            if ($statement->execute([':fn' =>$name, ':ln' => $lname, ':id_div' => $division, ':usn' => $username, ':pss' => $password, ':phone' => $phone])) {
                $message = 'data inserted successfully';
        
            }
          }else{
          $message2 = 'something wrong';
        }



    }


 ?>
<?php require 'nav.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Add New Fonc</h2>
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
         <div class="form-group">
			<input type="text" name="fname" placeholder="first name" class="form-control">
		</div>
        <div class="form-group">
			<input type="text" name="lname" placeholder="last name" class="form-control">
		</div>
        <select name = "division">
          <?php
            $stm = $conn->prepare("SELECT * FROM division");
            $stm->execute();
            while($row = $stm->fetch(PDO::FETCH_ASSOC))
            {
              ?>
              <option value = "<?php echo $row['id_division']; ?>"><?php echo $row['nom_division']; ?></option>
              
              <?php
            }
              
              ?>
        </select>
        <div class="form-group">
			<input type="text" name="username" placeholder="Username" class="form-control">
		</div>
		<div class="form-group">
			<input type="password" name="password" placeholder="Enter Password" class="form-control">
        <div class="form-group">
			<input type="text" name="phone" placeholder="entre phone" class="form-control">
		</div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Add a person</button>
        </div>
      </form>
    </div>
  </div>
</div>