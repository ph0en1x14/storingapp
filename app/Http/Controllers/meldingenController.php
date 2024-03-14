<?php

//Variabelen vullen
$attractie = $_POST['attractie'];
$type = $_POST['type'];
$capaciteit = $_POST['capaciteit'];
if (isset($_POST['preoriteit']))
{
    $prioriteit = true;
}
else
{
    $prioriteit = false;
}
$melder = $_POST['melder'];
$overig = $_POST['overige'];

//1. Verbinding
require_once '../../../config/conn.php';

//2. Query
$query="INSERT INTO meldingen (attractie, type, capaciteit, prioriteit, melder, overige_info)
VALUES(:attractie, :type, :capaciteit, :prioriteit, :melder, :overig)";

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


header("Location:../meldingen/index.php?msg=Meldingopgeslagen");