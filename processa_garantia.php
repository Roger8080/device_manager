<?php

include 'db.php';

//TBMOBILE_GARANTIA
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
('$id_prod','$dt_inicio',NULL,'1','$ender_unidade','$status','$historico','$osi','$id_problema')";




if (is_array($id_prod)){

// Início da transação
mysqli_begin_transaction($conexao);
try {
    // Loop para construir os valores para inserção
    foreach ($id_prod as $ids) {
        $insert_os_array = "INSERT INTO tbmobile_os
                     (id_prod,
                     ordem_servico,
                     ocorrencia,
                     dt_os,
                     historico,
                     unidade,
                     problema)
                     values
                    ('$ids','$osi','$status','$dt_inicio','$historico','$ender_unidade','$id_problema')";
 // Executa a consulta
mysqli_query($conexao, $insert_os_array);
    }

// Confirma a transação
mysqli_commit($conexao);
    echo "Inserção de lotes realizada com sucesso!";
} catch (Exception $e) {

// Caso ocorra algum erro, desfaz a transação
mysqli_rollback($conexao);
    echo "Erro na inserção de lotes: " . $e->getMessage();
}

}else{



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


}



// Altera o STATUS na tabela principal
$up_status = "UPDATE tbmobile SET 
                              STATUS = '$status'				
                              WHERE id in ($id_prod)";

                     

//print($insert_garantia);









mysqli_query($conexao, $insert_garantia);
mysqli_query($conexao, $insert_os);
mysqli_query($conexao, $up_status);

/*echo $movimentacao;*/
/*echo $insert_os;*/ 


include 'db2.php';
mysqli_query($conexao2, $insert_garantia);
mysqli_query($conexao2, $insert_os);
mysqli_query($conexao2, $up_status);

header('location:index.php?#inicio');







