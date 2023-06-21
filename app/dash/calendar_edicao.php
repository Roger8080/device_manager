<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  google.charts.load("current", { packages: ["calendar"] });
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {
    var dataTable = new google.visualization.DataTable();
    dataTable.addColumn({ type: 'date', id: 'Date' });
    dataTable.addColumn({ type: 'number', id: 'Volume' });
    dataTable.addRows([
      <?php
      include 'db.php';

      $sql = "SELECT 
                  Date,
                  SUM(qtd) AS total_qtd
              FROM (
                  SELECT 
                      DATE(t.dt_inicio) AS Date,
                      COUNT(t.id) AS qtd
                  FROM tbmobile_movimentacao t
                  INNER JOIN tb_problema p ON p.id = t.problema
                  WHERE t.dt_inicio BETWEEN '2022-01-01' AND '2023-12-31'
                  GROUP BY Date  
                  HAVING qtd <= 15               

                  UNION ALL

                  SELECT 
                      DATE(m.dt_inicio) AS Date,
                      COUNT(m.id) AS qtdm
                  FROM tbmobile_manutencao m
                  INNER JOIN tb_problema p ON p.id = m.problema
                  WHERE m.dt_inicio BETWEEN '2022-01-01' AND '2023-12-31'
                  GROUP BY Date
                  HAVING qtdm <= 15 
                  
                  

              ) AS combined_data
              GROUP BY Date";
      $buscarCalendar = mysqli_query($conexao, $sql);

      while ($dados = mysqli_fetch_array($buscarCalendar)) {
        $date = $dados['Date'];
        $qtd = $dados['total_qtd']; // Ajuste: utilizar o valor total_qtd

        echo "[new Date('$date'), $qtd],"; // Ajuste: imprimir o resultado no formato JavaScript
      }
      ?>
    ]);

    var chart = new google.visualization.Calendar(document.getElementById('calendar_basic'));
    var options = {
  title: 'Registro de Movimentações de 2022 à 2023',
  width: 800,
  height: 300,
  fontColor: '#333333',
  backgroundColor: '#F5F5F5',
  calendar: {
    cellSize: 12,
    cellColor: {
      stroke: '#CCCCCC',
      strokeOpacity: 0.5,
      strokeWidth: 1,
    },
    focusedCellColor: {
      stroke: '#153fff',
      strokeOpacity: 1,
      strokeWidth: 2,
    },
  },
  tooltip: {
    isHtml: true,
  },
};

    chart.draw(dataTable, options);
  }
</script>

<body>
  <div id="calendar_basic" style="width: 100%; height: 300px"></div>
</body>






