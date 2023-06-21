<?php

include 'db.php';

//TBMOBILE_MOVIMENTACAO
$id_prod = $_POST['id'];
$ender_unidade = $_POST['ender_unidade'];
$status = $_POST['status'];
$ender_destino = (!empty($_POST['ender_destino'])) ? "'".$_POST['ender_destino']."'" : 'NULL';
$imei = $_POST['imei'];
$historico = $_POST['historico'];
$osi = $_POST['osi'];
$id_problema = $_POST['id_problema'];
$dt_inicio = $_POST['dt_inicio'];

$cabo = (isset($_POST['cabo'])) ? $_POST['cabo']: '0';
$charger = (isset($_POST['charger'])) ? '1' : '0';
$caixa = (isset($_POST['caixa'])) ? $_POST['caixa']: '0';
$fone = (isset($_POST['fone'])) ? $_POST['fone']: '0';
$capa = (isset($_POST['capa'])) ? $_POST['capa']: '0';
$chip = (isset($_POST['chip'])) ? $_POST['chip']: '0';
$pelicula = (isset($_POST['pelicula'])) ? $_POST['pelicula']:'0';
$veicular = (isset($_POST['veicular'])) ? $_POST['veicular']:'0';
$suporte = (isset($_POST['suporte'])) ? $_POST['suporte']:'0';

$dt_encerramento = (!empty($_POST['dt_encerramento'])) ?  $_POST['dt_encerramento'] : 'NULL';

$insert_movimentacao = "INSERT INTO tbmobile_movimentacao
                      (id_prod, 
                      dt_inicio, 
                      dt_encerramento,
                      ativo,
                      unidade, 
                      status ,
                      unidade_destino, 
                      historico, 
                      os, 
                      problema,
                      cabo,
                      charger,
                      caixa,
                      fone,
                      capa,
                      chip, 
                      pelicula, 
                      veicular,
                      suporte) 
                      values 
('$id_prod','$dt_inicio',NULL,'1','$ender_unidade','$status',$ender_destino,'$historico','$osi','$id_problema','$cabo','$charger','$caixa','$fone','$capa','$chip','$pelicula','$veicular','$suporte')";


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
                        

// Altera o UNIDADE na tabela principal, somente quando for retirada
$up_unidade_retirada = "UPDATE tbmobile SET 
                        UNIDADE = $ender_destino,	
                        cabo = $cabo,
                        charger = $charger,
                        caixa = $caixa,
                        pelicula = $pelicula,
                        capa = $capa,
                        fone = $fone,
                        chip = $chip,
                        veicular = $veicular,
                    	suporte = $suporte		
                        WHERE id = $id_prod and 
                        STATUS = '4' ";                        


// Altera o UNIDADE na tabela principal, somente quando for devolução
$up_unidade_devolucao = "UPDATE tbmobile SET 
                        UNIDADE = '380001070000000',
                        cabo = $cabo,
                        charger = $charger,
                        caixa = $caixa,
                        pelicula = $pelicula,
                        capa = $capa,
                        fone = $fone,
                        chip = $chip,
                        veicular = $veicular,
                    	suporte = $suporte					
                        WHERE id = $id_prod and 
                        STATUS = '5' ";      
                        
                  
                          



mysqli_query($conexao, $insert_movimentacao);
mysqli_query($conexao, $insert_os);
mysqli_query($conexao, $up_status);
mysqli_query($conexao, $up_unidade_retirada);
mysqli_query($conexao, $up_unidade_devolucao);


/*echo $movimentacao;*/
/*echo $insert_os;*/ 



// Realiza as mesmas alterações na segunda base de dados (db2.php)
include 'db2.php';

mysqli_query($conexao2, $insert_movimentacao);
mysqli_query($conexao2, $insert_os);
mysqli_query($conexao2, $up_status);
mysqli_query($conexao2, $up_unidade_retirada);
mysqli_query($conexao2, $up_unidade_devolucao);





header('location:index.php?#inicio');





