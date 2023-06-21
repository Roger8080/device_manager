<?php
ob_start();
header("Content-Type:text/html; charset=UTF-8",true);
session_start();
include("../plugins/conexao.php");
$data1 = (isset($_REQUEST["data1"])) ? "".date("Y-m-01", strtotime($_REQUEST["data1"]))."" : "".date("Y-m-01")."" ;
$data2 = (isset($_REQUEST["data2"])) ? "".date("Y-m-t", strtotime($_REQUEST["data2"]))."" : "".date("Y-m-t")."" ;

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<title>GCM MOBILE</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo"$cabecalho";?></title>
<script>
function printFrame() { window.print(); }
</script>
<style>
html, body {
	font-family: Courier New;
}

#filtro {
	border-collapse:collapse;
	border:0px solid #FFF;
}
#filtro tr > td {
	border:0px solid #FFF;
	padding:10px;
	font-weight:bold;
}

#filtro td {
	vertical-align:middle;
	font-size:1.5rem;
	text-align:right;
	padding-top:10px;
}
#filtro input, select {
	vertical-align:middle;
	height:40px;
	font-size:1.2rem;
	margin:5px 10px;
}
#filtro input[type="submit"] {
	width:120px;
	font-size:1.2rem;
	color:#F00;
	padding:5px;
}
#filtro .distribuir {
	display:flex;
	flex-flow: row nowrap;
	justify-content: space-between;
	align-items: center;
	align-content: center;
}

#resultado {
	border-collapse:collapse;
	border:2px solid #000;
}
#resultado thead, tr, th, td {
	border:2px solid #000;
	padding:10px;
	font-weight:bold;
}
#resultado td {
	write-space:nowrap;
}
#resultado td:nth-child(2), td:nth-child(3), td:nth-child(4) {
	text-align:center;	
}
#resultado tr:nth-child(even) {
    background-color: lightyellow;
}
#resultado tr > th {
    background-color: #CCC;
	border:1px solid #000;
}
#resultado thead {
	position: sticky;
	position: -webkit-sticky; /* Safari */
	top: 0px;
}
#resultado span  {
	text-align:right;
	display:inline-block;
	width:120px;
	border:0px solid #F00;
	font-weight:bold;
}
#btn_print {
display: block;
position: fixed;
bottom: 100px;
right: 50px;
width: auto;
font-size:3vw;
font-weight:bold;
border:1px solid #000;
border-radius:5px;
background-color:#FF0;
padding:5px 30px;
margin:5px;
cursor:pointer;
}
#btn_print:hover {
background-color:#090;
color:#FFF;
}
@media print {
	html, body { margin:20px; }
	#filtro { display:none!important; }
	#resultado { width:100%; margin:20px 0px; }
	
	#resultado tr {page-break-inside: avoid;}
	
	
	#btn_print { display:none!important; }
}
</style>



</head>
<body>
<main>
<center>
<form id="filtro" method="get" action="./usabilidade2.php" target="_self">
<table>
<tr>
<td>Período:</td>
<td class="distribuir">
<input type="date" id="data1" name="data1" value="<?php echo "{$data1}"; ?>">
à
<input type="date" id="data2" name="data2" value="<?php echo "{$data2}"; ?>">
</td>
<td>
<input type="submit" value="filtrar">
</td>
</tr>
</table>
</form>
<hr>
<h1>USABILIDADE DO SMARTPHONE E APLICATIVO GCM-MOBILE</h1>
<h2>PERÍODO: <?php echo "".date("d/m/Y", strtotime($data1)).""; ?> à <?php echo "".date("d/m/Y", strtotime($data2)).""; ?></h2>
<hr>
</center>
<?php
$host = "10.86.129.165:3306";
$user = "sistemas";
$pass = "vlacardito234";
$banc = "dbdti";
$con2 = mysqli_connect("$host", "$user", "$pass", "$banc");
    $mes_extenso = array(
        '01' => 'Janeiro',
        '02' => 'Fevereiro',
        '03' => 'Marco',
        '04' => 'Abril',
        '05' => 'Maio',
        '06' => 'Junho',
        '07' => 'Julho',
        '08' => 'Agosto',
        '09' => 'Setembro',
        '10' => 'Outubro',
        '11' => 'Novembro',
        '12' => 'Dezembro'
    );


