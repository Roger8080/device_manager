<?php

include 'db.php';

//TBMOBILE_MANUTENCAO - for edition
$id = $_POST['id'];
$os = $_POST['os'];
$problema_id = $_POST['problema_id'];
$historico = $_POST['historico'];
//$dt_encerramento = (!empty($_POST['dt_encerramento'])) ? "'".$_POST['dt_encerramento']."'": "'NULL'";
$dt_encerramento = (!empty($_POST['dt_encerramento'])) ?  "'".$_POST['dt_encerramento']."'" : 'NULL';

$query = "UPDATE tbmobile_garantia SET 
                 os = '$os', 
                 problema = '$problema_id', 
                 historico = '$historico',         
                 dt_encerramento = $dt_encerramento                                        
           WHERE id = $id ";


$query_os = "UPDATE tbmobile_os SET                 
                    ordem_servico = '$os', 
                    historico = '$historico'                                                         
             WHERE id_evento = $id and ocorrencia = '3'";           


//print($query);
//print($query_os);
mysqli_query($conexao, $query);
mysqli_query($conexao, $query_os);


include 'db2.php';
mysqli_query($conexao2, $query);
mysqli_query($conexao2, $query_os);


header('location:index.php?#eventos');









