<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Problema', 'Descricao'],
         

          

<?php
    include 'db.php';
    
    $sql = "SELECT p.id, s.status, p.descricao,COUNT(p.id) AS problema_id
    FROM tbmobile_movimentacao m
    LEFT JOIN tb_problema p ON p.id = m.problema
    LEFT JOIN tbstatus s ON s.id = m.status		
    WHERE p.id NOT IN ('12','9','6')
    GROUP BY p.id"; //   id | descricao    
    $buscar_mov_anual = mysqli_query($conexao,$sql);

    while ($dados = mysqli_fetch_array($buscar_mov_anual)) {
        $descricao = $dados['descricao'];
        $problema = $dados['problema_id'];
    
?>

  ['<?php echo $descricao ?>', <?php echo $problema ?>], <?php } ?>

]);



        var options = {
          title: 'Movimentações em TODO O PERÍODO',
          backgroundColor: 'transparent',
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart_anual'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
  <div id="donutchart_anual" style="width: 100%; height: 300px"></div>
  </body>
</html>