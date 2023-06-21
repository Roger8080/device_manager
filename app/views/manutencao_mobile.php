	
<style> 
#mySidenav a {
  position: absolute;
  left: -80px;
  transition: 0.3s;
  padding: 15px;
  width: 150px;
  text-decoration: none;
  font-size: 20px;
  color: white;
  border-radius: 0 5px 5px 0;
}

#mySidenav button{
  position: absolute;
  left: -80px;
  transition: 0.3s;
  padding: 15px;
  width: 150px;
  text-decoration: none;
  font-size: 17px;
  color: white;
  border-radius: 0 5px 5px 0;
  border: 0px;
}

#mySidenav a:hover {
  left: 0;
}

#mySidenav button:hover {
  left: 0;
}

#manutencao {
  top: 30px;
  background-color: #04AA6D;
  text-align: right;
}

#retirada {
  top: 90px;
  background-color: #2196F3;
  text-align: right;
}

#devolucao {
  top: 150px;
  background-color: #f44336;
  text-align: right;
}

#garantia {
  top: 210px;
  background-color: #555;
  text-align: right;
}

#sair {
  top: 270px;
  background-color: #71258d;
  text-align: right;
}

body {
  font-family: Arial;
  font-size: 16px;
  padding: 9px;
}

.container {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

.container-acess {
 padding: 1em;
}

/*CARACTERISTICAS TEXTUAIS*/
input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 1px;
}

input[type=number] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 1px;
  color: #C0C0C0;
}

label[class=badge] { /*LABEL*/ 
 
  padding: 12px;
  text-align: left;
  color: black;
 
}

select[class=badge] {  /*CAMPOS DO TIPO SELECT*/ 
width: 100%;
 padding: 12px;
 text-align: left;
 color: black;
}

input[type=checkbox] {
 padding: 0em;
 text-align: center;
 color: black;
}


.btn {
  background-color: black;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}


/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}


/* MODAL MANUTENÇÃO */
/* ANIMAÇÃO DO MODAL */
.modal-content {
  position: center;
  display: center;
  bottom: 0;
  background-color: #fefefe;
  width: 25em;
  height: -10%;

 





 /* 
  -webkit-animation-name: slideIn;
  -webkit-animation-duration: 0.4s;
  animation-name: slideIn;
  animation-duration: 0.4s*/
}

