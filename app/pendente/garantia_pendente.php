
 

<!-- TBMOBILE_GARANTIA <<< 3 >>> -->
<div id="garantia" class="tabcontent">
  <div class="container">              
    <table class="table table-hover table-striped" id="tabcontent">             
      <h3 class="primary-color">GARANTIA PENDENTES</h3><br><br>                 
        <thead>
          <tr>                  
            <th>UNIDADE</th>
            <th>IMEI</th>
            <th>ABERTURA</th>
            <th>OSI</th>
            <th>PROBLEMA</th>
            <th>HISTÓRICO</th> 
            <th>EDITAR</th>                                         
          </tr>
         </thead>	
        <tbody>
          <?php 
          if ($consulta_garantia_abertos->num_rows > 0) { 
            while($linha = mysqli_fetch_array($consulta_garantia_abertos)){                      
             echo '<tr><td>'.$linha['sigla'].'</td>';   
               echo '<td>'.$linha['imei'].'</td>';           
                 echo '<td>'.$linha['dt_inicio'].'</td>';
                   echo '<td>'.$linha['os'].'</td>';
                     echo '<td>'.$linha['problema'].'</td>';                    
                       echo '<td>'.$linha['historico'].'</td>';	                      
                        ?>
                         <td>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#garantiaModal" 
 data-id="<?php echo $linha['id']; ?>"
  data-imei="<?php echo $linha['imei']; ?>"   
   data-status="<?php echo $linha['status']; ?>"
    data-status_id="<?php echo $linha['status_id']; ?>"
     data-id_prod="<?php echo $linha['id_prod']; ?>"
      data-sigla="<?php echo $linha['sigla']; ?>"
       data-ender_unidade="<?php echo $linha['ender_unidade']; ?>"
        data-dt_inicio="<?php echo $linha['dt_inicio']; ?>"
         data-os="<?php echo $linha['os']; ?>"                   
          data-problema_id="<?php echo $linha['problema_id']; ?>"
           data-historico="<?php echo $linha['historico']; ?>"                
           >    
</button>
</td></tr>                             
<div class="modal fade" id="garantiaModal" tabindex="-1" aria-labelledby="garantiaModalLabel" aria-hidden="true">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <h5 class="modal-title" id="garantiaModalLabel">GARANTIA</h5>
     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
       <div class="modal-body">
         <form method="post" action="processa_eventos.php">                                 
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
                          <select span class="bedge" id="problema_id" name="problema_id">                             
                         <?php 
                        while($linha_problema = mysqli_fetch_array($consulta_problema2)){
                      echo '<option value="'.$linha_problema['id'].'">'.$linha_problema['descricao'].'</option>';
                      }
                      ?> 
                      </select>   
                       </div>
                        <div class="mb-3">
                         <label>Status:</label><br>
                        <select span class="bedge" id="alert" name="alert">                             
                       <?php 
                      while($linha_problema = mysqli_fetch_array($consulta_alert2)){
                     echo '<option value="'.$linha_problema['id'].'">'.$linha_problema['garantia'].'</option>';
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
            } }         
            else { 
                   include 'app/pendente/mensagem_pendente.php';          
                 }                          
          ?>   
      </tbody>		
    </table> 
  </div>  
    <script>
        $(function(){ 
          $('#garantiaModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
             var imei = button.data('imei');
              var id = button.data('id');
               var id_prod = button.data('id_prod'); 
                var status_id = button.data('status_id');
                 var status = button.data('status');                 
                  var sigla = button.data('sigla');
                   var ender_unidade = button.data('ender_unidade');
                    var historico = button.data('historico');                    
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
          });
        });
      </script>  