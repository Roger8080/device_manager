<style>
.fa {
 color: blueviolet;
}

.fas {
 color: blueviolet;
 padding: 0px;
}


.btn {
 color: white;
}


.button a:hover{
  color: blueviolet;  
 
}

a[type=button] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 1px;
  background-color: blueviolet;  
}

.tab{
  height: 100%;
  width: 180px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  padding-top: 16px;
}

.tabselect{
  width: 10em;
  height: 3em;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 1px;
  background-color: blueviolet; 
  color: white;
}





/* TENTATIVA DE FIXAR O TITULO TA TABELA



.table-striped tbody {
    height: 300px;
    overflow-y: auto;
    width: 100%;
}

.table-striped thead,
.table-striped tbody,
.table-striped tr,
.table-striped td,
.table-striped th {
    display: block;
}

.table-striped tbody td,
.table-striped tbody th,
.table-striped thead > tr > th {
    float: left;
    position: relative;

    &::after {
        content: '';
        clear: both;
        display: block;
    }
}
*/



/* ABERTURA DE CHAMADOS */
.table-responsive{
    height: 700px;
    overflow-y: auto;
    width: 100%;     
}

.table-responsive td{  
    padding-left: 25px;    
}

.lista-geral{
  max-width: 2000px;
}

.table-title thead > tr > th { /* TODA INFORMAÇÃO SOBRE O CABEÇALHO */
  text-align: left;
  background: white;  
  color: blueviolet;
}









.table-bordered tbody td,
.table-bordered tbody th,
.table-bordered thead > tr > th {
  display: block;
  position: relative;   
  float: left;
  
}



.table-fixed tbody {
    height: 700px;
    overflow-y: auto;
    width: 100%;
}

.table-fixed thead,
.table-fixed tbody,
.table-fixed tr,
.table-fixed td,
.table-fixed th {
    display: block;
}

.table-fixed tbody td,
.table-fixed tbody th,
.table-fixed thead > tr > th {
    float: left;
    position: relative;    
    display: block;
}


</style>




<?php

include 'funcoes.inc';

?>


<body>

<div class="sidebar">
  <button class="tablinks" onclick="openCity(event, 'inicio')" id="defaultOpen"><a href="#inicio"><i class="fa fa-fw fa-home"></i> Início</a></button>
  <button class="tablinks" onclick="openCity(event, 'chamados')"><a href="#chamados"><i class="fa fa-fw fa-wrench"></i> Abertura de Chamados</a></button>
  <button class="tablinks" onclick="openCity(event, 'eventos')"><a href="#eventos"><i class="fa fa-fw fa-user"></i> Eventos</a></button>
  <button class="tablinks" onclick="openCity(event, 'abertos')"><a href="#mensagens"><i class="fa fa-fw fa-envelope"></i> Chamados Abertos</a></button>
</div>


     



<div class="main">
  <h2>GCM MOBILE - PAINEL ADMINISTRATIVO</h>
  <h2></h2>
  <p>Click on the buttons inside the tabbed menu:</p>




<div id="inicio" class="tabcontent">
 <h3>Atalhos Úteis:</h3><br><br>
  <div class="row">
    <div class="container">
    <h2>Planilhas Google</h2>
    <a href="https://docs.google.com/spreadsheets/d/1ML0woLMVjoge9hIMGtohj6XvoWhb1ssyFkXb4RhsZ44/edit?usp=drive_web&ouid=110865446382478669244" target="_blank">
    <img src="https://www.tudoexcel.com.br/wp-content/uploads/2017/09/google-sheet.png" height="150px" width="250px"></a>
    </div><br>

    <div class="container" >
    <h2>Samsung Knox</h2>
    <a href="https://us02.manage.samsungknox.com/emm/admin/secured/emm_main.do" target="_blank">
    <img src="https://play-lh.googleusercontent.com/RA3OFXQKWnuBIlNkuE-PZaqQ61rm67z2-dLo-6d79DBat0Oagiu3QczSqL87N9qeg0M" height="100px" width="100px"></a>
    </div><br>

    <div class="container">
    <h2>Intranet SMSU</h2>
    <a href="http://intranet/smsu/index.php" target="_blank">
    <img src="https://pbs.twimg.com/profile_images/552442078639427584/ATpz6EM9_400x400.jpeg" height="150px" width="140px"></a>  
    </div><br>

    <div class="container">
    <h2>Outlook</h2>
    <a href="https://outlook.office.com/mail" target="_blank">
    <img src="https://findicons.com/files/icons/2795/office_2013_hd/2000/outlook.png" height="135px" width="135px"></a>  
    </div><br>

    <div class="container">    
    <a href="https://go.mgitech.com.br/chamados" target="_blank"><h2>MGITECH</h2></a>  
    </div><br>   
  </div>
</div>  




    





<div id="chamados" class="tabcontent"> 
    <!-- Fixed header table-->
      <div class="container lista-geral">                       
           <h3 class="primary-color">LISTA GERAL</h3><br><br>    
               <a button type="button" class="btn btn-info" href="?pagina=inserir_mobile">Inserir novo Mobile</a>             
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
                                echo '<tr><td class="col-2">'.$linha['sigla'].'&nbsp;</td>';
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
                         }         
                     ?>
                  </tbody>		
               </table> 
            </div>
         </div>
      </div>
    
                
     
       

                            













