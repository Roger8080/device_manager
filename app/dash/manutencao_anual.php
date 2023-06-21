
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawVisualization);

      function drawVisualization() {
        // Some raw data (not necessarily accurate)
        var data = google.visualization.arrayToDataTable([
          ['mes', 
          'nao_liga', 
          'Tela_nao_reproduz_imagem',
          'bateria_nao_carrega',
          'pelicula_trincada',
          'desligando_sozinho',
          'sem_novidade',
          'sem_sinal',
          'substituicao',
          'em_andamento',
          'capa_danificada',
          'display_danificado',
          'atualizacao',
          'extraviado',
          'tela_trincada',
          'caixa_trocada',
          'nao_abre_PDF',
          'so_corrompido',
          'app_nao_funciona',
          'PDF_indisponivel' ],

          <?php
            include 'db.php';
            
            $sql = "SELECT 
            DATE_FORMAT(t.dt_inicio, \"%M-%Y\") AS mes, 
            SUM(IF(t.problema = '1', 1, 0)) AS nao_liga, 
            SUM(IF(t.problema = '2', 1, 0)) AS Tela_nao_reproduz_imagem, 
            SUM(IF(t.problema = '3', 1, 0)) AS bateria_nao_carrega, 
            SUM(IF(t.problema = '4', 1, 0)) AS pelicula_trincada, 
            SUM(IF(t.problema = '5', 1, 0)) AS desligando_sozinho, 
            SUM(IF(t.problema = '6', 1, 0)) AS sem_novidade, 
            SUM(IF(t.problema = '7', 1, 0)) AS sem_sinal, 
            SUM(IF(t.problema = '8', 1, 0)) AS substituicao, 
            SUM(IF(t.problema = '9', 1, 0)) AS em_andamento, 
            SUM(IF(t.problema = '10', 1, 0)) AS capa_danificada, 
            SUM(IF(t.problema = '11', 1, 0)) AS display_danificado, 
            SUM(IF(t.problema = '12', 1, 0)) AS atualizacao, 
            SUM(IF(t.problema = '13', 1, 0)) AS extraviado, 
            SUM(IF(t.problema = '14', 1, 0)) AS tela_trincada, 
            SUM(IF(t.problema = '15', 1, 0)) AS caixa_trocada,
            SUM(IF(t.problema = '16', 1, 0)) AS nao_abre_PDF,
            SUM(IF(t.problema = '17', 1, 0)) AS so_corrompido,
            SUM(IF(t.problema = '18', 1, 0)) AS app_nao_funciona,
            SUM(IF(t.problema = '19', 1, 0)) AS PDF_indisponivel
            FROM tbmobile_movimentacao t
            INNER JOIN tb_problema p ON p.id = t.problema
            WHERE t.dt_inicio BETWEEN \"2023-01-01\" AND \"2023-12-31\" 
            AND t.problema NOT IN ('6','9')
            GROUP BY mes
            ORDER BY t.dt_inicio ASC"; //   id | descricao    
            $buscar = mysqli_query($conexao, $sql);


            while ($dados = mysqli_fetch_array($buscar)) {             
            $mes = $dados['mes'];
            $nao_liga = $dados['nao_liga'];  
            $Tela_nao_reproduz_imagem = $dados['Tela_nao_reproduz_imagem'];    
            $bateria_nao_carrega = $dados['bateria_nao_carrega'];       
            $pelicula_trincada = $dados['pelicula_trincada']; 
            $desligando_sozinho = $dados['desligando_sozinho']; 
            $sem_novidade = $dados['sem_novidade']; 
            $sem_sinal = $dados['sem_sinal']; 
            $substituicao = $dados['substituicao']; 
            $em_andamento = $dados['em_andamento']; 
            $display_danificado = $dados['display_danificado']; 
            $capa_danificada = $dados['capa_danificada']; 
            $atualizacao = $dados['atualizacao']; 
            $extraviado = $dados['extraviado']; 
            $tela_trincada = $dados['tela_trincada']; 
            $caixa_trocada = $dados['caixa_trocada'];  
            $nao_abre_PDF = $dados['nao_abre_PDF'];  
            $so_corrompido = $dados['so_corrompido'];  
            $app_nao_funciona = $dados['app_nao_funciona'];           
            $PDF_indisponivel = $dados['PDF_indisponivel'];  
            ?>
        

            ['<?php echo $mes ?>', 
            <?php echo $nao_liga ?>,
            <?php echo $Tela_nao_reproduz_imagem ?>,
            <?php echo $bateria_nao_carrega ?>,
            <?php echo $pelicula_trincada ?>,
            <?php echo $desligando_sozinho ?>,
            <?php echo $sem_novidade ?>,
            <?php echo $sem_sinal ?>,
            <?php echo $substituicao ?>,
            <?php echo $em_andamento ?>,
            <?php echo $display_danificado ?>,
            <?php echo $capa_danificada ?>,
            <?php echo $atualizacao ?>,
            <?php echo $extraviado ?>,
            <?php echo $tela_trincada ?>,
            <?php echo $caixa_trocada?>,  
            <?php echo $nao_abre_PDF?>, 
            <?php echo $so_corrompido?>, 
            <?php echo $app_nao_funciona?>, 
            <?php echo $PDF_indisponivel?> ],

            <?php } ?>       
                   
                ]);


        var options = {
          title : 'Movimentações de 2023',
          vAxis: {title: 'Volume de Manutenções'},
          hAxis: {title: 'MESES 2023'},
          seriesType: 'line',
          backgroundColor: 'transparent',
          series: {5: {type: 'bar'}}
        };

        var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
      
         </script>
         
      <body>
    <div id="chart_div" style="width: 100%; height: 280px"></div>
  </body>
