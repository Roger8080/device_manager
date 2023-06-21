<?php
//nome do arquivo processa_encerramento_varios.php
include 'db.php';

//$pendentes = (!empty($_POST["pendentes"])); // é um array
$status_ids = $_POST["status_ids"]; // é um array
$id_prods = $_POST['id_prods'];
$dt_encerramento = date('Y-m-d');

//print_r($pendentes);
//print_r($status_ids);
//echo $dt_encerramento;

if (isset($_POST['pendentes']) && is_array($_POST['pendentes']) && !empty($_POST['pendentes'])) {

$pendentes = $_POST['pendentes'];


for ($i = 0; $i < sizeof($pendentes); $i++) {   

            $up_manutencao_varios = "UPDATE tbmobile_manutencao SET
            dt_encerramento = '{$dt_encerramento}'
            WHERE id = '{$pendentes[$i]}' AND (status = '{$status_ids[$i]}' and id_prod = '{$id_prods[$i]}')"; 
            mysqli_query($conexao,$up_manutencao_varios);

            $up_retirada_varios = "UPDATE tbmobile_movimentacao SET
            dt_encerramento = '{$dt_encerramento}'
            WHERE id = '{$pendentes[$i]}' AND (status = '{$status_ids[$i]}' and id_prod = '{$id_prods[$i]}')"; 
            mysqli_query($conexao,$up_retirada_varios);

            $up_devolucao_varios = "UPDATE tbmobile_movimentacao SET
            dt_encerramento = '{$dt_encerramento}'
            WHERE id = '{$pendentes[$i]}' AND (status = '{$status_ids[$i]}' and id_prod = '{$id_prods[$i]}')"; 
            mysqli_query($conexao,$up_devolucao_varios);

            $up_garantia_varios = "UPDATE tbmobile_garantia SET
            dt_encerramento = '{$dt_encerramento}'
            WHERE id = '{$pendentes[$i]}' AND (status = '{$status_ids[$i]}' and id_prod = '{$id_prods[$i]}')"; 
            mysqli_query($conexao,$up_garantia_varios);
    
}             
        
       
        





header('location:index.php?pagina=pendentes');

} else {

header('location:index.php?pagina=pendentes');
  
}









