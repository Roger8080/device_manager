<?php 

/* 
Site: Abertura de chamados
Autor: Roger Felix
Data: 21 de Abril, 2022
*/



/* Define a página atual pela URL */
$pagina = 'home';

if(isset($_GET['pagina'])){
	$pagina = addslashes($_GET['pagina']);
}

/* Carrega o header.php */
include 'app/views/header.php';

#Database
include 'db.php';

/* Carrega a página escolhida pelo usuário */
switch ($pagina) {
	case 'home': include 'app/views/home.php'; break;

	case 'inserir_mobile': include 'app/views/inserir_mobile.php'; break;	

	case 'manutencao_mobile': include 'app/views/manutencao_mobile.php'; break;	
	
	case 'modal_manutencao': include 'app/views/modal_manutencao.php'; break;
	
	case 'eventos': include 'app/views/eventos.php'; break;

	case 'aparelhos': include 'app/views/manutencao_mobile_varios.php'; break;

	case 'estatisticas': include 'app/views/estatisticas.php'; break;	

	case 'chamados': include 'app/views/chamados.php'; break;	

	case 'pendentes': include 'app/views/pendentes.php'; break;	

	case 'encerramento_varios': include 'processa_encerramento_varios.php'; break;	

}



include 'app/views/footer.php';

echo "";