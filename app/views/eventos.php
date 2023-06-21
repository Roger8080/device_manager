
<?php

include 'funcoes.inc'; //Chama o arquivo de funções incluindo (icones,...)

?>

<style>

<?php include '../css/style.css' ?>

</style>







<div class="main">
  <div id="eventos" style="min-height: 55em; ">                   
   <div class="tab">
     <div class="container">   
      <button class="tabselect" onclick="openStat(event, 'manutencao')" id="defaultStat"><i class="bi bi-telephone"></i> Manutenção</button>
        <button class="tabselect" onclick="openStat(event, 'retirada')" ><i class="bi bi-telephone"></i> Retirada </button>
          <button class="tabselect" onclick="openStat(event, 'devolucao')"><i class="bi bi-telephone"></i> Devolução </button>
            <button class="tabselect" onclick="openStat(event, 'garantia')"><i class="bi bi-telephone"></i> Garantia</button>
              <a href="?#chamados"><button class="tabselect">Voltar</button></a>
                </div>
                  </div> 
                  




<!-- TBMOBILE_MANUTENCAO <<< 2 >>> -->
<div id="manutencao" class="tabint">        
 <div class="container lista-geral"> 
   <div class="container">                 
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
          echo '<td>'.date('d/m/Y',strtotime($linha['dt_inicio'])).'</td>';  // MODIFICA A ORDEM DA DATA d/m/Y
          echo '<td>'.$linha['os'].'</td>';
          echo '<td>'.$linha['problema'].'</td>';
          echo '<td>'.$linha['historico'].'</td>';    
          echo '<td>'.date('d/m/Y',strtotime($linha['dt_encerramento'])).'</td>'; // MODIFICA A ORDEM DA DATA d/m/Y                                      
        ?>

      <td><i class="fas fa-bars" data-bs-toggle="modal" data-bs-target="#modalManutencao"
       data-id="<?php echo $linha['id']; ?>"
        data-problema_id="<?php echo $linha['problema_id']; ?>"
          data-sigla="<?php echo $linha['sigla']; ?>"
            data-dt_inicio="<?php echo $linha['dt_inicio']; ?>"
              data-os="<?php echo $linha['os']; ?>"                  
                data-historico="<?php echo $linha['historico']; ?>"
                  data-numero="<?php echo $linha['numero']; ?>"
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
                                 <FORM method="post" action="edita_manutencao.php">     
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
                                      <label for="numero" class="col-form-label">Numero:</label>
                                     <input type="text" name="numero" class="form-control" id="numero" readonly>
                                    </div>                                                  
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
                        <select span class="bedge" id="problema_id" name="problema_id">                               
                      <?php 
                     while($linha_problema = mysqli_fetch_array($consulta_problema1)){
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
                      </div>                          
                       </div>
                        <div class="modal-footer">
                         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Sair</button>
                         <button type="input" class="btn btn-primary" >Salvar Informações</button>
                        </FORM>
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
  //            var problema_id = button.data('problema_id');
                 var sigla = button.data('sigla');
                  var numero = button.data('numero');
                   var os = button.data('os');
                    var historico = button.data('historico');                          
                    var dt_inicio = button.data('dt_inicio');
                     var dt_encerramento = button.data('dt_encerramento');
                      var modal = $(this)
                      modal.find('.modal-title').text('Data da ultima Atualização: ' + dt_inicio)
                     modal.find('#id').val(id) 
                    modal.find('#sigla').val(sigla)
                   modal.find('#dt_inicio').val(dt_inicio)
                  modal.find('#os').val(os)
                 modal.find('#historico').val(historico)
                modal.find('#numero').val(numero)                                                     
               modal.find('#problema_id').val(problema_id)    
              modal.find('#dt_encerramento').val(dt_encerramento)              
              });
            });
          </script>
          
 
			 














      <!-- TBMOBILE_MOVIMENTACAO <<<RETIRDA  4 >>>   -->
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
    data-sigla_destino="<?php echo $linha['sigla_destino']; ?>"
    data-unidade="<?php echo $linha['unidade']; ?>"
     data-ender_destino="<?php echo $linha['ender_destino']; ?>"
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
                           <label for="data inicio"  class="col-form-label">Data da Abertura do Chamado::</label>
                         <input type="date" name="data_inicio" data-id class="form-control" id="dt_inicio" readonly>
                       </div>
                     <div class="mb-3">
                   <label for="id" class="col-form-label">ID:</label>
                  <input type="label" class="form-control" name="id" id="id" readonly>
                 <input type="label" class="form-control" id="id_prod" name="id_prod" hidden>
                </div>
               <div class="mb-3">
               <label for="sigla" class="col-form-label">Unidade Anterior:</label>
               <input type="text" name="sigla" class="form-control" id="sigla" readonly>
               <input type="text" class="form-control" name="unidade" id="unidade" readonly>
               </div>
               <div class="mb-3">
               <label for="sigla_destino" class="col-form-label">Unidade Destino:</label>
               <input type="text" name="sigla_destino" class="form-control" id="sigla_destino" readonly>
               <input type="text" class="form-control" name="ender_destino" id="ender_destino" readonly>
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
                    var sigla_destino = button.data('sigla_destino');
                     var unidade = button.data('unidade');
                      var ender_destino = button.data('ender_destino');
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
                        modal.find('#sigla_destino').val(sigla_destino)
                       modal.find('#unidade').val(unidade)
                       modal.find('#ender_destino').val(ender_destino)
                      modal.find('#dt_inicio').val(dt_inicio)
                     modal.find('#os').val(os)
                    modal.find('#historico').val(historico)  
                   modal.find('#status').val(status) 
                  modal.find('#status_id').val(status_id)      
                 modal.find('#dt_encerramento').val(dt_encerramento)              
                 });
                });
               </script>













        <!-- TBMOBILE_MOVIMENTACAO <<<DEVOLUACAO  5  >>> -->
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
             data-problema="<?php echo $linha['problema']; ?>"
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
                                                     <label for="problema" class="col-form-label">Problema:</label>
                                                     <input type="text" class="form-control" name="problema" id="problema" readonly>                                                    
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
      var status_id = button.data('status_id');
       var unidade = button.data('unidade');
        var os = button.data('os');
         var historico = button.data('historico');
          var status = button.data('status');
           var problema = button.data('problema');
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
         modal.find('#problema').val(problema)
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
                      
              








                     
               
	
<!-- TBMOBILE_GARANTIA  <<< 3 >>>-->
<div id="garantia" class="tabint"> 
<div class="container lista-geral">               
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
        <td><i class="fas fa-bars" data-bs-toggle="modal" data-bs-target="#modalgarantia"
       data-id="<?php echo $linha['id']; ?>"
         data-problema_id="<?php echo $linha['problema_id']; ?>"
           data-sigla="<?php echo $linha['sigla']; ?>"
             data-dt_inicio="<?php echo $linha['dt_inicio']; ?>"
               data-os="<?php echo $linha['os']; ?>"                  
                 data-historico="<?php echo $linha['historico']; ?>"
                   data-dt_encerramento="<?php echo $linha['dt_encerramento']; ?>">
                     </i></td></tr>
                       <div class="modal fade" id="modalgarantia" tabindex="-1" aria-labelledby="modalgarantiaLabel" aria-hidden="true">
                         <div class="modal-dialog">
                           <div class="modal-content">
                            <div class="modal-header">
                             <h5 class="modal-title" id="modalgarantiaLabel">MANUTENÇÃO</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                               </div>
                                <div class="modal-body">
                                 <FORM method="post" action="edita_garantia.php">     
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
                        <select span class="bedge" id="problema_id" name="problema_id">                               
                      <?php 
                     while($linha_problema = mysqli_fetch_array($consulta_problema3)){
                   echo '<option value="'.$linha_problema['id'].'">'.$linha_problema['descricao'].'</option>';
                  }
                 ?> 
               </select>                             
              </div>
               <div class="mb-3">
                <label for="historico" class="col-form-label">Histórico:</label>
                 <textarea class="form-control" name="historico" rows="1" id="historico"></textarea>
                  </div><br>
                   <div class="mb-3">
                    <label for="data encerramento" class="col-form-label">Data de Encerramento:</label>
                     <input type="date" name="dt_encerramento" id="dt_encerramento"></input>
                      </div>                          
                       </div>
                        <div class="modal-footer">
                         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Sair</button>
                         <button type="input" class="btn btn-primary" >Salvar Informações</button>
                        </FORM>
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
        $('#modalgarantia').on('show.bs.modal', function (event) {
         var button = $(event.relatedTarget)
          if (button.data('problema_id')=='') {
           var problema_id = '9';
            }else {
             var problema_id = button.data('problema_id');
              }
               var id = button.data('id');
  //            var problema_id = button.data('problema_id');
                 var sigla = button.data('sigla');
                  var os = button.data('os');
                   var historico = button.data('historico');                          
                    var dt_inicio = button.data('dt_inicio');
                     var dt_encerramento = button.data('dt_encerramento');
                      var modal = $(this)
                      modal.find('.modal-title').text('Data da ultima Atualização: ' + dt_inicio)
                     modal.find('#id').val(id) 
                    modal.find('#sigla').val(sigla)
                   modal.find('#dt_inicio').val(dt_inicio)
                  modal.find('#os').val(os)
                 modal.find('#historico').val(historico)                                                  
               modal.find('#problema_id').val(problema_id)    
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

