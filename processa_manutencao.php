<?php

include 'db.php';

//TBMOBILE_MANUTENCAO
$id_prod = $_POST['id'];
$ender_unidade = $_POST['ender_unidade'];
$status = $_POST['status'];
//$ender_destino = (!empty($_POST['ender_destino'])) ? $_POST['ender_destino']: 'NULL';
//$imei = $_POST['imei'];
$historico = $_POST['historico'];
$osi = $_POST['osi'];
$id_problema = $_POST['id_problema'];
$dt_inicio = $_POST['dt_inicio'];

$dt_encerramento = (!empty($_POST['dt_encerramento'])) ?  $_POST['dt_encerramento'] : 'NULL';

$insert_manutencao = "INSERT INTO tbmobile_manutencao
                      (id_prod, 
                      dt_inicio, 
                      dt_encerramento,
                      ativo,
                      unidade, 
                      status ,                                            
                      historico, 
                      os, 
                      problema) 
                      values 
('$id_prod','$dt_inicio',NULL,'1','$ender_unidade','$status','$historico','$osi','$id_problema')";

//Grava os dados necessários para formar a OSI
$insert_os = "INSERT INTO tbmobile_os
             (id_prod,
             ordem_servico,
             ocorrencia,
             dt_os,
             historico,
             unidade,
             problema)
             values
('$id_prod','$osi','$status','$dt_inicio','$historico','$ender_unidade','$id_problema')";

// Altera o STATUS na tabela principal
$up_status = "UPDATE tbmobile SET 
                              STATUS = '$status'				
                              WHERE id = $id_prod";

         

//print($insert_manutencao);

mysqli_query($conexao, $insert_manutencao);
mysqli_query($conexao, $insert_os);
mysqli_query($conexao, $up_status);

/*echo $movimentacao;*/
/*echo $insert_os;*/ 

include 'db2.php';
mysqli_query($conexao2, $insert_manutencao);
mysqli_query($conexao2, $insert_os);
mysqli_query($conexao2, $up_status);

header('location:index.php?#inicio');





