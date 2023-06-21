<?php

include 'funcoes.inc'; //Chama o arquivo de funções incluindo (icones,...)
include 'db.php';

?>
<body>


<div class="sidebar">
  <button class="tablinks" onclick="openCity(event, 'inicio')" id="defaultOpen"><a href="#inicio"  style="font-size: 18px"><i class="fa fa-fw fa-home"></i> Home </a></button>
  <button class="tablinks" onclick="openCity(event, 'chamados')"><a href="#chamados"  style="font-size: 18px"><i class="fa fa-fw fa-wrench"></i> Novo Chamado</a></button>
  <button><a href="?pagina=eventos" style="font-size: 18px"><i class="bi bi-pie-chart"></i> Eventos</a></button> 
  <button><a href="?pagina=pendentes"  style="font-size: 18px"><i class="bi bi-pie-chart"></i> Pendentes</a></button>
  <button><a href="app/views/relatorio.php"  style="font-size: 18px"><i class="bi bi-pie-chart"></i> Relatório </a></button>
</div>









    <div class="main">
      <h2>GCM MOBILE - PAINEL ADMINISTRATIVO</h2>
       <br>
         <div id="inicio" class="tabcontent">
          <h3>ANALYTICS <i class="fa fa-fw fa-wrench"></i></h3>
           <div class="row">
           <div class="carousel-item active">
           <?php include 'app/views/cardOp.php';?> 
          </div>
        </div>
      </div>



 
  <div id="chamados" class="tabcontent"> 
    <!-- Fixed header table-->
      <div class="container lista-geral">                       
           <h3 class="primary-color">LISTA GERAL</h3>   
             <form action="?pagina=aparelhos" method="post" target="_blank">
               <button type="submit" class="btn btn-info" style="color: white;" value="Submit"> ENCAMINHAR VÁRIOS APARELHOS </button>             
                   <table class="table table-title"> 
                        <thead>
                            <tr>                  
                              <th scope="col" class="col-2">UNIDADE</th>
                              <th scope="col" class="col-2">IMEI</th>   
                              <th scope="col" class="col-2">SERIE</th>  
                              <th scope="col" class="col-2">NUMERO</th> 
                              <th scope="col" class="col-2">STATUS</th>  
                              <th scope="col" class="col-1">DATA</th>
                              <th scope="col" class="col-1">ENCAMINHAR</th>                                     
                            </tr>
                          </thead>
                       </table>
                    <div class="table-responsive">
                       <table class="table table-bordered">                  	
                          <tbody> 
                           <?php 
                              while($linha = mysqli_fetch_array($consulta_tbmobile)){      
                              echo '<tr><td><input type="checkbox" id='.$linha['id'].' name="aparelhos[]" value='.$linha['id'].'></td>';                                                                           
                                echo '<td class="col-2">'.$linha['sigla'].'&nbsp;</td>';                              
                                  echo '<td class="col-2">'.$linha['IMEI'].'&nbsp;</td>';
                                    echo '<td class="col-2">'.$linha['SERIE'].'&nbsp;</td>';
                                      echo '<td class="col-2">'.$linha['NUMERO'].'&nbsp;</td>';
                                        echo '<td class="col-2">'.$linha['status'].'&nbsp;</td>';
                                          echo '<td class="col-1">'.$linha['DATA'].'&nbsp;</td>';	                      
                                       ?>                 
                                  <td class="col-1"><a class="text-danger" href="?pagina=manutencao_mobile&manutencao=<?php echo 
                               $linha['id']; ?>"><i class="fas fa-bars"></i>
                             </a></td></tr>                             
                          <?php
                         } ?>
                   </tbody>		
                 </table> 
              </form>               
            </div>
         </div>
    








 <script> //CONFIGURAÇÃO DA SELEÇÃO DO MENU LATERAL PAGINA HOME
  function openCity(evt, cityName) {
      var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }            
    document.getElementById("defaultOpen").click();
</script> 

               






        
 

      



        
      

   