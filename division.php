<?php 
    require('nav.php');
    
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
            <h6 class="mb-4">Table des division</h6>
            <td><a href="add_d.php" class="btn btn-success">ADD NEW DIVISION</a></td>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            
                            <th scope="col">Numero de division</th>
                            <th scope="col">Nom de division</th>
                            <th scope="col">Edite Action</th>
                            <th scope="col">Delete Action</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql = "SELECT * FROM division ";
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
                                            
                                            <td><?php echo htmlentities($result->id_division);?></td>
                                            <td><?php echo htmlentities($result->nom_division);?></td>
                                            <td><a href="edite_d.php?id_d=<?= $result->id_division ?>" class="btn btn-info">Edit</a></td>
                                            <td><a onclick="return confirm('Are you sure you want to delete this entry?')" href="delete_d.php?id_d=<?= $result->id_division ?>" class='btn btn-danger'>Delete</a></td>
                                            
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