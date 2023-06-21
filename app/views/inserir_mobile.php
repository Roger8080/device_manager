<!-- procura na URL a tag "editar", caso encontre, direciona a pagina para o modo de Edição do Aluno -->
<?php if(!isset($_GET['editar'])){ ?> 

<h2>Inserir Novo Mobile</h2>
<form method="post" action="inserir_mobile.php">
	<br><br>
		<label class="badge badge-info">UNIDADE:</label><br>
		<input type="text" name="unidade" placeholder="Insira a unidade do mobile">
		<br><br>
		<label class="badge badge-info">IMEI:</label><br>
		<input type="text" name="imei" placeholder="Insira o IMEI do mobile">
		<br><br>
		<label class="badge badge-info">SERIE:</label><br>
		<input type="text" name="serie" placeholder="Insira o serie do mobile">
		<br><br>
		<label class="badge badge-info">NUMERO:</label><br>
		<input type="text" name="numero" placeholder="Insira a numero do mobile">
		<br><br>
	<input class="btn btn-info" type="submit" value="Inserir Mobile">
</form>


<?php } else { ?> <!-- Este é o modo de Edição do Aluno, com base no "ID_ALUNO", será carregado os dados do mesmo em cada campo abaixo -->
	              <!-- O "ID_ALUNO" será carregado através da URL, retornando desta forma: pagina=inserir_aluno&editar=34 -->
	<?php while($linha = mysqli_fetch_array($consulta_tbmobile)){ ?>
		<?php if($linha['id'] == $_GET['editar']){ ?>
		
	      <h2>Editar Mobile</h2>
		    <form method="post" action="edita_mobile.php">
	           <input type="hidden" name="id" value="<?php
		         echo $linha['id']; ?>">
			     <br><br>
			     <label class="badge badge-info">UNIDADE:</label><br>
				 <input type="text" name="unidade" placeholder="Insira a unidade do mobile"
				 value="<?php echo $linha['unidade']; ?>">
				 <br><br>
				 <label class="badge badge-info">IMEI:</label><br>
				 <input type="label" name="imei" placeholder="Insira o IMEI do mobile"
				 value="<?php echo $linha['IMEI'];?>">
				 <br><br>
				 <label class="badge badge-info">SERIE:</label><br>
				 <input type="label" name="serie" placeholder="Insira o serie do mobile"
				 value="<?php echo $linha['SERIE'];?>">
				 <br><br>
				 <label class="badge badge-info">NUMERO:</label><br>
				 <input type="text" name="numero" placeholder="Insira a numero do mobile"
				 value="<?php echo $linha['NUMERO'];?>">
				 <br><br>
			   <input class="btn btn-info" type="submit" value="Editar mobile">
		    </form>
		   
		<?php } ?>
	<?php } ?>
<?php } ?>	










              

			  
           
       