$sql = "
SELECT DATE_FORMAT(data, \"%Y-%m\") AS mes, unidade, COUNT(*) as quantidade FROM tb_talao WHERE
DATA BETWEEN 
DATE_FORMAT(DATA, \"{$data1}\")
AND 
DATE_FORMAT(DATA, \"{$data2}\")
GROUP BY DATE_FORMAT(DATA, \"%Y-%m\"), unidade ORDER BY DATA ASC, unidade ASC;
";


$res = $con->query("$sql");
if ($res && ($total = $res->num_rows) > 0) {
$mescorrente = null;
?>




<table id="resultado" border="1" width="80%" align="center">
<?php
while ($cmp = mysqli_fetch_array($res, MYSQLI_BOTH)) {
$dias = cal_days_in_month(CAL_GREGORIAN, date("m",strtotime($cmp["mes"])), 2022); // 31
$aparelhos = 0;
	$sql = "
	SELECT t2.sigla, COUNT(*) AS quantidade 
	FROM tbmobile AS t1 
	INNER JOIN unidade AS t2 
	ON (t1.unidade = t2.ender) 
	WHERE t2.sigla = '{$cmp[unidade]}'
	GROUP BY t1.unidade 
	ORDER BY t1.unidade ASC
	LIMIT 1;
	";
	$res2 = $con2->query("$sql");
	if ($res2 && ($total = $res2->num_rows) > 0) {
		$cmp2 = mysqli_fetch_array($res2, MYSQLI_BOTH);
		$aparelhos = "{$cmp2["quantidade"]}";
	}




	
$expectativa = ($dias * $aparelhos);
$percentual = (floatval($cmp["quantidade"]/$expectativa) > 1) ? 100 : floatval($cmp["quantidade"]/$expectativa) * 100;
$objetivo = ($percentual >= 100) ? "<strong style='color:#0000FF'>" : "<strong style='color:#FF0000'>";
$objetivo .= "<span>".number_format($percentual,2)."%</span>";
$objetivo .= " - ";
$objetivo .= ($percentual >= 100) ? "OK" : "NÃO ATINGIU";
$objetivo .= "</strong>";
if ($cmp["unidade"]!="DTIC") {
?>
<?php if ($mescorrente != $cmp["mes"]) { ?>	
<thead>
<tr>
<td colspan="5" style="text-align:center;font-size:3rem;font-weight:bold;background:#444444;color:#FF0">
<?php
//echo "".date("F",strtotime($cmp["mes"]))." - {$dias} dias<br>";
//echo "".strftime('%B / %Y', strtotime($cmp["mes"]))." - {$dias} dias<br>";
echo "".$mes_extenso[date('m', strtotime($cmp["mes"]))]." - {$dias} dias<br>";
?>
</td>
</tr>
<tr>
<th>UNIDADE</th>
<th>APARELHOS</th>
<th>R.D.P.s PRODUZIDOS</th>
<th>EXPECTATIVA DE PRODUÇÃO</th>
<th>META</th>
</tr>
</thead>

<?php } ?>
<tr>
<td><?php echo "{$cmp["unidade"]}"; ?></td>
<td><?php echo "{$aparelhos}"; ?></td>
<td><?php echo "{$cmp["quantidade"]}"; ?></td>
<td><?php echo "{$expectativa}"; ?></td>
<td><?php echo "{$objetivo}"; ?></td>
</tr>
<?php 
$mescorrente = "{$cmp["mes"]}";
}} ?>
</table>
<?php } ?>
<div id="btn_print" onclick="javascript:printFrame()">
<i class="fa-solid fa-print"></i>
</div>
<script type="text/javascript" src="../plugins/all.min.js"></script>
</body>
</html>
<?php
if (isset($res)) { @mysqli_free_result($res); }
mysqli_close($con);
if(function_exists("gzcompress") == true) {
if(strpos($_SERVER["HTTP_ACCEPT_ENCODING"],"x-gzip") > -1) {
$encoding = "x-gzip";
} elseif (strpos($_SERVER["HTTP_ACCEPT_ENCODING"],"gzip") > -1) {
$encoding = "gzip";
}
if(!empty($encoding)) {
$content = ob_get_contents();
ob_end_clean();
header("Content-Encoding:".$encoding);
echo "\x1f\x8b\x08\x00\x00\x00\x00\x00";
echo gzcompress($content,5);
exit();
} else {
ob_end_flush();
exit();
}}
?>