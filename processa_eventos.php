<head>
    <meta charset="UTF-8"/>

<?php

include 'db.php';




//MODIFICANDO EVENTOS
$id = $_POST['id'];
$id_prod = $_POST['id_prod'];
$dt_inicio = $_POST['dt_inicio'];
$ender_unidade = $_POST['ender_unidade'];
$os = $_POST['os'];
$problema_id = $_POST['problema_id'];
$alert = $_POST['alert'];
$historico = $_POST['historico'];
$status_id = $_POST['status_id'];
$ender_destino = (!empty($_POST['ender_destino'])) ? "'".$_POST['ender_destino']."'" : 'NULL';
$imei = $_POST['imei'];
//$status = $_POST['status'];

$dt_encerramento = (!empty($_POST['dt_encerramento'])) ?  "'".$_POST['dt_encerramento']."'"  : 'NULL';

$cabo = (isset($_POST['cabo'])) ? $_POST['cabo']: '0';
$charger = (isset($_POST['charger'])) ? $_POST['charger']: '0';
$caixa = (isset($_POST['caixa'])) ? $_POST['caixa']: '0';
$fone = (isset($_POST['fone'])) ? $_POST['fone']: '0';
$capa = (isset($_POST['capa'])) ? $_POST['capa']: '0';
$chip = (isset($_POST['chip'])) ? $_POST['chip']: '0';
$pelicula = (isset($_POST['pelicula'])) ? $_POST['pelicula']:'0';
$veicular = (isset($_POST['veicular'])) ? $_POST['veicular']:'0';
$suporte = (isset($_POST['suporte'])) ? $_POST['suporte']:'0';


//Grava os dados necessários para formar a OSI
$up_os = "UPDATE tbmobile_os SET
          id_evento = '$id',
          /*id_prod = '$id_prod',*/           
          ordem_servico = '$os',
          ocorrencia = '$status_id',
          dt_os = '$dt_inicio',
          historico = '$historico',
          unidade = '$ender_unidade',          
          problema = '$problema_id',
          alert = '$alert'
          WHERE (id_evento = $id || id_prod = $id_prod) and (ocorrencia = $status_id and ordem_servico = $os)";


// Altera o STATUS na tabela principal
$up_status = "UPDATE tbmobile SET 
              DATA = '$dt_inicio',  
              STATUS = '$status_id'			
              WHERE id = $id_prod"; 





// Altera o UNIDADE na tabela principal, somente quando for retirada
$up_unidade_destino = "UPDATE tbmobile SET 
                        UNIDADE = '$ender_unidade'				
                        WHERE id = $id_prod and 
                        STATUS = '4' "; 



//
$up_tbmobile_garantia = "UPDATE tbmobile_garantia SET                        
                         historico = '$historico',                  
                         dt_encerramento = $dt_encerramento,
                         os = '$os',
                         problema = '$problema_id',
                         alert = '$alert'
                         WHERE id = $id and (id_prod = $id_prod and status = '3')";

//
$up_tbmobile_movimentacao = "UPDATE tbmobile_movimentacao SET
                             historico = '$historico',                  
                             dt_encerramento = $dt_encerramento,
                             problema = '$problema_id',
                             alert = '$alert',
                             os = '$os', 
                             cabo = '$cabo',
                             charger = '$charger',
                             fone = '$fone',
                             capa = '$capa',
                             chip = '$chip',
                             pelicula = '$pelicula',
                             veicular = '$veicular',
                             suporte =  '$suporte'
                             WHERE id = $id and (id_prod = $id_prod)  and (status = '4' || status = '5')";
                           


//
$up_tbmobile_manutencao = "UPDATE tbmobile_manutencao SET
                           historico = '$historico',
                           dt_inicio = '$dt_inicio',
                           dt_encerramento = $dt_encerramento,
                           os = '$os',
                           problema = '$problema_id',
                           alert = '$alert'
                           WHERE id = $id and status = '2'"; 





//echo $up_os;
//echo $up_status;
//echo $up_tbmobile_garantia;
//echo $up_tbmobile_manutencao;
//echo $up_tbmobile_movimentacao;


mysqli_query($conexao, $up_os);
mysqli_query($conexao, $up_status);
mysqli_query($conexao, $up_tbmobile_garantia);
mysqli_query($conexao, $up_tbmobile_manutencao);
mysqli_query($conexao, $up_tbmobile_movimentacao);
mysqli_query($conexao, $up_unidade_destino);

//echo $movimentacao;
//echo $insert_os;


include 'db2.php';
mysqli_query($conexao2, $up_os);
mysqli_query($conexao2, $up_status);
mysqli_query($conexao2, $up_tbmobile_garantia);
mysqli_query($conexao2, $up_tbmobile_manutencao);
mysqli_query($conexao2, $up_tbmobile_movimentacao);
mysqli_query($conexao2, $up_unidade_destino);



header('location:index.php?#mensagens');

?>

</head>
