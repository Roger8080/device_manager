<?php

include 'db.php';

//TBMOBILE_MOVIMENTACAO - for edition
$id = $_POST['id'];
$id_prod = $_POST['id_prod'];
$status_id = $_POST['status_id'];
$os = $_POST['os'];
$historico = $_POST['historico'];
$status = $_POST['status'];
$unidade = $_POST['unidade'];
$ender_destino = $_POST['ender_destino'];

//$dt_encerramento = (!empty($_POST['dt_encerramento'])) ? "'".$_POST['dt_encerramento']."'": "'NULL'";
$dt_encerramento = (!empty($_POST['dt_encerramento'])) ?  "'".$_POST['dt_encerramento']."'" : 'NULL';

$cabo = (isset($_POST['cabo'])) ? $_POST['cabo']: '0';
$charger = (isset($_POST['charger'])) ? $_POST['charger']: '0';
$caixa = (isset($_POST['caixa'])) ? $_POST['caixa']: '0';
$fone = (isset($_POST['fone'])) ? $_POST['fone']: '0';
$capa = (isset($_POST['capa'])) ? $_POST['capa']: '0';
$chip = (isset($_POST['chip'])) ? $_POST['chip']: '0';
$pelicula = (isset($_POST['pelicula'])) ? $_POST['pelicula']: '0';
$veicular = (isset($_POST['veicular'])) ? $_POST['veicular']: '0';
$suporte = (isset($_POST['suporte'])) ? $_POST['suporte']: '0'; 



$query = "UPDATE tbmobile_movimentacao SET 
                 os = '$os', 
                 historico = '$historico',                                          
                 cabo = '$cabo',
                 charger = '$charger',
                 cabo = '$cabo',
                 caixa = '$caixa',
                 fone = '$fone',
                 capa = '$capa',
                 chip = '$chip',
                 pelicula = '$pelicula',
                 veicular = '$veicular',
                 dt_encerramento = $dt_encerramento,
                 suporte = '$suporte'                           
           WHERE id = $id ";


$query_os = "UPDATE tbmobile_os SET 
                    ordem_servico = '$os',                     
                    historico = '$historico'       
                 /* dt_encerramento = '$dt_encerramento'*/                                         
            WHERE id_evento = '$id' and ocorrencia = $status";



$query_up_tbmobile = "UPDATE tbmobile SET 
                      UNIDADE = '$ender_destino'                                                                         
                      WHERE id = $id_prod and $ender_destino <> UNIDADE ";
              
                    


/*$query_devolucao = "UPDATE tbmobile SET 
                   UNIDADE = '380010050000000', 
                   STATUS = '$status_id'                    
          WHERE id = $id_prod" and STATUS == "5";           

$query_retirada = "UPDATE tbmobile SET 
                   UNIDADE = '$unidade', 
                   STATUS = '$status_id'                    
           WHERE id = $id_prod" and STATUS == "4";  */

//print($query_devolucao);
//mysqli_query($conexao, $query_devolucao);


mysqli_query($conexao, $query);
mysqli_query($conexao, $query_os);
mysqli_query($conexao, $query_up_tbmobile);
//echo $query_up_tbmobile;

include 'db2.php';
mysqli_query($conexao2, $query);
mysqli_query($conexao2, $query_os);
mysqli_query($conexao2, $query_up_tbmobile);


header('location:index.php?#eventos'); 










