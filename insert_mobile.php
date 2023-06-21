<?php

include 'db.php';

$unidade = $_POST['UNIDADE'];
$imei = $_POST['IMEI'];
$serie = $_POST['SERIE'];
$numero = $_POST['NUMERO'];
$status = $_POST['STATUS'];
$data = $_POST['DATA'];

$query = "INSERT INTO tbmobile(UNIDADE,IMEI,SERIE,NUMERO,STATUS,DATA) values 
('$unidade','$imei','$serie','$numero','$status','$data')";

mysqli_query($conexao, $query);

header('location:index.php#chamados');