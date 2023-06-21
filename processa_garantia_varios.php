<?php
include 'db.php';

// Converta o array $ids em uma string separada por vírgulas para fins de visualização apenas
$ids = $_POST['ids'];
echo $ids_str = implode(',', $ids);

// Converta o array $ender_unidade em uma string separada por vírgulas para fins de visualização apenas
$ender_unidade = $_POST['ender_unidade'];
echo $ender_unidade_str = implode(',', $ender_unidade);

// Demais variaveis 
echo $status = $_POST['status'];
echo $historico = $_POST['historico'];
echo $osi = $_POST['osi'];
echo $id_problema = $_POST['id_problema'];
echo $dt_inicio = $_POST['dt_inicio'];
echo $dt_encerramento = (!empty($_POST['dt_encerramento'])) ? $_POST['dt_encerramento'] : null;



for ($i = 0; $i < sizeof($ids); $i++) {

$insert_garantia = "INSERT INTO tbmobile_garantia
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
('$ids[$i]','$dt_inicio',NULL,'1','$ender_unidade[$i]','$status','$historico','$osi','$id_problema')";


$insert_os = "INSERT INTO tbmobile_os
                (id_prod,
                ordem_servico,
                ocorrencia,
                dt_os,
                historico,
                unidade,
                problema)
                values
('$ids[$i]','$osi','$status','$dt_inicio','$historico','$ender_unidade[$i]','$id_problema')";




//echo "<h1>$insert_os</h1>";




// Crie sua consulta SQL para o UPDATE
$up_status = "UPDATE tbmobile SET 
                  STATUS = '$status',
                  DATA = '$dt_inicio'
                  WHERE id = $ids[$i]";


// Executa as consultas SQL para o ID atual 
mysqli_query($conexao, $insert_garantia);
mysqli_query($conexao, $insert_os);  
mysqli_query($conexao, $up_status);



include 'db2.php';
mysqli_query($conexao2, $insert_garantia);
mysqli_query($conexao2, $insert_os);  
mysqli_query($conexao2, $up_status);



}


header('location:index.php?#inicio');




