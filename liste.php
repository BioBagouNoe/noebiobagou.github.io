<?php
$db=new PDO('mysql:host=localhost;dbname=canada',"root","");
$query="SELECT * FROM registers";
$statement=$db->prepare($query);
$statement->execute();
$aff=$statement->fetchAll(PDO::FETCH_OBJ);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <link href="DataTables/datatables.min.css" rel="stylesheet">
 
<script src="DataTables/datatables.min.js"></script>
<link href="https://cdn.datatables.net/v/dt/jq-3.7.0/dt-1.13.6/datatables.min.css" rel="stylesheet">
 
<script src="https://cdn.datatables.net/v/dt/jq-3.7.0/dt-1.13.6/datatables.min.js"></script>
</head>
<body>
    <table class="table table-bordered">
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>email</th>
            <th>Action</th>



        </tr>
        <?php foreach($aff as $af):?>
        <tr>
            <td>
                <?=$af->nom;?>
            </td>
            <td>
                <?=$af->prenom;?>
            </td>
            <td>
                <?=$af->email;?>
            </td>
            <td>
                <a href="">Edit</a>
            </td>
        </tr>
        <?php endforeach?>
    </table>
</body>
</html>