/* BOTÃO FECHAR  */
.close {
  color: white;
  float: left;
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
.modal-header0{ 
  padding: 10px 30px;
  background-color: #5cb85c;
  color: white;
  text-align: right; 
}

.modal-header1 { 
  padding: 10px 30px;
  background-color: #2196F3;
  color: white;
  text-align: right;
}

.modal-header2 { 
  padding: 10px 30px;
  background-color: #f44336;
  color: white;
  text-align: right;
}

.modal-header3 { 
  padding: 10px 30px;
  background-color: #555;
  color: white;
  text-align: right;
}


/* CORPO DO MODAL */
.modal-body {padding: 20px 16px;} 


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




<div style="margin-left:400px;"><br><br>
  <h2>Informações sobre o Equipamento</h2>
    <p>Editar informações sobre o Equipamento.</p></div><br>

        <div class="container" style="margin-bottom: 10em">	  
          <h2>Mobile</h2>   

              <?php while($linha = mysqli_fetch_array($consulta_tbmobile)){ ?>
                <?php if($linha['id'] == $_GET['manutencao']){ ?><!-- consulta_tbmobile Where id = <&manutenção=id >-->		
                 
                 
                 
<script>
  function popup(){
    alert('Confirmar Edição');
      return true;
        }
        </script>
        <form method="post" action="edita_mobile.php" onsubmit="return popup()">
          <input type="hidden" name="id" value="<?php echo $linha['id']; ?>"><br><br>
            <label class="titulo">UNIDADE:</label><br>
              <select span class="badge" name="selecao_unidade">
                <option value="<?php echo $linha['ender'] ?>"><?php echo $linha['sigla']; ?></option>;                                                         
                  <?php         
                    while($linha2 = mysqli_fetch_array($consulta_sigla)){
                      echo '<option value="'.$linha2['ender'].'">'.$linha2['sigla'].'</option>';
                      }                              
                    ?>                                  
              </select>
                <br>
                <br>       
            <input type="hidden" name="ender" value="<?php echo $linha['ender'];?>">                                                                                
            <label class="badge">IMEI:</label><br>
              <input type="text" readonly name="imei" placeholder="Insira o IMEI do mobile"
                value="<?php echo $linha['IMEI'];?>">
                  <br>
                    <br>
          <label class="badge">SERIE:</label><br>
              <input type="text" readonly name="serie" placeholder="Insira o n° de serie do mobile"
                value="<?php echo $linha['SERIE'];?>">
                  <br>
                    <br>  
          <label class="badge">NUMERO:</label><br>
              <input type="text" name="numero" placeholder="Insira a numero do mobile"
                value="<?php echo $linha['NUMERO'];?>">
                  <br>
                 <br>    
                 <input type="hidden" name="dt_inicio" value="<?php echo date("Y/m/d"); ?>">    
                  <div class="container-acess mt-1" style="text-align: center; font-size: 22px;">         

                  <input type="checkbox" id="acessorio1" name="cabo" value="1" <?php if ($linha['cabo']=="1") { echo "checked"; } ?>> <label for="cabo">Cabo C </label>
                    <input type="checkbox" id="acessorio2" name="charger" value="1" <?php if ($linha['charger']=="1") { echo "checked"; } ?>> <label for="charger">charger </label>
                     <input type="checkbox" id="acessorio3" name="caixa" value="1" <?php if ($linha['caixa']=="1") { echo "checked"; } ?>>  <label for="caixa">Caixa </label>
                      <input type="checkbox" id="acessorio4" name="fone" value="1" <?php if ($linha['fone']=="1") {echo "checked"; } ?>> <label for="fone">Fone </label>
                       <input type="checkbox" id="acessorio5" name="capa" value="1" <?php if($linha['capa']=="1"){echo "checked"; } ?>> <label for="capa">Capa </label>
                        <input type="checkbox" id="acessorio6" name="chip" value="1" <?php if($linha['chip']=="1"){echo "checked"; } ?>> <label for="chip">Chip </label> 
                         <input type="checkbox" id="acessorio7" name="pelicula" value="1" <?php if($linha['pelicula']=="1"){echo "checked"; } ?>> <label for="pelicula">Pelicula </label>                        
                       <input type="checkbox" id="acessorio8" name="veicular" value="1"  <?php if($linha['veicular']=="1"){echo "checked"; } ?>> <label for="veicular">Veicular C</label> 
                      <input type="checkbox" id="acessorio9" name="suporte" value="1" <?php if($linha['suporte']=="1"){echo "checked"; } ?>> <label for="suporte">Suporte</label> 
                                          
                    </div>                                 
                  <input class="btn btn-info" type="submit" value="Editar Mobile">       
                    </form>   

                      <?php } ?>
                          <?php } ?>                                
                            </div>
                              </div>
    






<div id="mySidenav" class="sidenav">
   <button id="manutencao">Manutenção</button>
       <button id="retirada">Retirada</button>
           <button id="devolucao">Devolução</button>
               <button id="garantia">Garantia</button>
                   <a button id="sair" href="?#chamados">Sair</a></button></div>







                  <!-- The Modal ONE-->
                <div id="modalManutencao" class="modal">
              <!-- Modal Manutenção Content -->
           <div class="modal-content">
         <div class="modal-header0">
       <span class="close">&times;</span>
      <h2 id="title-modal">MANUTENÇÃO</h2>
       </div>   
         <div class="modal-body">                        
           <?php 
              while($linha = mysqli_fetch_array($consulta_tbmobile0)){ 
                ?>
                <?php if($linha['id'] == $_GET['manutencao']){ ?>	
                  <h4>Informações sobre o Mobile</h4>
                <form method="post" action="processa_manutencao.php">
              <input type="hidden" name="id" value="<?php echo $linha['id']; ?>"> 
            <input type="hidden" name="ender_unidade" value="<?php echo $linha['ender'];?>">
          <input type="hidden" name="status" value="2">    
        <label class="badge">UNIDADE:</label>
      <div class="col-12 col-md-12">                                                    
    <input type="text" name="unidade" value="<?php echo $linha['sigla']; ?>">                  
  <label class="badge">IMEI:</label>
   <input type="text" name="imei" readonly value="<?php echo $linha['IMEI'];?>"> 
    <label class="badge">HISTORICO:</label>
      <textarea class="form-control" rows="1" id="comment" name="historico"></textarea><br>                      
        <?php 
          while($linha_osi = mysqli_fetch_array($consulta_osi0)){ ?>                                       
           <label class="badge">ORDEM DE SERVIÇO</label>
            <input type="number" name="osi" value="<?php echo '0'.$osi_soma = 1 + $linha_osi['ordem_servico'];?>">
             <?php 
              }?>                            
            <label class="badge">PROBLEMA</label>
          <select span class="badge" name="id_problema">
        <option>Selecione o diagnostico do equipamento</option>
      <?php 
     while($linha_problema = mysqli_fetch_array($consulta_problema0)){
     echo '<option value="'.$linha_problema['id'].'">'.$linha_problema['descricao'].'</option>';
       }
    ?>
    <?php } ?>
     <?php } ?>
       </select>	
        <input type="hidden" name="dt_inicio" value="<?php echo date("Y/m/d"); ?>">  
         <input class="btn btn-info" type="submit" value="Encaminhar para Manutenção">
         </form>	             
        </div>
      </div>
    </div>
  </div>
</div>      
                  <!-- The Modal TWO-->
                <div id="modalRetirada" class="modal">
             <!-- Modal Manutenção Content -->
           <div class="modal-content">
         <div class="modal-header1">
       <span class="close">&times;</span>
     <h2 id="title-modal">RETIRADA</h2>
      </div>   
        <div class="modal-body">
          <div>
            <?php 
              while($linha = mysqli_fetch_array($consulta_tbmobile1)){ 
                ?>
                <?php if($linha['id'] == $_GET['manutencao']){ ?>	
                  <h4>Informações sobre o Mobile</h4>
                 <form method="post" action="processa_movimentacao.php">
               <input type="hidden" name="id" value="<?php echo $linha['id']; ?>"> 
             <input type="hidden" name="ender_unidade" value="<?php echo $linha['ender'];?>"> 
           <input type="hidden" name="status" value="4"> 
         <label class="badge">UNIDADE:</label>
       <div class="col-12 col-md-12">                                               
     <input type="text" name="sigla_unidade" readonly value="<?php echo $linha['sigla']; ?>">  
   <label class="badge">UNIDADE DESTINO:</label><br>
 <select span class="badge" name="ender_destino">
   <option placeholder="Escolha a unidade de Destino"></option>                                                            
    <?php         
     while($linha1 = mysqli_fetch_array($consulta_sigla0)){
      echo '<option value="'.$linha1['ender'].'">'.$linha1['sigla'].'</option>';
        }                              
        ?>                                                                
         </select>                                        
          <label class="badge">IMEI:</label>
           <input type="text" name="imei" readonly value="<?php echo $linha['IMEI'];?>"> 
            <label class="badge">HISTORICO:</label>
             <textarea class="form-control" rows="1" id="comment" name="historico"></textarea><br>                      
               <?php 
                 while($linha_osi = mysqli_fetch_array($consulta_osi1)){ ?>                                       
                  <label class="badge">ORDEM DE SERVIÇO</label>
                   <input type="number" name="osi" value="<?php echo '0'.$osi_soma = 1 + $linha_osi['ordem_servico'];?>">
                    <?php 
                     }?>                            
                     <label class="badge">PROBLEMA</label>
                     <select span class="badge" name="id_problema">
                    <option>Selecione o diagnostico do equipamento</option>
                   <?php 
                 while($linha_problema = mysqli_fetch_array($consulta_problema1)){
                echo '<option value="'.$linha_problema['id'].'">'.$linha_problema['descricao'].'</option>';
                  }
              ?>
           
        </select>	
       <input type="hidden" name="dt_inicio" value="<?php echo date("Y/m/d"); ?>">  
        <div class="container-acess mt-2"> 

         <input type="checkbox" id="acessorio1" name="cabo" value="1" <?php if($linha['cabo']=="1"){echo "checked"; } ?>> <label for="Cabo">Cabo C</label>
          <input type="checkbox" id="acessorio2" name="charger" value="1" <?php if($linha['charger']=="1"){echo "checked"; } ?>> <label for="charger">charger</label>
           <input type="checkbox" id="acessorio3" name="caixa" value="1" <?php if($linha['caixa']=="1"){echo "checked"; } ?>> <label for="caixa">Caixa</label>
            <input type="checkbox" id="acessorio4" name="fone" value="1" <?php if($linha['fone']=="1"){echo "checked"; } ?>> <label for="fone">Fone</label>
             <input type="checkbox" id="acessorio5" name="capa" value="1" <?php if($linha['capa']=="1"){echo "checked"; } ?>> <label for="capa">Capa</label><br>
              <input type="checkbox" id="acessorio6" name="chip" value="1" <?php if($linha['chip']=="1"){echo "checked"; } ?>> <label for="chip">Chip</label> 
               <input type="checkbox" id="acessorio7" name="pelicula" value="1" <?php if($linha['pelicula']=="1"){echo "checked"; } ?>> <label for="pelicula">Pelicula </label>                        
                <input type="checkbox" id="acessorio8" name="veicular" value="1"  <?php if($linha['veicular']=="1"){echo "checked"; } ?>> <label for="veicular">Veicular C</label> 
                 <input type="checkbox" id="acessorio9" name="suporte" value="1" <?php if($linha['suporte']=="1"){echo "checked"; } ?>> <label for="suporte">Suporte</label> 
               </div> 

              <?php } ?>
            <?php } ?>                      
             <input class="btn btn-info" type="submit" value="Encaminhar para Retirada">
            </form>	             
          </div>
        </div>
      </div>
    </div>
  </div>          
                 <!-- The Modal THREE-->
               <div id="modalDevolucao" class="modal">
             <!-- Modal Manutenção Content -->
           <div class="modal-content">
         <div class="modal-header2">
       <span class="close">&times;</span>
     <h2 id="title-modal">DEVOLUÇÃO</h2>
    </div>   
      <div class="modal-body">
        <div>
          <?php 
            while($linha = mysqli_fetch_array($consulta_tbmobile2)){ 
              ?>
               <?php if($linha['id'] == $_GET['manutencao']){ ?>	
               <h4>Informações sobre o Mobile</h4>
                <form method="post" action="processa_movimentacao.php">
              <input type="hidden" name="id" value="<?php echo $linha['id']; ?>"> 
             <input type="hidden" name="ender_unidade" value="<?php echo $linha['ender'];?>">  
           <input type="hidden" name="status" value="5"> 
          <label class="badge">UNIDADE:</label>
        <div class="col-12 col-md-12">                                              
      <input type="text" name="unidade" readonly value="<?php echo $linha['sigla']; ?>"> 
     <input type="hidden" name="ender_destino" value="380001070000000">                 
    <label class="badge">IMEI:</label>
   <input type="text" name="imei" readonly value="<?php echo $linha['IMEI'];?>"> 
    <label class="badge">HISTORICO:</label>
     <textarea class="form-control" rows="1" id="comment" name="historico"></textarea><br>                      
      <?php while($linha_osi = mysqli_fetch_array($consulta_osi2)){ ?>                                       
       <label class="badge">ORDEM DE SERVIÇO</label>
        <input type="number" name="osi" value="<?php echo '0'.$osi_soma = 1 + $linha_osi['ordem_servico'];?>">
         <?php 
           }?>                            
           <label class="badge">PROBLEMA</label>
            <select span class="badge" name="id_problema">
             <option>Selecione o diagnostico do equipamento</option>
              <?php 
               while($linha_problema = mysqli_fetch_array($consulta_problema2)){
                echo '<option value="'.$linha_problema['id'].'">'.$linha_problema['descricao'].'</option>';
                 }
                  ?>
              
          </select>	
        <input type="hidden" name="dt_inicio" value="<?php echo date("Y/m/d"); ?>">    
      <div class="container-acess mt-2">                       
     <input type="checkbox" id="acessorio1" name="cabo" value="1" <?php if($linha['cabo']=="1"){echo "cheked"; } ?>> <label for="cabo">Cabo C </label>
      <input type="checkbox" id="acessorio2" name="charger" value="1" <?php if ($linha['charger']=="1") { echo "checked"; } ?>> <label for="charger">charger </label>
       <input type="checkbox" id="acessorio3" name="caixa" value="1" <?php if ($linha['caixa']=="1") { echo "checked"; } ?>>  <label for="caixa">Caixa </label>
        <input type="checkbox" id="acessorio4" name="fone" value="1" <?php if ($linha['fone']=="1") {echo "checked"; } ?>> <label for="fone">Fone </label>
         <input type="checkbox" id="acessorio5" name="capa" value="1" <?php if($linha['capa']=="1"){echo "checked"; } ?>> <label for="capa">Capa </label><br>
          <input type="checkbox" id="acessorio6" name="chip" value="1" <?php if($linha['chip']=="1"){echo "checked"; } ?>> <label for="chip">Chip </label> 
           <input type="checkbox" id="acessorio7" name="pelicula" value="1" <?php if($linha['pelicula']=="1"){echo "checked"; } ?>> <label for="pelicula">Pelicula </label>                        
                <input type="checkbox" id="acessorio8" name="veicular" value="1"  <?php if($linha['veicular']=="1"){echo "checked"; } ?>> <label for="veicular">Veicular C</label> 
                 <input type="checkbox" id="acessorio9" name="suporte" value="1" <?php if($linha['suporte']=="1"){echo "checked"; } ?>> <label for="suporte">Suporte</label> 
              </div> 
  
          <?php } ?>
            <?php } ?>
          <input class="btn btn-info" type="submit" value="Encaminhar para Devolução">
         </form>	             
       </div> 
      </div>
    </div>
  </div>
</div>             
               <!-- The Modal FOUR-->
             <div id="modalGarantia" class="modal">
           <!-- Modal Manutenção Content -->
         <div class="modal-content">
       <div class="modal-header3">
     <span class="close">&times;</span>
    <h2 id="title-modal">GARANTIA</h2>
     </div>   
       <div class="modal-body">
         <div>
           <?php 
             while($linha = mysqli_fetch_array($consulta_tbmobile3)){ 
               ?>
               <?php if($linha['id'] == $_GET['manutencao']){ ?>	
                <h4>Informações sobre o Mobile</h4>
                <form method="post" action="processa_garantia.php">
              <input type="hidden" name="id" value="<?php echo $linha['id']; ?>"> 
            <input type="hidden" name="ender_unidade" value="<?php echo $linha['ender'];?>"> 
          <input type="hidden" name="status" value="3"> 
        <label class="badge">UNIDADE:</label>
       <div class="col-12 col-md-12">                                                    
      <input type="text" name="unidade" value="<?php echo $linha['sigla']; ?>">                  
     <label class="badge">IMEI:</label>
    <input type="text" name="imei" readonly value="<?php echo $linha['IMEI'];?>"> 
     <label class="badge">HISTORICO:</label>
      <textarea class="form-control" rows="1" id="comment" name="historico"></textarea><br>                      
         <?php 
         while($linha_osi = mysqli_fetch_array($consulta_osi3)){ ?>                                       
          <label class="badge">ORDEM DE SERVIÇO</label>
           <input type="number" name="osi" value="<?php echo '0'.$osi_soma = 1 + $linha_osi['ordem_servico'];?>">
             <?php 
             }?>                            
               <label class="badge">PROBLEMA</label>
                <select span class="badge" name="id_problema">
                 <option>Selecione o diagnostico do equipamento</option>
                 <?php 
                 while($linha_problema = mysqli_fetch_array($consulta_problema3)){
                echo '<option value="'.$linha_problema['id'].'">'.$linha_problema['descricao'].'</option>';
                }
                ?>
              <?php } ?>
            <?php } ?>
          </select>	
        <input type="hidden" name="dt_inicio" value="<?php echo date("Y/m/d"); ?>">     
          <input class="btn btn-info" type="submit" value="Encaminhar para Garantia">
            </form>	             
             </div>
            </div>
           </div>
         </div>
       </div>
     </div>
                       



                                
                      





















    
<script>
// Get the modal
var modal = document.getElementById("modalManutencao");
var modal1 = document.getElementById("modalRetirada");
var modal2 = document.getElementById("modalDevolucao");
var modal3 = document.getElementById("modalGarantia");

// Get the button that opens the modal
var btn = document.getElementById("manutencao");
var btn1 = document.getElementById("retirada");
var btn2 = document.getElementById("devolucao");
var btn3 = document.getElementById("garantia");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];
var span1 = document.getElementsByClassName("close")[1];
var span2 = document.getElementsByClassName("close")[2];
var span3 = document.getElementsByClassName("close")[3];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}
btn1.onclick = function() {
  modal1.style.display = "block";
} 
btn2.onclick = function() {
  modal2.style.display = "block";
} 
btn3.onclick = function() {
  modal3.style.display = "block";
} 

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}
span1.onclick = function() {
  modal1.style.display = "none";
}
span2.onclick = function() {
  modal2.style.display = "none";
}
span3.onclick = function() {
  modal3.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

window.onclick = function(event) {
  if (event.target == modal1) {
    modal1.style.display = "none";
  }
}

window.onclick = function(event) {
  if (event.target == modal2) {
    modal2.style.display = "none";
  }
}

window.onclick = function(event) {
  if (event.target == modal3) {
    modal3.style.display = "none";
  }
}
</script>


