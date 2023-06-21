
<html>

<head>

   <!-- AJAX & JQUERY -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.12/jquery.mask.min.js"></script>          
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
   <meta charset="UTF-8">



<!-- CSS only for CARDS-->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
<link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">    


<title></title>
</head>
<body>



<style>
body {
  font-family: Arial, Helvetica, sans-serif;
}

.flip-card {
  background-color: #f3f3f3;
  width: 300px;
  height: 300px;
  perspective: 1000px;
}

.flip-card-inner {
  position: relative;
  width: 100%;
  height: 100%;
  text-align: center;
  transition: transform 0.6s;
  transform-style: preserve-3d;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
}

.flip-card:hover .flip-card-inner {
  transform: rotateY(180deg);
}

.flip-card-front, .flip-card-back {
  position: absolute;
  width: 100%;
  height: 100%;
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
}

.flip-card-front {
  background-color: #f3f3f3;
  color: black;
}

.flip-card-back {  
  color: black;
  transform: rotateY(180deg);
}


</style>










                  

       

                            
            
 




<div class="container">
            <body style="background-color: #f3f3f3">
                <div class="container-fluid">




                
            <div class="row">    
              <h1 style="margin-top: 40px; font-size: 30px"> </h1>
              <a href="../../index.php"> Voltar</a>     
                        
               
                
                
                 

              <?php 
                include '../../db.php';  

                $query = "SELECT COUNT(id) as mobile FROM tbmobile WHERE ativo = '1'";
                $soma_mobile = mysqli_query($conexao, $query);

                $_SESSION['soma'] = mysqli_fetch_array($soma_mobile);                

               

                $query = "SELECT u.sigla, t.unidade,                
                          COUNT(t.IMEI) AS Quantidade, 
                          SUM(t.cabo) as cabo,
                          SUM(t.charger) as charger,
                          SUM(t.caixa) as caixa,
                          SUM(t.pelicula) as pelicula,
                          SUM(t.capa) as capa,
                          SUM(t.fone) as fone,
                          SUM(t.chip) as chip
                          FROM tbmobile t
                          INNER JOIN unidade u ON t.unidade = u.ender
                          WHERE ativo = '1'
                          GROUP BY UNIDADE
                          order by Quantidade desc ";
                          $consulta_unidade = mysqli_query($conexao,$query);


                       
                          
                    echo '<h1 style="margin-top: 40px; font-size: 30px"> Relatório de Distribuição MOBILE TOTAL: ' 
                    .$_SESSION['soma']['mobile'].                    
                    '</h1><br>';

               


                while($linha = mysqli_fetch_array($consulta_unidade)){ 
                           

                  echo ' <div class="col-md-2"><br>
                           
                       

             <div class="flip-card">
            <div class="flip-card-inner"; style="max-width: 10rem; min-height: 5rem;">
           <div class="flip-card-front"; style="font-size: 7px;">'
           //.$linha['sigla'].'<br>'.$linha['Quantidade'].'

          .'<br><h5 class="card-title"; style="text-align:center; font-size: 22px;"><br>'.$linha['sigla'].'</h5><br>
         <p style="text-align:center; margin-top: -30px; font-size: 44px"><br> '.$linha['Quantidade'].'</p>'.'</div>

        <div class="flip-card-back"> 
       <h5 class="card-title">'.$linha['sigla'].':'. $linha['Quantidade'].'</h5><br>
      <p style="text-align:center; font-size: 10px">CABOS: '.$linha['cabo'].'</p>
      <p style="text-align:center; font-size: 10px">CHARGER: '.$linha['charger'].'</p>
      <p style="text-align:center; font-size: 10px">CAIXA: '.$linha['caixa'].'</p>
      <p style="text-align:center; font-size: 10px">PELICULA: '.$linha['pelicula'].'</p>
      <p style="text-align:center; font-size: 10px">CAPA: '.$linha['capa'].'</p>
      <p style="text-align:center; font-size: 10px">FONE: '.$linha['fone'].'</p>
      <p style="text-align:center; font-size: 10px">CHIP: '.$linha['chip'].'</p>'              
   ?>              
    
    
         <i class="fas fa-bars" data-bs-toggle="modal" data-bs-target="#modalOperacao" 
         data-ender="<?php echo $linha2['unidade']; ?>"
           data-sigla="<?php echo $linha2['sigla']; ?>" 
             data-imei="<?php echo $linha2['unidade']; ?>" 
               data-status="<?php echo $linha2['status']; ?>"  
                 data-ordem_servico="<?php echo $linha2['ordem_servico'];?>"></i></div></div></div>
                  
                 

                 
           
                 
                    
<div class="modal fade" id="modalOperacao" tabindex="-1" aria-labelledby="operacaoLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="operacaoLabel">Operação Encerrada</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
              <div class="modal-body">
              <form method="post" action="#">   
                
                    <div class="mb-3">
                    <label for="ender" class="col-form-label">ender:</label>
                      <input type="label" class="form-control" id="ender" name="ender" readonly>                                          
                        </div>

                          <div class="mb-3">
                          <label for="sigla" class="col-form-label">sigla :</label>
                            <input type="label" class="form-control" id="sigla" name="sigla" readonly>                                          
                              </div>

                              <div class="mb-3">
                                <label for="imei" class="col-form-label">imei:</label>
                                  <input type="text" class="form-control" name="imei" id="imei" readonly>                                               
                                  </div>

                                    <div class="mb-3">
                                      <label for="status" class="col-form-label">status:</label>
                                      <input type="text" class="form-control" name="status" id="status" readonly>
                                      </div>  

                                      <div class="mb-3">
                                      <label for="ordem_servico" class="col-form-label">ordem_servico:</label>
                                    <textarea class="form-control" rows="5" id="ordem_servico" name="ordem_servico" readonly></textarea>
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
  </div>


                   

                    <?php
                        }         
                     ?>


                                        
            </div>
         </div>

                   <script>
                   $(function(){ 
                     $('#modalOperacao').on('show.bs.modal', function (event) {
                        var button = $(event.relatedTarget)
                         var id = button.data('ender');
                          var dt_inicio = button.data('sigla'); 
                           var sigla = button.data('imei');   
                            var os = button.data('os');                                      
                             var historico = button.data('historico');                                                         
                              var modal = $(this)
                              modal.find('.modal-title').text('Data da Abertura:  ' + dt_inicio)                                 
                              modal.find('#ender').val(ender) 
                             modal.find('#sigla').val(sigla)
                            modal.find('#imei').val(imei) 
                           modal.find('#status').val(status)
                         modal.find('#ordem_servico').val(ordem_servico)                               
                         });
                      });
                   </script>







</div>      