<?php


include 'db.php';


echo $id = $_POST['id'];
echo $status_id = $_POST['status_id'];
echo $dt_encerramento = (!empty($_POST['dt_encerramento'])) ?  $_POST['dt_encerramento'] : 'NULL';




$up_tbmobile_manutencao = "UPDATE tbmobile_manutencao SET
                           dt_encerramento = $dt_encerramento
                           WHERE id = $id and status = '2'"; 


$up_tbmobile_garantia = "UPDATE tbmobile_garantia SET
                           dt_encerramento = $dt_encerramento
                           WHERE id = $id and status = '3'"; 



$up_tbmobile_movimentacao = "UPDATE tbmobile_retirada SET
                           dt_encerramento = $dt_encerramento
                           WHERE id = $id and status = '4'"; 


$up_tbmobile_movimentacao = "UPDATE tbmobile_devolucao SET
                           dt_encerramento = $dt_encerramento
                           WHERE id = $id and status = '5'"; 

         

//print($insert_manutencao);

mysqli_query($conexao, $up_tbmobile_manutencao);
mysqli_query($conexao, $up_tbmobile_garantia);
mysqli_query($conexao, $up_tbmobile_movimentacao);

/*echo $movimentacao;*/
/*echo $insert_os;*/ 

include 'db2.php';
mysqli_query($conexao2, $up_tbmobile_manutencao);
mysqli_query($conexao2, $up_tbmobile_garantia);
mysqli_query($conexao2, $up_tbmobile_movimentacao);


header('location:index.php?pagina=pendentes');





