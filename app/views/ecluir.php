<style>
/* ANIMAÇÃO DO MODAL */
.modal-content {
  position: fixed;
  bottom: 0;
  background-color: #fefefe;
  width: 100%;
  -webkit-animation-name: slideIn;
  -webkit-animation-duration: 0.4s;
  animation-name: slideIn;
  animation-duration: 0.4s
}

/* BOTÃO FECHAR  */
.close {
  color: white;
  float: right;
  font-size: 28px;
  font-weight: bold;
}
.close:hover,
.close:focus {
  color: red;
  text-decoration: none;
  cursor: pointer;
}

/* TÍTULO DO MODAL*/
.modal-header { 
  padding: 10px 16px;
  background-color: #5cb85c;
  color: white;
}

/* CORPO DO MODAL */
.modal-body {padding: 200px 16px;} 


/* Add Animation */
@-webkit-keyframes slideIn {
  from {bottom: -300px; opacity: 0} 
  to {bottom: 0; opacity: 1}
}

@keyframes slideIn {
  from {bottom: -300px; opacity: 0}
  to {bottom: 0; opacity: 1}
}

@-webkit-keyframes fadeIn {
  from {opacity: 0} 
  to {opacity: 1}
}

@keyframes fadeIn {
  from {opacity: 0} 
  to {opacity: 1}
}
</style>




<body>
<h2>Bottom Modal</h2>

<!-- Trigger/Open The Modal -->
<button id="myBtn">Open Modal</button>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h2>MANUTENÇÃO</h2>
    </div>
    <div class="modal-body">
      <p>Some text in the Modal Body</p>
      <p>Some other text...</p>
    </div>
  </div>

</div>

<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

</body>
</html>
























































<a >
                    <i class="fas fa-bars" id="<?php echo $linha['id']; ?>" type="button" data-bs-toggle="modal" data-bs-target="#myManutencao"></i></a>











 <!-- The Modal -->
 <div class="modal" id="myManutencao">
           <div class="modal-dialog modal-sm">
              <div class="modal-content">
                <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title">Manutencao</h4>
                      <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        

                    <!-- Modal body -->
                    <div class="modal-body">   
                  <thead>
                <tr>                  
              <th>UNIDADE</th>                                        
            </tr>
          </thead>	
        <tbody>         
           <?php 
              while($linha5 = mysqli_fetch_array($consulta_manutencao_edition)){ 
                ?>
                  <?php if($linha5['id'] == $_GET['']){ ?>	
                    <h2>Informações sobre o Mobile</h2>
                      <form method="post" action="home.php">
                         <input type="hidden" name="id" value="<?php echo $linha5['id']; ?>">  
                          <label class="badge">UNIDADE:</label>
                            <input type="text" name="unidade" value="<?php echo $linha5['unidade']; ?>">                                    
                       <?php } ?>    
                    <?php } ?> 
                 </tbody>                                             
               <br>
           </div>
                    <!-- Botão fechar -->
                    <br><br>
                  <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
                </div>
              </div>
            </div> 
          </div>







          <?php 
                            while($linha = mysqli_fetch_array($consulta_tbmobile0)){ 
                              ?>
                               <?php if($linha['id'] == $_GET['manutencao']){ ?>	
                                 <h2>Informações sobre o Mobile</h2>
                                <form method="post" action="manutencao_mobile.php">
                              <input type="hidden" name="id" value="<?php
                            echo $linha['id']; ?>">  
                          <label class="badge">UNIDADE:</label>
                            <div class="col-12 col-md-3">
                              <div class="card text-center">                       
                                <input type="text" name="unidade" 
                              value="<?php
                            echo $linha['sigla']; ?>">                  
                           <label class="badge">IMEI:                        
                             </label>
                               <input type="text" name="imei" 
                              value="<?php 
                            echo $linha['IMEI'];?>"> 
                          <label class="badge">HISTORICO:
                            </label>
                              <textarea class="form-control" rows="2" id="comment" name="text">                            
                                </textarea><br>                      
                              <?php 
                            while($linha_osi = mysqli_fetch_array($consulta_osi0)){ ?>                                       
                          <label class="badge">ORDEM DE SERVIÇO
                            </label>
                              <input type="number" name="osi" id="placeholder"
                              value="<?php 
                            echo $linha_osi['ordem_servico'];?>">
                           <?php 
                          }?>                            
                          <label class="badge">PROBLEMA
                            </label>
                              <select span class="badge" name="selecao_problema">
                                  <option>Selecione o diagnostico do equipamento</option>
                                <?php 
                              while($linha_problema = mysqli_fetch_array($consulta_problema0)){
                            echo '<option value="'.$linha_problema['id'].'">'.$linha_problema['descricao'].'</option>';
                                  }
                                ?>
                              <?php } ?>
                            <?php } ?>
                          </select>	            
                        <div class="card-body"><br>
                      <input class="btn btn-info" type="submit" value="Encaminhar para Manutenção">
                       </form>	             
                        </div>
                         </div>
                          </div>












                          
<div id="chamados" class="tabcontent">
 
 <!-- Fixed header table-->

<table class="table table-fixed" id="tabcontent">              
<h3 class="primary-color">LISTA GERAL</h3><br><br>    
  <a button type="button" class="btn btn-info" href="?pagina=inserir_mobile">Inserir novo Mobile</a>             
   <thead>
         <tr>                  
           <th scope="col" class="col-2">UNIDADE</th>
           <th scope="col" class="col-2">IMEI</th>
           <th scope="col" class="col-2">SERIE</th>
           <th scope="col" class="col-2">NUMERO</th>
           <th scope="col" class="col-2">STATUS</th>     
           <th scope="col" class="col-1">DATA</th>                            
           <th scope="col" class="col-1">Encaminhar</th>                                     
         </tr>
   </thead>	
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