<div id="eventos" class="tabcontent">
  <div class="container">                      
    <div class="tab">
      <button class="tabselect" onclick="openStat(event, 'manutencao')" id="defaultStat"><i class="bi bi-telephone"></i> Manutenção</button>
        <button class="tabselect" onclick="openStat(event, 'retirada')" ><i class="bi bi-telephone"></i> Retirada </button>
          <button class="tabselect" onclick="openStat(event, 'devolucao')"><i class="bi bi-telephone"></i> Devolução </button>
            <button class="tabselect" onclick="openStat(event, 'garantia')"><i class="bi bi-telephone"></i> Garantia</button>
              <button class="tabselect" onclick="openCity(event, 'inicio')"><i class="fa fa-fw fa-home"></i> Início</button>
                </div>
                  </div>













        <div id="manutencao" class="tabint">                         
           <table class="table table-hover table-striped" id="manutencao_search"> 
              <h3>MANUTENÇÃO</h3><br>                     
                <thead>
                   <tr>
                     <th>UNIDADE</th>
                      <th>IMEI</th>   
                       <th>Data de Abertura</th>
                        <th>Ordem de Serviço</th>
                         <th>Problema</th>
                          <th>Histórico</th>  
                          <th>Data de Encerramento</th> 
                          <th>Editar</th>                                           
                          </tr>
                          </thead>
                          <tbody>
                          <?php 
                         while($linha = mysqli_fetch_array($consulta_manutencao)){
                        echo '<tr><td>'.$linha['sigla'].'</td>';
                        echo '<td>'.$linha['imei'].'</td>';
                        echo '<td>'.date('d/m/Y',strtotime($linha['dt_inicio'])).'</td>';
                        echo '<td>'.$linha['os'].'</td>';
                        echo '<td>'.$linha['problema'].'</td>';
                        echo '<td>'.$linha['historico'].'</td>';    
                        echo '<td>'.date('d/m/Y',strtotime($linha['dt_encerramento'])).'</td>';                                      
                        ?>
         <td><i class="fas fa-bars" data-bs-toggle="modal" data-bs-target="#modalManutencao"
        data-id="<?php echo $linha['id']; ?>"
          data-problema_id="<?php echo $linha['problema_id']; ?>"
            data-sigla="<?php echo $linha['sigla']; ?>"
              data-dt_inicio="<?php echo $linha['dt_inicio']; ?>"
                data-os="<?php echo $linha['os']; ?>"
                  data-problema="<?php echo $linha['problema']; ?>"
                    data-historico="<?php echo $linha['historico']; ?>"
                      data-dt_encerramento="<?php echo $linha['dt_encerramento']; ?>">
                          </i></td></tr>
                            <div class="modal fade" id="modalManutencao" tabindex="-1" aria-labelledby="modalManutencaoLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="modalManutencaoLabel">MANUTENÇÃO</h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                       </div>
                                         <div class="modal-body">
                                           <form method="post" action="edita_manutencao.php">     
                                            <div class="mb-3">
                                             <label for="data inicio"  class="col-form-label">Data Início:</label>
                                              <input type="date" name="data_inicio" data-id class="form-control" id="dt_inicio" readonly>
                                               </div>
                                               <div class="mb-3">
                                              <label for="id" class="col-form-label">ID:</label>
                                             <input type="label" class="form-control" name="id" id="id" readonly>
                                            </div>                                                    
                                           <input type="label" class="form-control" name="p_id" id="p_id" hidden>                                                    
                                          <div class="mb-3">
                                         <label for="sigla" class="col-form-label">sigla:</label>
                                        <input type="text" name="sigla" class="form-control" id="sigla" readonly>
                                       </div>
                                      <div class="mb-3">
                                     <label for="os" class="col-form-label">OS:</label>
                                    <input type="text" name="os" class="form-control" name="os" id="os">
                                   </div>
                                  <div class="mb-3">
                                 <label>Problema:</label><br>
                                <select span class="bedge" name="problema">
                               <option class="bedge" id="problema"></option> 
                              <?php 
                             while($linha_problema = mysqli_fetch_array($consulta_problema1)){
                            echo '<option value="'.$linha_problema['id'].'">'.$linha_problema['descricao'].'</option>';
                            }
                             ?> 
                             </select>   
                             <input type="label" class="form-control" name="problema_id" id="problema_id" hidden>                    
                              </div>
                               <div class="mb-3">
                                <label for="historico" class="col-form-label">Histórico:</label>
                                 <textarea class="form-control" name="historico" rows="5" id="historico"></textarea>
                                  </div><br>
                                   <div class="mb-3">
                                    <label for="data encerramento" class="col-form-label">Data de Encerramento:</label>
                                     <input type="date" name="dt_encerramento" id="dt_encerramento"></input>
                                      </div>                          
                                       </div>
                                        <div class="modal-footer">
                                         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Sair</button>
                                        <button type="input" class="btn btn-primary">Salvar Informações</button>
                                       </form>
                                      </div>
                                     </div>
                                   </div>                       
                                 <?php
                                }         
                              ?>  
                            </tbody>		
                          </table> 
                        </div>  

             <script>
               $(function(){ 
                $('#modalManutencao').on('show.bs.modal', function (event) {
                 var button = $(event.relatedTarget)
                  if (button.data('problema_id')=='') {
                   var problema_id = '9';
                    }else {
                     var problema_id = button.data('problema_id');
                      }
                      var id = button.data('id');
//                     var problema_id = button.data('problema_id');
                        var sigla = button.data('sigla');
                         var os = button.data('os');
                          var historico = button.data('historico');
                           var problema = button.data('problema');
                            var dt_inicio = button.data('dt_inicio');
                             var dt_encerramento = button.data('dt_encerramento');
                              var modal = $(this)
                             modal.find('.modal-title').text('Data da ultima Atualização: ' + dt_inicio)
                            modal.find('#id').val(id) 
                           modal.find('#sigla').val(sigla)
                          modal.find('#dt_inicio').val(dt_inicio)
                         modal.find('#os').val(os)
                        modal.find('#historico').val(historico)                                                       
                       modal.find('#problema').val(problema_id).text(problema)                                 
                     modal.find('#problema_id').val(problema_id)    
                    modal.find('#dt_encerramento').val(dt_encerramento)              
                      });
                    });
                  </script>
          
 
			 















      <div id="retirada" class="tabint">  
       <div class="container lista-geral"> 
         <h3>RETIRADA</h3><br>   
           <table class="table table-hover table-striped" id="retirada_search">                        
		           <thead>
                   <tr>
                     <th scope="col" class="col" >Data_Retirada</th>
                      <th scope="col" class="col-2">IMEI</th>
                       <th scope="col" class="col-3">Origem</th>
                        <th scope="col" class="col-3">Status</th>
                         <th scope="col" class="col-2">Destino</th>  
                          <!--<th>Data de Retirada</th>  -->
                           <th scope="col" class="col-1">OSI</th>   
                            <th scope="col" class="col-1">cabo</th>
                             <th scope="col" class="col-1">charger</th>  
                            <th scope="col" class="col-1">caixa</th>  
                           <th scope="col" class="col-1">pelicula</th>  
                          <th scope="col" class="col-1">capa</th>  
                         <th scope="col" class="col-1">fone</th>  
                        <th scope="col" class="col-1">chip</th>  
                       <th scope="col" class="col-1">veicular</th>     
                      <th scope="col" class="col-1">suporte</th> 
                     <th scope="col" class="col-1">EDITAR</th>                                        
                    </tr>
                </thead>    
            <tbody>             
                <?php
                  while($linha = mysqli_fetch_array($consulta_retirada)){                      
                      echo '<tr><td>'.date('d/m/Y',strtotime($linha['dt_inicio'])).'&nbsp;</td>'; 
                        echo '<td>'.$linha['IMEI'].'&nbsp;</td>';
                          echo '<td>'.$linha['sigla'].'&nbsp;</td>';
                           echo '<td>'.$linha['status'].'&nbsp;</td>';
                            echo '<td>'.$linha['sigla_destino'].'&nbsp;</td>'; //Buscando Alias
                            /*echo '<td>'.date('d/m/Y',strtotime($linha['dt_encerramento'])).'</td>'; */                          
                             echo '<td>'.$linha['os'].'&nbsp;</td>';                                                           
                             echo '<td>'.icones($linha['cabo']).'&nbsp;</td>';                                
                            echo '<td>'.icones($linha['charger']).'&nbsp;</td>';
                          echo '<td>'.icones($linha['caixa']).'&nbsp;</td>';
                        echo '<td>'.icones($linha['pelicula']).'&nbsp;</td>';
                      echo '<td>'.icones($linha['capa']).'&nbsp;</td>';
                   echo '<td>'.icones($linha['fone']).'&nbsp;</td>';
                echo '<td>'.icones($linha['chip']).'&nbsp;</td>';
             echo '<td>'.icones($linha['veicular']).'&nbsp;</td>';
           echo '<td>'.icones($linha['suporte']).'&nbsp;</td>';    
           /*
            if ($linha['suporte'] == '1'){
            echo '<td><i class="bi bi-check2-circle" style="color:green"></i></td>';                         
          } else{
            echo '<td><i class="bi bi-x-circle" style="color:red"></i></td>';
          } O codigo antes de ser otimizado para a funcao icones*/                                   
        ?>  
           
<!-- MODAL RETIRADA -->      
<td><i class="fas fa-bars" data-bs-toggle="modal" data-bs-target="#modalRetirada"
 data-id="<?php echo $linha['id']; ?>"
  data-id_prod="<?php echo $linha['id_prod']; ?>"
    data-sigla="<?php echo $linha['sigla']; ?>"
    data-unidade="<?php echo $linha['unidade']; ?>"
      data-dt_inicio="<?php echo $linha['dt_inicio']; ?>"
        data-dt_encerramento="<?php echo $linha['dt_encerramento']; ?>"
          data-os="<?php echo $linha['os']; ?>"
            data-status="<?php echo $linha['status']; ?>"
             data-status_id="<?php echo $linha['status_id']; ?>"
               data-historico="<?php echo $linha['historico']; ?>"
                 data-cabo="<?php echo $linha['cabo']; ?>"  
                   data-charger="<?php echo $linha['charger']; ?>" 
                     data-caixa="<?php echo $linha['caixa']; ?>" 
                       data-fone="<?php echo $linha['fone']; ?>"
                         data-capa="<?php echo $linha['capa']; ?>" 
                            data-chip="<?php echo $linha['chip']; ?>"  
                             data-pelicula="<?php echo $linha['pelicula']; ?>"                        
                               data-veicular="<?php echo $linha['veicular']; ?>" 
                                 data-suporte="<?php echo $linha['suporte']; ?>"></i></td></tr>
                    <div class="modal fade" id="modalRetirada" tabindex="-1" aria-labelledby="retiradaLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="retiradaModalLabel">RETIRADA</h5>
                             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                               <div class="modal-body">
                              <form method="post" action="edita_movimentacao.php">     
                            <div class="mb-3">
                           <label for="data inicio"  class="col-form-label">Data Início:</label>
                         <input type="date" name="data_inicio" data-id class="form-control" id="dt_inicio" readonly>
                       </div>
                     <div class="mb-3">
                   <label for="id" class="col-form-label">ID:</label>
                  <input type="label" class="form-control" name="id" id="id" readonly>
                 <input type="label" class="form-control" id="id_prod" name="id_prod" hidden>
                </div>
               <div class="mb-3">
               <label for="sigla" class="col-form-label">sigla:</label>
               <input type="text" name="sigla" class="form-control" id="sigla" readonly>
               <input type="text" class="form-control" name="unidade" id="unidade" hidden>
               </div>
                <div class="mb-3">
                 <label for="os" class="col-form-label">OS:</label>
                  <input type="text" name="os" class="form-control" name="os" id="os">
                   </div>
                    <div class="mb-3">
                     <label for="status" class="col-form-label">Status:</label>
                      <input type="text" name="status" class="form-control" id="status" readonly></label>
                       <input type="text" class="form-control" id="status_id" name="status_id" hidden></label>
                        </div>
                         <div class="mb-3">
                          <label for="historico" class="col-form-label">Histórico:</label>
                            <textarea class="form-control" name="historico" rows="5" id="historico"></textarea>
                             </div><br> 
                               <div class="container-acess mt-2">                       
                                 <input type="checkbox" id="cabo" name="cabo" value="1" ><label>Cabo C</label>
                                  <input type="checkbox" id="charger" name="charger" value="1" ><label for="charger">Charger</label>
                                    <input type="checkbox" id="caixa" name="caixa" value="1" ><label for="caixa">Caixa</label>
                                      <input type="checkbox" id="fone" name="fone" value="1" ><label for="fone">Fone</label>
                                        <input type="checkbox" id="capa" name="capa" value="1" ><label for="capa">Capa</label><br>
                                          <input type="checkbox" id="chip" name="chip" value="1" ><label for="chip">Chip</label> 
                                            <input type="checkbox" id="pelicula" name="pelicula" value="1" ><label for="pelicula">Pelicula </label>                        
                                              <input type="checkbox" id="veicular" name="veicular" value="1" ><label for="veicular">Veicular C</label> 
                                                <input type="checkbox" id="suporte" name="suporte" value="1" ><label for="suporte">Suporte</label> 
                                                 </div><br>
                                                  <div class="mb-3">
                                                   <label for="data encerramento" class="col-form-label">Data de Encerramento:</label>
                                                    <input type="date" name="dt_encerramento" id="dt_encerramento"></input>
                                                    </div>                          
                                                   </div>
                                                  <div class="modal-footer">
                                                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Sair</button>
                                                <button type="input" class="btn btn-primary">Salvar Informações</button>
                                              </form>
                                            </div>
                                          </div>
                                        </div>                       
                                      <?php
                                     }         
                                  ?>  
                               </tbody>		
                             </table> 
                           </div>
                        </div>
               
                  <script>
               $(function(){ 
                $('#modalRetirada').on('show.bs.modal', function (event) {
                 var button = $(event.relatedTarget)
                  var id = button.data('id');
                   var id_prod = button.data('id_prod');
                    var sigla = button.data('sigla');
                     var unidade = button.data('unidade');
                      var os = button.data('os');
                       var historico = button.data('historico');
                        var status = button.data('status');
                         var status_id = button.data('status_id');
                          var dt_inicio = button.data('dt_inicio');
                           var dt_encerramento = button.data('dt_encerramento');
                            var cabo = button.data('cabo');
                             var charger = button.data('charger');
                              var caixa = button.data('caixa');
                               var fone = button.data('fone');
                                var capa = button.data('capa');
                                 var chip = button.data('chip');
                                  var pelicula = button.data('pelicula');
                                   var veicular = button.data('veicular');
                                    var suporte = button.data('suporte');
                                     var modal = $(this)
                                    modal.find('.modal-title').text('Data da ultima Atualização: ' + dt_inicio)
                                   modal.find('#cabo').prop('checked', (cabo=='1'))
                                  modal.find('#charger').prop('checked', (charger=='1'))
                                 modal.find('#caixa').prop('checked', (caixa=='1'))
                                modal.find('#fone').prop('checked', (fone=='1'))
                               modal.find('#capa').prop('checked', (capa=='1'))
                              modal.find('#chip').prop('checked', (chip=='1'))
                             modal.find('#pelicula').prop('checked', (pelicula=='1'))
                            modal.find('#veicular').prop('checked', (veicular=='1'))
                           modal.find('#suporte').prop('checked', (suporte=='1'))      
                          modal.find('#id').val(id) 
                         modal.find('#id_prod').val(id_prod) 
                        modal.find('#sigla').val(sigla)
                       modal.find('#unidade').val(unidade)
                      modal.find('#dt_inicio').val(dt_inicio)
                     modal.find('#os').val(os)
                    modal.find('#historico').val(historico)  
                   modal.find('#status').val(status) 
                  modal.find('#status_id').val(status_id)      
                 modal.find('#dt_encerramento').val(dt_encerramento)              
                 });
                });
               </script>













     
        <div id="devolucao" class="tabint">           
          <div class="container lista-geral">
            <h3>DEVOLUÇÃO</h3><BR>               
              <table class="table table-hover table-striped" id="devolucao_search">             
                  <thead>
                    <tr>
                      <th>Data_Devolução</th>
                        <th>IMEI</th>
                          <th>Origem</th>
                            <th>Status</th>
                              <th>Destino</th>  
                               <!-- <th>Data de Devolução</th> --> 
                                 <th>OSI</th>   
                                  <th>cabo</th>
                                   <th>charger</th>  
                                  <th>caixa</th>  
                                 <th>pelicula</th>  
                                <th>capa</th>  
                               <th>fone</th>  
                              <th>chip</th>  
                             <th>veicular</th>     
                            <th>suporte</th>   
                           <th>EDITAR</th>                                       
                          </tr>
                         </thead>
                        <tbody>
                      <?php 
                    while($linha = mysqli_fetch_array($consulta_devolucao)){
                      echo '<tr><td>'.date('d/m/Y',strtotime($linha['dt_inicio'])).'</td>'; 
                       echo '<td>'.$linha['IMEI'].'</td>';
                        echo '<td>'.$linha['sigla'].'</td>';
                         echo '<td>'.$linha['status'].'</td>';
                          echo '<td>'.$linha['sigla_destino'].'</td>'; //Buscando Alias
                            /* echo '<td>'.date('d/m/Y',strtotime($linha['dt_encerramento'])).'</td>'; */                              
                             echo '<td>'.$linha['os'].'</td>';                   
                              echo '<td>'.icones($linha['cabo']).'</td>'; //Utilizando a função .icones para otimizar o codigo                               
                             echo '<td>'.icones($linha['charger']).'</td>';
                            echo '<td>'.icones($linha['caixa']).'</td>';
                           echo '<td>'.icones($linha['pelicula']).'</td>';
                          echo '<td>'.icones($linha['capa']).'</td>';
                         echo '<td>'.icones($linha['fone']).'</td>';
                        echo '<td>'.icones($linha['chip']).'</td>';
                       echo '<td>'.icones($linha['veicular']).'</td>';
                      echo '<td>'.icones($linha['suporte']).'</td>';                      
                      ?> 
<td><i class="fas fa-bars" data-bs-toggle="modal" data-bs-target="#modalDevolucao"
data-id="<?php echo $linha['id']; ?>"
 data-id_prod="<?php echo $linha['id_prod']; ?>"
   data-sigla="<?php echo $linha['sigla']; ?>"
     data-unidade="<?php echo $linha['unidade']; ?>"
       data-dt_inicio="<?php echo $linha['dt_inicio']; ?>"
         data-os="<?php echo $linha['os']; ?>"
           data-status="<?php echo $linha['status']; ?>"
            data-status_id="<?php echo $linha['status_id']; ?>"
              data-historico="<?php echo $linha['historico']; ?>"
                data-cabo="<?php echo $linha['cabo']; ?>"  
                  data-charger="<?php echo $linha['charger']; ?>" 
                    data-caixa="<?php echo $linha['caixa']; ?>" 
                      data-fone="<?php echo $linha['fone']; ?>"
                        data-capa="<?php echo $linha['capa']; ?>" 
                          data-chip="<?php echo $linha['chip']; ?>"  
                            data-pelicula="<?php echo $linha['pelicula']; ?>"                        
                              data-veicular="<?php echo $linha['veicular']; ?>" 
                                data-suporte="<?php echo $linha['suporte']; ?>"></i></td></tr>
                    <div class="modal fade" id="modalDevolucao" tabindex="-1" aria-labelledby="devolucaoLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="devolucaoLabel">DEVOLUCAO</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                               </div>
                                 <div class="modal-body">
                                  <form method="post" action="edita_movimentacao.php">   
                                   <div class="mb-3">
                                    <label for="data inicio" class="col-form-label">Data Início:</label>
                                     <input type="date" class="form-control" id="dt_inicio" name="dt_inicio" readonly>
                                      </div>
                                       <div class="mb-3">
                                        <label for="id" class="col-form-label">ID:</label>
                                         <input type="label" class="form-control" id="id" name="id" readonly>
                                          <input type="label" class="form-control" id="id_prod" name="id_prod" hidden>
                                           </div>
                                            <div class="mb-3">
                                             <label for="sigla" class="col-form-label">sigla:</label>
                                              <input type="text" class="form-control" name="sigla" id="sigla" readonly>
                                               <input type="text" class="form-control" name="unidade" id="unidade" hidden>
                                                </div>
                                                 <div class="mb-3">
                                                  <label for="os" class="col-form-label">OS:</label>
                                                   <input type="text" class="form-control" name="os" id="os">
                                                   </div>
                                                    <div class="mb-3">
                                                    <label for="status" class="col-form-label">Status:</label>
                                                    <input type="text" class="form-control" id="status" name="status" readonly></label>
                                                    <input type="text" class="form-control" id="status_id" name="status_id" hidden></label>
                                                    </div>
                                                   <div class="mb-3">
                                                  <label for="historico" class="col-form-label">Histórico:</label>
                                                 <textarea class="form-control" rows="5" id="historico" name="historico"></textarea>
                                                </div><br> 
                                               <div class="container-acess mt-2">                       
                                             <input type="checkbox" id="cabo" name="cabo" value="1" ><label>Cabo C</label>
                                            <input type="checkbox" id="charger" name="charger" value="1"><label for="charger">Charger</label>
                                           <input type="checkbox" id="caixa" name="caixa" value="1"><label for="caixa">Caixa</label>
                                         <input type="checkbox" id="fone" name="fone" value="1"><label for="fone">Fone</label>
                                       <input type="checkbox" id="capa" name="capa" value="1"><label for="capa">Capa</label><br>
                                      <input type="checkbox" id="chip" name="chip" value="1"><label for="chip">Chip</label> 
                                    <input type="checkbox" id="pelicula" name="pelicula" value="1"><label for="pelicula">Pelicula </label>                        
                                  <input type="checkbox" id="veicular" name="veicular" value="1"><label for="veicular">Veicular C</label> 
                                <input type="checkbox" id="suporte" name="suporte" value="1"><label for="suporte">Suporte</label> 
                              </div><br>
                            <div class="mb-3">
                          <label for="data encerramento" class="col-form-label">Data de Encerramento:</label>
                        <input type="date" id="dt_encerramento"></input>
                      </div>                          
                    </div>
                  <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Sair</button>
              <button type="input" class="btn btn-primary">Salvar Informações</button>
            </form>
          </div>
         </div>
       </div>
      </div> 
     <?php
     }         
   ?>  
  </tbody>		
  </table> 
