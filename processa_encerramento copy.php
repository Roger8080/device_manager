<?php
include 'db.php';



$pendentes = (!empty($_POST["pendentes"]));
$status = $_POST["status"];
$dt_encerramento = (!empty($_POST['dt_encerramento'])) ? $_POST['dt_encerramento'] : date('d-m-Y');




if (isset($_POST['pendentes']) && is_array($_POST['pendentes']) && !empty($_POST['pendentes'])) {
    $pendentes = $_POST['pendentes'];
    foreach ($pendentes as $pendente) {
         "{$pendente}";
   }
       

   

for ($i = 0; $i < sizeof($pendentes); $i++) {

$up_tbmobile_manutencao = "UPDATE tbmobile_manutencao SET
                           dt_encerramento = $dt_encerramento
                           WHERE id = $pendentes[$i] and $status = '2'"; 
        
        
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
/*
include 'db2.php';
mysqli_query($conexao2, $up_tbmobile_manutencao);
mysqli_query($conexao2, $up_tbmobile_garantia);
mysqli_query($conexao2, $up_tbmobile_movimentacao);
*/        
        
    }

header('location:index.php?pagina=pendentes');

} else {



    


}












//TBMOBILE_MOVIMENTACAO
// Converta o array $ids em uma string separada por vírgulas para fins de visualização apenas
$ids = $_POST['ids'];
echo $ids_str = implode(',', $ids);

// Converta o array $ender_unidade em uma string separada por vírgulas para fins de visualização apenas
$ender_unidade = $_POST['ender_unidade'];
echo $ender_unidade_str = implode(',', $ender_unidade);

// Converta o array $imei em uma string separada por vírgulas para fins de visualização apenas
/*$ids_imeis = $_POST['ids_imeis'];
echo $imei_str = implode(',', $ids_imeis);*/

echo $status = $_POST['status'];
echo $ender_destino = (!empty($_POST['ender_destino'])) ? "'".$_POST['ender_destino']."'" : 'NULL';
echo $historico = $_POST['historico'];
echo $osi = $_POST['osi'];
echo $id_problema = $_POST['id_problema'];
echo $dt_inicio = $_POST['dt_inicio'];

echo $cabo = (isset($_POST['cabo'])) ? $_POST['cabo']: '0';
echo $charger = (isset($_POST['charger'])) ? '1' : '0';
echo $caixa = (isset($_POST['caixa'])) ? $_POST['caixa']: '0';
echo $fone = (isset($_POST['fone'])) ? $_POST['fone']: '0';
echo $capa = (isset($_POST['capa'])) ? $_POST['capa']: '0';
echo $chip = (isset($_POST['chip'])) ? $_POST['chip']: '0';
echo $pelicula = (isset($_POST['pelicula'])) ? $_POST['pelicula']:'0';
echo $veicular = (isset($_POST['veicular'])) ? $_POST['veicular']:'0';
echo $suporte = (isset($_POST['suporte'])) ? $_POST['suporte']:'0';

echo $dt_encerramento = (!empty($_POST['dt_encerramento'])) ?  $_POST['dt_encerramento'] : 'NULL';




$insert_movimentacao = "INSERT INTO tbmobile_movimentacao
                      (id_prod, 
                      dt_inicio, 
                      dt_encerramento,
                      ativo,
                      unidade, 
                      status,
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
('$ids[$i]','$dt_inicio',NULL,'1','$ender_unidade[$i]','$status',$ender_destino,'$historico','$osi','$id_problema','$cabo',
'$charger','$caixa','$fone','$capa','$chip','$pelicula','$veicular','$suporte')";





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
('$ids[$i]','$osi','$status','$dt_inicio','$historico','$ender_unidade[$i]','$id_problema')";


// Altera o STATUS na tabela principal
$up_status = "UPDATE tbmobile SET 
                        STATUS = '$status';	
                        DATA = '$dt_inicio'			
                        WHERE id = '$ids[$i]'";
                        

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
                        WHERE id = '$ids[$i]'and 
                        $status = '4' ";                        


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
                        WHERE id = '$ids[$i]' and 
                        $status = '5' ";      
                        
                 
                    


mysqli_query($conexao, $insert_movimentacao);
mysqli_query($conexao, $insert_os);
mysqli_query($conexao, $up_status);
mysqli_query($conexao, $up_unidade_retirada);
mysqli_query($conexao, $up_unidade_devolucao);





include 'db2.php';

mysqli_query($conexao2, $insert_movimentacao);
mysqli_query($conexao2, $insert_os);
mysqli_query($conexao2, $up_status);
mysqli_query($conexao2, $up_unidade_retirada);
mysqli_query($conexao2, $up_unidade_devolucao);




}

/*
echo $movimentacao;
echo $insert_os;

*/


header('location:index.php?#inicio');
