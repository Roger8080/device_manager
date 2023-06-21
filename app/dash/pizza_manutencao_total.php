<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values

function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ['problema', 'descricao'],




<?php
    include 'db.php';
    
    $sql = "SELECT p.id, s.status, p.descricao, COUNT(p.id) AS problema_id FROM tbmobile_manutencao m
    LEFT JOIN tb_problema p ON p.id = m.problema
    LEFT JOIN tbstatus s ON s.id = m.status		
    WHERE p.id NOT IN ('12','9') 
    GROUP BY p.id";   
    $buscar = mysqli_query($conexao,$sql);

    while ($dados = mysqli_fetch_array($buscar)) {
        $descricao = $dados['descricao'];
        $problema = $dados['problema_id'];
    
?>

  ['<?php echo $descricao ?>', <?php echo $problema ?>], <?php } ?>

]);


  // Optional; add a title and set the width and height of the chart
  var options = {'title':'TOTAL de Manutenções:', /*'width':750, 'height':500*/};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);

}

</script>
<body>
    <div id="piechart" style="width: 100%; height: 300px"></div>
</body>