<?php 
    session_start();
    require_once('db.php');
    if(!isset($_SESSION["username"]) || $_SESSION["username"] == "admin" && !isset($_SESSION["password"])){
		header("Location:home.php");
	  }
  $message = '';
    if (isset($_POST['incident'])  && isset($_POST['message'])){
          if (!empty($_POST['incident'])  && !empty($_POST['message'])){
            $incident = $_POST['incident'];
            $message = $_POST['message'];
            $username = $_SESSION["username"];
            $query = $conn->prepare("SELECT id_fonction FROM fonctionnaire WHERE username = ?");
            $query->execute(array($username));
            $id_fonction=$query->fetchColumn();
            $sql="INSERT INTO intervention (id_incident,id_fonction,message) VALUES(:id_inc,:id_fon,:msg)";
            $statement = $conn->prepare($sql);
            if ($statement->execute([':id_inc' =>$incident, ':id_fon' => $id_fonction, ':msg' => $message])) {
                $message = 'data send successfully';
        
            }
            
          }else{
          $message2 = 'something wrong';
        }



    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styley.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <title>fonctionnaire form</title>
</head>
  <body>
  <div class="container">
        <div class=" text-center mt-5 ">
            <h1><strong><?php echo "Welcome " .$_SESSION['username'] ; ?></strong></h1>
            <a href="logout.php" class="btn btn-info btn-lg">
              <span class="glyphicon glyphicon-log-out"></span>Log out
            </a>
        </div>
    <div class="row ">
      <div class="col-lg-7 mx-auto">
        <div class="card mt-2 mx-auto p-4 bg-light">
            <div class="card-body bg-light">
       
            <div class = "container">
                  <form method = "POST">
                    <div class="col-md-6">
                        <div class="form-group">
                          <div class="controls">
                            <div class="row">
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
                            <label for="form_need">Please specify your need *</label>
                            <select id="form_need" name="incident" class="form-control">
                            <?php
                              $stm = $conn->prepare("SELECT * FROM incident");
                              $stm->execute();
                              while($row = $stm->fetch(PDO::FETCH_ASSOC))
                                {
                                ?>
                                  <option value = "<?php echo $row['id_incident']; ?>"><?php echo $row['type_incident']; ?></option>
              
                                <?php
                                }
              
                                ?>
                            </select>
                            
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="form_message">Message *</label>
                            <textarea id="form_message" name="message" class="form-control" placeholder="Write your message here." rows="4"></textarea
                                >
                            </div>

                        </div>


                    <div class="col-md-12">
                        
                    <button type="submit" class="btn btn-primary" name = "send">send</button>
                    
                </div>
          
                </div>


        </div>
         </form>
        </div>
            </div>


    </div>

    </div>

</div>
</div>
  
  </body>
</html>