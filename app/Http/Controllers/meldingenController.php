<?php

//Variabelen vullen
$attractie = $_POST['attractie'];
$capaciteit = $_POST['capaciteit'];
$melder = $_POST['melder'];
$type = $_POST['type']
$capaciteit = $_POST['capaciteit'];
$prioriteit = $_POST['prioriteit']

$overig = $_POST['overige'];

if (isset($_POST['preoriteit']))



//1. Verbinding
require_once '../../../config/conn.php';

//2. Query
$query="INSERT INTO meldingen(attractie, type, melder, capaciteit, prioriteit, overige_info)VALUES(:attractie,:type, :capaciteit, :prioriteit, :overig)";

//3. Prepare

$statement=$conn->prepare($query);

//4. Execute

$statement->execute([
    ":attractie"=>$attractie,
    ":type"=>$type,
    ":melder"=>$melder,
    ":capaciteit"=>$capaciteit,
    ":prioriteit"=>$prioriteit,
    ":overig"=>$overig
]);


$conn=newPDO("mysql:host=$dbHost;dbname=$dbName",$dbUser,$dbPass);

header("Location:../meldingen/index.php?msg=Meldingopgeslagen");