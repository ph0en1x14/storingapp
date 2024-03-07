<?php

//Variabelen vullen
$attractie = $_POST['attractie'];
$capaciteit = $_POST['capaciteit'];
$melder = $_POST['melder'];
$type = $_POST['soort']


//1. Verbinding
require_once '../../../config/conn.php';

//2. Query
$query="INSERTINTOmeldingen(attractie,type)VALUES(:attractie,:type)";
//3. Prepare
$statement=$conn->prepare($query);

//4. Execute
$statement->execute([
    ":attractie"=>$attractie,
    ":type"=>$type,
    ":melder"=>$melder
]);



header("Location:../meldingen/index.php?msg=Meldingopgeslagen");