</div>
</div>
<script>
  $(function(){ 
  $('#modalDevolucao').on('show.bs.modal', function (event) {
   var button = $(event.relatedTarget)
    var id = button.data('id');
     var id_prod = button.data('id_prod');
      var sigla = button.data('sigla');
       var unidade = button.data('unidade');
        var os = button.data('os');
         var historico = button.data('historico');
          var status = button.data('status');
           var status_id = button.data('status_id');
            var dt_inicio = button.data('dt_inicio');
             var cabo = button.data('cabo');
              var charger = button.data('charger');
               var caixa = button.data('caixa');
                var fone = button.data('fone');
                 var capa = button.data('capa');
                  var chip = button.data('chip');
                   var pelicula = button.data('pelicula');
                    var veicular = button.data('veicular');
                     var suporte = button.data('suporte');
                      var modal = $(this)
                      modal.find('.modal-title').text('Data da ultima Atualização: ' + dt_inicio)
                     modal.find('#cabo').prop('checked', (cabo=='1'))
                    modal.find('#charger').prop('checked', (charger=='1'))
                   modal.find('#caixa').prop('checked', (caixa=='1'))
                  modal.find('#fone').prop('checked', (fone=='1'))
                 modal.find('#capa').prop('checked', (capa=='1'))
                modal.find('#chip').prop('checked', (chip=='1'))
               modal.find('#pelicula').prop('checked', (pelicula=='1'))
              modal.find('#veicular').prop('checked', (veicular=='1'))
             modal.find('#suporte').prop('checked', (suporte=='1'))      
            modal.find('#id').val(id) 
           modal.find('#id_prod').val(id_prod) 
          modal.find('#sigla').val(sigla)
         modal.find('#unidade').val(unidade)
        modal.find('#dt_inicio').val(dt_inicio)
       modal.find('#os').val(os)
      modal.find('#historico').val(historico)  
     modal.find('#status').val(status) 
    modal.find('#status_id').val(status_id)     
   modal.find('#dt_encerramento').val(dt_encerramento)                      
    });
  });
  </script>
                      
              








                     
               
	



      <div id="garantia" class="tabint">                         
           <table class="table table-hover table-striped" id="garantia_search"> 
              <h3>GARANTIA</h3><br>                     
                <thead>
                   <tr>
                     <th>UNIDADE</th>
                      <th>IMEI</th>   
                       <th>Data de Abertura</th>
                        <th>Ordem de Serviço</th>
                         <th>Problema</th>
                          <th>Histórico</th>  
                          <th>Data de Encerramento</th> 
                          <th>Editar</th>                                           
                          </tr>
                          </thead>
                          <tbody>
                          <?php 
                         while($linha = mysqli_fetch_array($consulta_garantia)){
                        echo '<tr><td>'.$linha['sigla'].'</td>';
                        echo '<td>'.$linha['imei'].'</td>';
                        echo '<td>'.date('d/m/Y',strtotime($linha['dt_inicio'])).'</td>';
                        echo '<td>'.$linha['os'].'</td>';
                        echo '<td>'.$linha['problema'].'</td>';
                        echo '<td>'.$linha['historico'].'</td>';    
                        echo '<td>'.date('d/m/Y',strtotime($linha['dt_encerramento'])).'</td>';                                      
                        ?>
     <td><i class="fas fa-bars" data-bs-toggle="modal" data-bs-target="#modalGarantia"
      data-id="<?php echo $linha['id']; ?>"
        data-id_prod="<?php echo $linha['id_prod']; ?>"
          data-problema_id="<?php echo $linha['problema_id']; ?>"
            data-sigla="<?php echo $linha['sigla']; ?>"
              data-dt_inicio="<?php echo $linha['dt_inicio']; ?>"
                data-os="<?php echo $linha['os']; ?>"
                  data-problema="<?php echo $linha['problema']; ?>"
                    data-historico="<?php echo $linha['historico']; ?>"
                      data-dt_encerramento="<?php echo $linha['dt_encerramento']; ?>">
                          </i></td></tr>
                            <div class="modal fade" id="modalGarantia" tabindex="-1" aria-labelledby="modalManutencaoLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="modalGarantiaLabel">MANUTENÇÃO</h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                       </div>
                                         <div class="modal-body">
                                           <form method="post" action="edita_garantia.php">     
                                            <div class="mb-3">
                                             <label for="data inicio"  class="col-form-label">Data Início:</label>
                                              <input type="date" name="data_inicio" data-id class="form-control" id="dt_inicio" readonly>
                                               </div>
                                               <div class="mb-3">
                                              <label for="id" class="col-form-label">ID:</label>
                                             <input type="label" class="form-control" name="id" id="id" readonly>
                                             <input type="label" class="form-control" name="id_prod" id="id_prod" hidden>
                                            </div>                                                    
                                           <input type="label" class="form-control" name="problema" id="problema" hidden>                                                    
                                          <div class="mb-3">
                                         <label for="sigla" class="col-form-label">sigla:</label>
                                        <input type="text" name="sigla" class="form-control" id="sigla" readonly>
                                       </div>
                                      <div class="mb-3">
                                     <label for="os" class="col-form-label">OS:</label>
                                    <input type="text" name="os" class="form-control" name="os" id="os">
                                   </div>
                                  <div class="mb-3">
                                 <label>Problema:</label><br>
                                <select span class="bedge" name="problema">
                               <option class="bedge" id="problema"></option> 
                              <?php 
                             while($linha_problema = mysqli_fetch_array($consulta_problema3)){
                            echo '<option value="'.$linha_problema['id'].'">'.$linha_problema['descricao'].'</option>';
                            }
                             ?> 
                             </select>   
                              </div>
                               <div class="mb-3">
                                <label for="historico" class="col-form-label">Histórico:</label>
                                 <textarea class="form-control" name="historico" rows="5" id="historico"></textarea>
                                  </div><br>
                                   <div class="mb-3">
                                    <label for="data encerramento" class="col-form-label">Data de Encerramento:</label>
                                     <input type="date" name="dt_encerramento" id="dt_encerramento"></input>
                                     <input type="date" name="dt_inicio" id="dt_inicio" hidden></input>
                                      </div>                          
                                       </div>
                                        <div class="modal-footer">
                                         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Sair</button>
                                        <button type="input" class="btn btn-primary">Salvar Informações</button>
                                       </form>
                                      </div>
                                     </div>
                                   </div>                       
                                 <?php
                                }         
                              ?>  
                            </tbody>		
                          </table> 
                        </div>
                      </div> 

             <script>
               $(function(){ 
                $('#modalGarantia').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget)
                 var id = button.data('id');
                 var id_prod = button.data('id_prod');
                  var problema_id = button.data('problema_id');
                   var sigla = button.data('sigla');
                    var os = button.data('os');
                     var historico = button.data('historico');
                      var problema = button.data('problema');
                       var dt_inicio = button.data('dt_inicio');
                        var dt_encerramento = button.data('dt_encerramento');
                         var modal = $(this)
                         modal.find('.modal-title').text('Data da ultima Atualização: ' + dt_inicio)
                        modal.find('#id').val(id) 
                        modal.find('#id_prod').val(id_prod) 
                       modal.find('#sigla').val(sigla)
                      modal.find('#dt_inicio').val(dt_inicio)
                     modal.find('#os').val(os)
                    modal.find('#historico').val(historico)                                                       
                   modal.find('#problema').val(problema_id).text( '' + problema)  
                   modal.find('#dt_inicio').val(dt_inicio)                 
                  modal.find('#dt_encerramento').val(dt_encerramento)              
                  });
                });
               </script>











              <script>
                  function openStat(evt, statusName) {
                  var i, tabint, tabselect;
                  tabint = document.getElementsByClassName("tabint");
              for (i = 0; i < tabint.length; i++) {
                tabint[i].style.display = "none";
                  }
                  tabselect = document.getElementsByClassName("tabselect");
              for (i = 0; i < tabselect.length; i++) {
                tabselect[i].className = tabselect[i].className.replace(" active", "");
                  }
                  document.getElementById(statusName).style.display = "block";
                  evt.currentTarget.className += " active";
                  }                
                  document.getElementById("defaultStat").click();
              </script>
 

      



             
    <div id="abertos" class="tabcontent">
      <div class="container">              
         <table class="table table-hover table-striped" id="tabcontent">             
            <h3 class="primary-color">MANUTENÇÕES PENDENTES</h3><br><br>                 
              <thead>
                <tr>                  
                  <th>UNIDADE</th>
                  <th>ABERTURA</th>
                  <th>OSI</th>
                  <th>PROBLEMA</th>
                  <th>HISTÓRICO</th> 
                  <th>EDITAR</th>                                         
                </tr>
              </thead>	
            <tbody>
          <?php 
            while($linha = mysqli_fetch_array($consulta_manutencao_abertos)){                      
             echo '<tr><td>'.$linha['sigla'].'</td>';
               echo '<td>'.$linha['imei'].'</td>';
                 echo '<td>'.$linha['dt_inicio'].'</td>';
                   echo '<td>'.$linha['os'].'</td>';
                     echo '<td>'.$linha['problema'].'</td>';                    
                       echo '<td>'.$linha['historico'].'</td>';	                      
                        ?>
                         <td>               

         <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#manutencaoModal" 
          data-id="<?php echo $linha['id']; ?>"
          data-imei="<?php echo $linha['imei']; ?>"   
           data-status="<?php echo $linha['status']; ?>"
            data-status_id="<?php echo $linha['status_id']; ?>"
             data-id_prod="<?php echo $linha['id_prod']; ?>"
              data-sigla="<?php echo $linha['sigla']; ?>"
               data-ender_unidade="<?php echo $linha['ender_unidade']; ?>"
                data-dt_inicio="<?php echo $linha['dt_inicio']; ?>"
                 data-os="<?php echo $linha['os']; ?>"                   
                  data-problema="<?php echo $linha['problema']; ?>"
                   data-problema_id="<?php echo $linha['problema_id']; ?>"
                    data-historico="<?php echo $linha['historico']; ?>"                
                     >manutenção</button>
                      </td></tr> 
                            
           <div class="modal fade" id="manutencaoModal" tabindex="-1" aria-labelledby="manutencaoModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="manutencaoModalLabel">MANUTENÇÃO</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                       </div>
                         <div class="modal-body">
                           <form method="post" action="processa_eventos.php">  
                            <input type="text" class="form-control" name="problema_id" id="problema_id" hidden>   
                            <input type="text" class="form-control" name="id_prod" id="id_prod" hidden> 
                            <input type="text" class="form-control" name="status_id" id="status_id" hidden>   
                            <input type="text" class="form-control" name="ender_unidade" id="ender_unidade" hidden>
                            <input type="text" class="form-control" name="status" id="status" hidden>  
                            <input type="text" class="form-control" name="imei" id="imei" hidden>  
                            <input type="text" class="form-control" name="problema_id" id="problema_id" hidden>  
                  
                          <div class="mb-3">
                            <label for="data inicio" class="col-form-label">Data Início:</label>
                            <input type="date" class="form-control" name="dt_inicio" id="dt_inicio">
                          </div>

                                <div class="mb-3">
                                  <label for="id" class="col-form-label">ID:</label>
                                  <input type="label" class="form-control" name="id" id="id" readonly>
                                </div>

                                    <div class="mb-3">
                                      <label for="sigla" class="col-form-label">sigla:</label>
                                      <input type="text" class="form-control" name="sigla" id="sigla" readonly>
                                      <input type="text" class="form-control" name="ender_unidade" id="ender_unidade" hidden>
                                    </div>


                                      <div class="mb-3">
                                        <label for="os" class="col-form-label">OS:</label>
                                        <input type="text" class="form-control" name="os" id="os" readonly>
                                      </div>
                                      

                                     <div class="mb-3">
                                 <label>Problema:</label><br>
                                <select span class="bedge" name="problema">
                               <option class="bedge" id="problema"></option> 
                              <?php 
                             while($linha_problema = mysqli_fetch_array($consulta_problema4)){
                            echo '<option value="'.$linha_problema['id'].'">'.$linha_problema['descricao'].'</option>';
                            }
                             ?> 
                             </select>   
                              </div>

                                <div class="mb-3">
                                  <label for="historico" class="col-form-label">Histórico:</label>
                                  <textarea class="form-control" rows="5" name="historico" id="historico"></textarea>
                                </div>
                          <div class="mb-3">
                            <label for="data encerramento" class="col-form-label">Data de Encerramento:</label>
                            <input type="date" name="dt_encerramento" id="dt_encerramento"></input>
                          </div>                          
                         </div>
                        <div class="modal-footer">
                       <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Sair</button>
                      <button type="input" class="btn btn-primary" >Salvar Informações</button>
                     </div>
                    </form> 
                   </div>
                 </div>
                </div> 
              <?php
              }         
            ?>  
         </tbody>		
       </table> 
    </div>    
      <script>
        $(function(){ 
          $('#manutencaoModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
             var imei = button.data('imei');
              var id = button.data('id');
               var id_prod = button.data('id_prod'); 
                var status_id = button.data('status_id');
                 var status = button.data('status');                 
                  var sigla = button.data('sigla');
                   var ender_unidade = button.data('ender_unidade');
                    var historico = button.data('historico');
                     var problema = button.data('problema');
                      var problema_id = button.data('problema_id');
                      var dt_inicio = button.data('dt_inicio');
                       var os = button.data('os');
                       var modal = $(this)
                       modal.find('.modal-title').text('Data da ultima Atualização: ' + dt_inicio)
                       modal.find('#id').val(id) 
                      modal.find('#id_prod').val(id_prod) 
                     modal.find('#status_id').val(status_id) 
                    modal.find('#status').val(status) 
                   modal.find('#sigla').val(sigla)
                  modal.find('#ender_unidade').val(ender_unidade)
                 modal.find('#dt_inicio').val(dt_inicio)
                modal.find('#os').val(os)
               modal.find('#imei').val(imei)
              modal.find('#historico').val(historico) 
             modal.find('#problema_id').val(problema_id)   
            modal.find('#problema').val(problema_id).text(problema)                     
          });
        });
      </script>            
       





       <div class="container">              
         <table class="table table-hover table-striped" id="tabcontent"><br><br>             
            <h3 class="primary-color">RETIRADAS PENDENTES</h3><br><br>                 
              <thead>
                <tr>                  
                  <th>UNIDADE</th>
                  <th>ABERTURA</th>
                  <th>OSI</th>
                  <th>PROBLEMA</th>
                  <th>HISTÓRICO</th> 
                  <th>EDITAR</th>                                         
                </tr>
              </thead>	
            <tbody>
          <?php 
            while($linha = mysqli_fetch_array($consulta_retirada_abertos)){                      
              echo '<tr><td>'.$linha['sigla'].'</td>';
                echo '<td>'.$linha['dt_inicio'].'</td>';
                  echo '<td>'.$linha['os'].'</td>';
                    echo '<td>'.$linha['problema'].'</td>';
                      echo '<td>'.$linha['historico'].'</td>';	                      
                        ?>
                         <td>               

          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#retiradaModal" 
            data-id="<?php echo $linha['id']; ?>"
              data-sigla="<?php echo $linha['sigla']; ?>"
               data-ender_unidade="<?php echo $linha['ender_unidade']; ?>"
                data-dt_inicio="<?php echo $linha['dt_inicio']; ?>"
                  data-os="<?php echo $linha['os']; ?>"
                    data-problema="<?php echo $linha['problema']; ?>"
                      data-historico="<?php echo $linha['historico']; ?>"                
                        >modificar</button>
                          </td></tr> 
                            
           <div class="modal fade" id="retiradaModal" tabindex="-1" aria-labelledby="retiradaModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="retiradaModalLabel">MANUTENÇÃO</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                       </div>
                         <div class="modal-body">
                           <form action="processa_eventos">     
                  
                          <div class="mb-3">
                            <label for="data inicio" class="col-form-label">Data Início:</label>
                            <input type="date" class="form-control" id="dt_inicio" readonly>
                          </div>

                                <div class="mb-3">
                                  <label for="id" class="col-form-label">ID:</label>
                                  <input type="label" class="form-control" id="id_man-name" readonly>
                                </div>

                                    <div class="mb-3">
                                      <label for="sigla" class="col-form-label">sigla:</label>
                                      <input type="text" class="form-control" id="sigla" readonly>
                                    </div>


                                      <div class="mb-3">
                                        <label for="os" class="col-form-label">OS:</label>
                                        <input type="text" class="form-control" id="os" readonly>
                                      </div>
                                      

                                    <div class="mb-3">
                                      <label for="problema" class="col-form-label">Problema:</label>
                                      <input type="text" class="form-control" id="problema" readonly></label>
                                    </div>

                                <div class="mb-3">
                                  <label for="historico" class="col-form-label">Histórico:</label>
                                  <textarea class="form-control" rows="5" id="historico"></textarea>
                                </div>

                          <div class="mb-3">
                            <label for="data encerramento" class="col-form-label">Data de Encerramento:</label>
                            <input type="date" id="dt_encerramento"></input>
                          </div>

                          </form>
                         </div>
                        <div class="modal-footer">
                       <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Sair</button>
                      <button type="button" class="btn btn-primary">Salvar Informações</button>
                     </div>
                   </div>
                 </div>
                </div> 
              <?php
              }         
            ?>  
         </tbody>		
       </table> 
    </div>    
      <script>
        $(function(){ 
          $('#retiradaModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
              var id_man = button.data('id');
                var sigla = button.data('sigla');
                 var ender_unidade = button.data('ender_unidade');
                 var historico = button.data('historico');
                  var problema = button.data('problema');
                   var dt_inicio = button.data('dt_inicio');
                    var os = button.data('os');
                    var modal = $(this)
                    modal.find('.modal-title').text('Data da ultima Atualização: ' + dt_inicio)
                   modal.find('#id_man-name').val(id_man) 
                  modal.find('#sigla').val(sigla)
                 modal.find('#dt_inicio').val(dt_inicio)
                modal.find('#os').val(os)
               modal.find('#ender_unidade').val(ender_unidade)
              modal.find('#historico').val(historico)  
            modal.find('#problema').val(problema)                     
          });
        });
      </script>     












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
        </body>
    </html> 


