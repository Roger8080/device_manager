<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="UTF-8">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
}

.history-container {
  width: 100%;
  height: auto;
  margin: 10px;
  padding: 10px;
  overflow: hidden;
}

.history-text {
  font-size: 18px;
  white-space: pre-line;
}
</style>
</head>
<body>

<?php
include 'db.php';

$sql = "SELECT DATE_FORMAT(m.dt_inicio, '%d-%m-%Y') AS dt_inicio, s.status, p.descricao AS problema_name, m.historico
FROM tbmobile_manutencao m
LEFT JOIN tb_problema p ON p.id = m.problema
LEFT JOIN tbstatus s ON s.id = m.status
WHERE p.id NOT IN ('12', '9') 
AND MONTH(m.dt_inicio) = MONTH(CURDATE()) AND YEAR(m.dt_inicio) = YEAR(CURDATE())
GROUP BY p.id";
$result = mysqli_query($conexao, $sql);

$historicoArray = array();

if ($result) {
  while ($row = mysqli_fetch_assoc($result)) {
      $historicoArray[] = array(
          'historico' => ($row['historico']),
          'problema_name' => ($row['problema_name']),
          'status' => ($row['status']),
          'dt_inicio' => $row['dt_inicio']
      );
  }
} else {
  echo "Erro na consulta: " . mysqli_error($conexao);
}

?>

<h3 class="title-text"></h3>
<h5 class="subtitle-text"></h5>

<div class="history-container">
  <div class="history-text"></div>
</div>

<script>
const historicoArray = <?php echo json_encode($historicoArray); ?>;
const historyTextElement = document.querySelector('.history-text');
const titleTextElement = document.querySelector('.title-text');
const subtitleTextElement = document.querySelector('.subtitle-text');

let currentLine = 0;
let currentText = '';
let interval;

function typeNextLine() {
  const historicoItem = historicoArray[currentLine];
  const historico = historicoItem.historico;
  const descricao = historicoItem.problema_name;
  const dtInicio = historicoItem.dt_inicio;
  const status = historicoItem.status;
  let index = 0;
  clearInterval(interval);

  interval = setInterval(() => {
    currentText += historico[index];


    historyTextElement.innerHTML = currentText;
    titleTextElement.innerHTML = descricao; // Atualiza o conteúdo do título
    subtitleTextElement.innerHTML = `${dtInicio} ocorreu uma ${status}`; // Atualiza o conteúdo do subtítulo
    index++;

    if (index >= historico.length) {
      clearInterval(interval);
      currentText = '';
      currentLine = (currentLine + 1) % historicoArray.length;
      setTimeout(typeNextLine, 2000);

    }
  }, 75);
}

typeNextLine();
</script>


</body>
</html>
