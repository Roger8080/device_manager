       
<div id="manutencao" class="tabcontent">
 <div class="container">  
  <h3 class="primary-color" id="titleInfo">MANUTENÇÕES PENDENTES</h3>  
   <form action="?pagina=encerramento_varios" method="post">
    <button type="submit" class="btn btn-info" style="color: white;" id="btnEnc" value="Submit"> ENCERRAR VÁRIOS </button> 
     <table class="table table-hover table-striped" id="tabcontent">             
       <br><br>                 
        <thead>
          <tr>            
            <th scope="col" class="col-1"></th>      
            <th scope="col" class="col-2">UNIDADE</th>
            <th scope="col" class="col-2">IMEI</th>
            <th scope="col" class="col-2">ABERTURA</th>
            <th scope="col" class="col-2">OSI</th>
            <th scope="col" class="col-2">PROBLEMA</th>
            <th scope="col" class="col-3">HISTÓRICO</th> 
            <th scope="col" class="col-2">EDITAR</th>       
          </tr>
         </thead>	
        <tbody>
        <?php             
        if ($consulta_manutencao_abertos->num_rows > 0) { 
         while($linha = mysqli_fetch_array($consulta_manutencao_abertos)){           
           echo '<tr><td>          
             <input type="checkbox" id='.$linha['id'].' name="pendentes[]" value='.$linha['id'].'>
              <input type="hidden" name="status_ids[]" value="' . $linha['status_id'] . '">
              <input type="hidden" name="id_prods[]" value="' . $linha['id_prod'] . '"></td>';  
                echo '<td>'.$linha['sigla'].'</td>';   
                  echo '<td>'.$linha['imei'].'</td>';           
                    echo '<td>'.$linha['dt_inicio'].'</td>';
                      echo '<td>'.$linha['os'].'</td>';
                        echo '<td>'.$linha['problema'].'</td>';                    
                          echo '<td>'.$linha['historico'].'</td>';	    
                           //echo '<td>' .$linha['status_id'].'</td>';   
                            //echo '<input type="hidden" name="status_ids[]" value="' . $linha['status_id'] . '">';                                                            
                           ?>                                                
                             <td>
                               <button type="button" class="btn btn-primary" data-bs-toggle="modal" id="btnEncerrar" data-bs-target="#manutencaoModal" 
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
                                           >Manutenção</button></td>  
                                        <td><button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#manutencaoModalvarios" 
                                      data-id="<?php  echo  $linha['id'];//aqui deverá conter o array de ids do checkbox ?>"
                                     data-status_id="<?php echo $linha['status_id']; ?>"
                                   >ENCERRAR</button>
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
             <input type="text" class="form-control" name="id_prod" id="id_prod" hidden> 
             <input type="text" class="form-control" name="status_id" id="status_id" hidden>          
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
          } 
          else { 
                 include 'app/pendente//mensagem/pendente.php';          
               }               
          ?>
           </tbody>	
        </table>
      </form> 	
   </div> 
      <script>
        $(function(){ 
          $('#manutencaoModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
             var imei = button.data('imei');
              var id = button.data('id');
              // var id = button.data('ids'); // aqui devera receber o array de ids
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
                      // modal.find('#ids').val(ids) //aqui deverá apresentar o array de ids 
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













<div class="modal fade" id="manutencaoModalvarios" tabindex="-1" aria-labelledby="manutencaoModalLabel" aria-hidden="true">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <h5 class="modal-title" id="manutencaoModalLabel">Varios</h5>
     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <div class="modal-body">
          <form method="post" action="processa_encerramento.php">  
           <div class="mb-3">
                     <label for="id" class="col-form-label">ID:</label>
                      <input type="label" class="form-control" name="id" id="id" readonly>
                       </div>                              
            <input type="text" class="form-control" name="status_id" id="status_id" readonly > 
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
      </div> </div>
      <script>
        $(function(){ 
          $('#manutencaoModalvarios').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)           
              var id = button.data('id');             
               var id_prod = button.data('id_prod'); 
                var status_id = button.data('status_id');                
                  var modal = $(this)
                  modal.find('.modal-title').text('Deseja encerrar este chamado?' )
                modal.find('#id').val(id) 
              modal.find('#id_prod').val(id_prod) 
            modal.find('#status_id').val(status_id)                                 
           });
        });
      </script>   