<?php

include 'db.php';

$id = $_POST['id'];
$unidade = $_POST['selecao_unidade'];
$imei = $_POST['imei'];
$serie = $_POST['serie'];
$numero = $_POST['numero'];

$cabo = (isset($_POST['cabo'])) ? '1' : '0';
$charger = (isset($_POST['charger'])) ? '1' : '0';
$caixa = (isset($_POST['caixa'])) ? '1' : '0';
$fone = (isset($_POST['fone'])) ? '1' : '0';
$capa = (isset($_POST['capa'])) ? '1' : '0';
$chip = (isset($_POST['chip'])) ? '1' : '0';
$pelicula = (isset($_POST['pelicula'])) ? '1' : '0';
$veicular = (isset($_POST['veicular'])) ? '1' : '0';
$suporte = (isset($_POST['suporte'])) ? '1' : '0';



$query = "UPDATE tbmobile SET UNIDADE = '$unidade',
							IMEI = '$imei',
							SERIE = '$serie', 
							NUMERO = '$numero',

							cabo = '$cabo',
							charger = '$charger',
							caixa = '$caixa',
							fone = '$fone',
							capa = '$capa',
							chip = '$chip',
							pelicula = '$pelicula',
							veicular = '$veicular',
							suporte = '$suporte'				
          WHERE id = $id";

mysqli_query($conexao, $query);

/* echo"".$query.""; */

/* print($query);  variable test */
header('location:index.php?#chamados'); 


