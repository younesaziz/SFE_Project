<?php 
    require('nav.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styley.css">
    <title>messages forms</title>
</head>
<body>

<section class="content-area">
  <div class="table-area">
    <table class="responsive-table table">
      <thead>
        <tr>
          <th>Username</th>
          <th>Division</th>
          <th>type incident</th>
          <th>date de message</th>
          <th>message</th>
        </tr>
      </thead>
    <tbody>
    <?php
                            $sql = "SELECT id_intervention  , date_msg , b.type_incident , d.nom_division  , f.username , message  FROM intervention i , incident b , fonctionnaire f , division d WHERE i.id_fonction = f.id_fonction AND i.id_incident = b.id_incident AND d.id_division = f.id_division ";
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
                                            
                                            <td><?php echo htmlentities($result->username);?></td>
                                            <td><?php echo htmlentities($result->nom_division);?></td>
                                            <td><?php echo htmlentities($result->type_incident);?></td>
                                            <td><?php echo htmlentities($result->date_msg);?></td>
                                            <td><?php echo htmlentities($result->message);?></td>
                                        
                                            </tr>
                                        <?php
                                        // for serial number increment
                                        $cnt++;
                                        }} 
                                    ?>
    </tbody>
    </table>
  </div>
</section>
</body>
</html>

