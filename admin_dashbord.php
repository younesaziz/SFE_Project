<?php 
    require('nav.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="img/favicon.ico" rel="icon">

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
     <!-- Sale & Revenue Start -->
     <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-cubes me-1 fa-2x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">les divisions</p>
                                <h6 class="mb-0"><?php
                                                    $req = $conn->query("SELECT count(id_division ) as Nbdiv FROM division" );
                                                    $donnees = $req->fetch(PDO::FETCH_ASSOC);
                                                    echo $donnees['Nbdiv'];
                                                ?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-users me-1 fa-2x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">les fonctionnaires</p>
                                <h6 class="mb-0"><?php
                                                    $req = $conn->query("SELECT count(id_fonction ) as Nbfonc FROM fonctionnaire" );
                                                    $donnees = $req->fetch(PDO::FETCH_ASSOC);
                                                    echo $donnees['Nbfonc'];
                                                ?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-envelope me-1 fa-2x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">les messages</p>
                                <h6 class="mb-0"><?php
                                                    $req = $conn->query("SELECT count(id_intervention) as Nbint FROM intervention" );
                                                    $donnees = $req->fetch(PDO::FETCH_ASSOC);
                                                    echo $donnees['Nbint'];
                                                ?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-bar fa-2x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">les incidents</p>
                                <h6 class="mb-0"><?php
                                                    $req = $conn->query("SELECT count(id_incident ) as Nbinc FROM incident " );
                                                    $donnees = $req->fetch(PDO::FETCH_ASSOC);
                                                    echo $donnees['Nbinc'];
                                                ?></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <?php
                if($stmt = $connection->query("SELECT * FROM intervention")){

                    echo "No of records : ".$stmt->num_rows."<br>";
                  $php_data_array = Array(); // create PHP array
                    echo "<table>
                  <tr> <th>Language</th><th>Nos</th></tr>";
                  while ($row = $stmt->fetch_row()) {
                     echo "<tr><td>$row[0]</td><td>$row[1]</td></tr>";
                     $php_data_array[] = $row; // Adding to array
                     }
                  echo "</table>";
                  }else{
                  echo $connection->error;
                  }
            ?>
               
</body>
</html>