<?php 
    require('nav.php');
    require_once('db.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="col-12">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">Table des fonctionnaire</h6>
            <td><a href="add_f.php" class="btn btn-success">ADD NEW PERSON</a></td>
            <div class="table-responsive">
                <table class="table">
                    
                    <thead>
                        <tr>
                            
                            <th scope="col">FIRST NAME</th>
                            <th scope="col">LAST NAME</th>
                            <th scope="col">DIVISION</th>
                            <th scope="col">USERNAME</th>
                            <th scope="col">PASSWORD</th>
                            <th scope="col">CREATED</th>
                            <th scope="col">PHONE</th>
                            <th scope="col">Edite Action</th>
                            <th scope="col">Delete Action</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql = "SELECT a.id_fonction , a.nom , a.prenom , b.nom_division , a.username , a.password , a.created_at , a.phone  FROM fonctionnaire a , division b WHERE a.id_division = b.id_division ";
                            //Prepare the query:
                            $query = $conn->prepare($sql);
                            //Execute the query:
                            $query->execute();
                            //Assign the data which you pulled from the database (in the preceding step) to a variable.
                            $results=$query->fetchAll(PDO::FETCH_OBJ);
                            // For serial number initialization
                            $cnt=1;
                            if($query->rowCount() > 0)
                                {
                                    //In case that the query returned at least one record, we can echo the records within a foreach loop:
                                    foreach($results as $result)
                                        {
                                        ?>
                                        <!-- Display Records -->
                                            <tr>
                                            
                                            <td><?php echo htmlentities($result->nom);?></td>
                                            <td><?php echo htmlentities($result->prenom);?></td>
                                            <td><?php echo htmlentities($result->nom_division);?></td>
                                            <td><?php echo htmlentities($result->username);?></td>
                                            <td><?php echo htmlentities($result->password);?></td>
                                            <td><?php echo htmlentities($result->created_at);?></td>
                                            <td><?php echo htmlentities($result->phone);?></td>
                                            <td><a href="edite_f.php?id_f=<?= $result->id_fonction ?>" class="btn btn-info">Edit</a></td>
                                            <td><a onclick="return confirm('Are you sure you want to delete this entry?')" href="delete_f.php?id_f=<?= $result->id_fonction ?>" class='btn btn-danger'>Delete</a></td>
                                        
                                            </tr>
                                        <?php
                                        // for serial number increment
                                        $cnt++;
                                        }} 
                                    ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>