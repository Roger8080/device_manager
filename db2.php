<?php

# Conexão com o banco de dados
$server = "10.86.129.165";
$usuario = "sistemas";
$senha = "vlacardito234";
$database = "dbdti2";


$conexao2 = mysqli_connect($server, $usuario, $senha, $database);



#Buscando tabelas no Mysql
$query = "SELECT m.id, u.sigla, tb.imei, tb.NUMERO as numero,  m.status, m.dt_inicio,
m.dt_encerramento, m.os, st.id as status_id, m.historico, 
p.id as problema_id, p.descricao as problema  
FROM tbmobile_manutencao m
INNER JOIN unidade u ON  u.ender = m.unidade
INNER JOIN tbmobile tb ON tb.id = m.id_prod
LEFT JOIN tbstatus st on m.status = st.id
LEFT JOIN tb_problema p ON m.problema = p.id";
$consulta_manutencao = mysqli_query($conexao2,$query);


$query = "SELECT id, unidade, historico, dt_inicio, os FROM tbmobile_manutencao";
$consulta_manutencao_edition = mysqli_query($conexao2,$query);







$query = "SELECT m.id, m.id_prod, st.id as status_id, m.unidade, m.dt_inicio, mob.IMEI, u.sigla, 
st.status, ud.sigla as sigla_destino, ud.ender as ender_destino,
m.dt_encerramento, m.os, m.cabo, m.charger, m.caixa, m.pelicula, m.capa, m.fone, m.chip, m.veicular, 
m.suporte, m.historico  
FROM tbmobile_movimentacao m
INNER JOIN unidade u ON  u.ender = m.unidade 
LEFT JOIN unidade ud ON  ud.ender = m.unidade_destino 
INNER JOIN tbstatus st ON m.status = st.id
INNER JOIN tbmobile mob ON m.id_prod = mob.id
WHERE m.status = '4'";
$consulta_retirada = mysqli_query($conexao2,$query);


$query = "SELECT m.id, m.id_prod, st.id AS status_id, m.unidade, m.dt_inicio, mob.IMEI, u.sigla, st.status, p.descricao AS problema, ud.sigla AS sigla_destino, 
m.dt_encerramento, m.os, m.cabo, m.charger, m.caixa, m.pelicula, m.capa, m.fone, m.chip, m.veicular, m.suporte, m.historico  
FROM tbmobile_movimentacao m
INNER JOIN unidade u ON  u.ender = m.unidade 
LEFT JOIN unidade ud ON  ud.ender = m.unidade_destino 
INNER JOIN tbstatus st ON m.status = st.id
INNER JOIN tbmobile mob ON m.id_prod = mob.id
LEFT JOIN tb_problema p ON p.id = m.problema
WHERE m.status = '5'";
$consulta_devolucao = mysqli_query($conexao2,$query);


$query = "SELECT g.id, g.id_prod, m.IMEI as imei, g.problema as problema_id, p.descricao as problema, u.sigla, g.dt_inicio, g.dt_encerramento, g.os, st.status, g.historico FROM tbmobile_garantia g
INNER JOIN tbstatus st ON g.status = st.id
INNER JOIN tbmobile m ON g.id_prod = m.id
INNER JOIN unidade u ON  u.ender = m.UNIDADE
LEFT JOIN tb_problema p ON g.problema = p.id";
$consulta_garantia = mysqli_query($conexao2,$query);



$query = "SELECT u.ender, m.id, m.unidade, u.sigla, m.IMEI, m.SERIE, m.NUMERO, s.status, m.DATA FROM tbmobile m
INNER JOIN unidade u ON  u.ender = m.UNIDADE
left JOIN tbstatus s ON m.STATUS = s.id";
$consulta_tbmobile_chamados = mysqli_query($conexao2,$query);



 
 
 



$query = "SELECT u.ender, m.id, m.unidade, u.sigla, m.IMEI, m.SERIE, m.NUMERO, s.status, m.DATA,
m.cabo, m.charger, m.caixa, m.pelicula, m.capa, m.fone, m.chip, m.veicular, m.suporte
FROM tbmobile m
LEFT JOIN unidade u ON  u.ender = m.UNIDADE
LEFT JOIN tbstatus s ON m.STATUS = s.id";
$consulta_tbmobile = mysqli_query($conexao2,$query);

$query = "SELECT u.ender, m.id, m.unidade, u.sigla, m.IMEI, m.SERIE, m.NUMERO, s.status, m.DATA
FROM tbmobile m
INNER JOIN unidade u ON  u.ender = m.UNIDADE
left JOIN tbstatus s ON m.STATUS = s.id";
$consulta_tbmobile0 = mysqli_query($conexao2,$query);

$query = "SELECT u.ender, m.id, m.unidade, u.sigla, m.IMEI, m.SERIE, m.NUMERO, s.status, m.DATA,
m.cabo, m.charger, m.caixa, m.pelicula, m.capa, m.fone, m.chip, m.veicular, m.suporte
FROM tbmobile m
INNER JOIN unidade u ON  u.ender = m.UNIDADE
LEFT JOIN tbstatus s ON m.STATUS = s.id";
$consulta_tbmobile1 = mysqli_query($conexao2,$query);

$query = "SELECT u.ender, m.id, m.unidade, u.sigla, m.IMEI, m.SERIE, m.NUMERO, s.status, m.DATA, 
m.cabo, m.charger, m.caixa, m.pelicula, m.capa, m.fone, m.chip, m.veicular, m.suporte
FROM tbmobile m
INNER JOIN unidade u ON  u.ender = m.UNIDADE
LEFT JOIN tbstatus s ON m.STATUS = s.id";
$consulta_tbmobile2 = mysqli_query($conexao2,$query);

$query = "SELECT u.ender, m.id, m.unidade, u.sigla, m.IMEI, m.SERIE, m.NUMERO, s.status, m.DATA, 
m.cabo, m.charger, m.caixa, m.pelicula, m.capa, m.fone, m.chip, m.veicular, m.suporte
FROM tbmobile m
INNER JOIN unidade u ON  u.ender = m.UNIDADE
left JOIN tbstatus s ON m.STATUS = s.id";
$consulta_tbmobile22 = mysqli_query($conexao2,$query);

$query = "SELECT u.ender, m.id, m.unidade, u.sigla, m.IMEI, m.SERIE, m.NUMERO, s.status, m.DATA FROM tbmobile m
INNER JOIN unidade u ON  u.ender = m.UNIDADE
left JOIN tbstatus s ON m.STATUS = s.id";
$consulta_tbmobile3 = mysqli_query($conexao2,$query);







$query = "SELECT id, descricao FROM tb_problema order by descricao asc";
$consulta_problema0 = mysqli_query($conexao2,$query);

$query = "SELECT id, descricao FROM tb_problema order by descricao asc";
$consulta_problema1 = mysqli_query($conexao2,$query);

$query = "SELECT id, descricao FROM tb_problema order by descricao asc";
$consulta_problema2 = mysqli_query($conexao2,$query);
$query = "SELECT id, garantia FROM tbstatus where ativo = '1'";
$consulta_alert2 = mysqli_query($conexao2,$query);

$query = "SELECT id, descricao FROM tb_problema order by descricao asc";
$consulta_problema3 = mysqli_query($conexao2,$query);

$query = "SELECT id, descricao FROM tb_problema order by descricao asc";
$consulta_problema4 = mysqli_query($conexao2,$query);

$query = "SELECT id, descricao FROM tb_problema order by descricao asc";
$consulta_problema5 = mysqli_query($conexao2,$query);







$query = "SELECT ordem_servico FROM tbmobile_os ORDER BY id DESC LIMIT 1";
$consulta_osi = mysqli_query($conexao2,$query);

$query = "SELECT ordem_servico FROM tbmobile_os ORDER BY id DESC LIMIT 1";
$consulta_osi0 = mysqli_query($conexao2,$query);

$query = "SELECT ordem_servico FROM tbmobile_os ORDER BY id DESC LIMIT 1";
$consulta_osi1 = mysqli_query($conexao2,$query);

$query = "SELECT ordem_servico FROM tbmobile_os ORDER BY id DESC LIMIT 1";
$consulta_osi2 = mysqli_query($conexao2,$query);

$query = "SELECT ordem_servico FROM tbmobile_os ORDER BY id DESC LIMIT 1";
$consulta_osi3 = mysqli_query($conexao2,$query);






$query = "SELECT ender, sigla FROM unidade";
$consulta_sigla = mysqli_query($conexao2,$query);


$query = "SELECT ender, sigla FROM unidade";
$consulta_sigla0 = mysqli_query($conexao2,$query);

$query = "SELECT id, status FROM tbstatus";
$consulta_status = mysqli_query($conexao2,$query);









$query = "SELECT m.id, m.id_prod, u.sigla, u.ender as ender_unidade, m.dt_inicio, m.os, tb.IMEI as imei, st.id as status_id, st.status as status,  m.historico, p.descricao as problema, p.id as problema_id FROM tbmobile_manutencao m
LEFT JOIN unidade u ON  u.ender = m.unidade
LEFT JOIN tbstatus st ON m.status = st.id
LEFT JOIN tb_problema p ON m.problema = p.id
LEFT JOIN tbmobile tb ON tb.id = m.id_prod
WHERE dt_encerramento is null";
$consulta_manutencao_abertos = mysqli_query($conexao2,$query);


$query = "SELECT g.id, g.id_prod, u.sigla, u.ender AS ender_unidade, g.dt_inicio, g.os, tb.IMEI AS imei, st.id AS status_id, st.status AS STATUS, g.alert AS alert_id, sta.garantia AS garantia,  g.historico, p.descricao AS problema, p.id AS problema_id  FROM tbmobile_garantia g
LEFT JOIN unidade u ON  u.ender = g.unidade
LEFT JOIN tbstatus st ON g.status = st.id
LEFT JOIN tbstatus sta ON g.alert = sta.id
LEFT JOIN tb_problema p ON g.problema = p.id
LEFT JOIN tbmobile tb ON tb.id = g.id_prod
WHERE dt_encerramento IS NULL";
$consulta_garantia_abertos = mysqli_query($conexao2,$query);


$query = "SELECT m.id, mob.IMEI as imei, st.status as status, p.descricao as problema, p.id as problema_id,
m.id_prod, u.ender as ender_unidade, ud.ender as ender_destino, st.id as status_id, m.historico,
m.unidade, m.dt_inicio, mob.IMEI, u.sigla, st.status, ud.sigla as sigla_destino, m.dt_encerramento, m.os, 
m.cabo, m.charger, m.caixa, m.pelicula, m.capa, m.fone, m.chip, m.veicular, m.suporte, m.historico  FROM tbmobile_movimentacao m
INNER JOIN unidade u ON  u.ender = m.unidade 
LEFT JOIN unidade ud ON  ud.ender = m.unidade_destino 
INNER JOIN tbstatus st ON m.status = st.id
INNER JOIN tbmobile mob ON m.id_prod = mob.id
LEFT JOIN tb_problema p ON m.problema = p.id
WHERE m.status = '4' and dt_encerramento is null";
$consulta_retirada_abertos = mysqli_query($conexao2,$query);


$query = "SELECT m.id, mob.IMEI as imei, st.status as status, p.descricao as problema, p.id as problema_id,
m.id_prod, st.id as status_id, m.historico,
m.unidade, m.dt_inicio, mob.IMEI, st.status, m.dt_encerramento, m.os, 
u.ender as ender_unidade, u.sigla, ud.ender as ender_destino, ud.sigla as sigla_destino, 
m.cabo, m.charger, m.caixa, m.pelicula, m.capa, m.fone, m.chip, m.veicular, m.suporte, m.historico  FROM tbmobile_movimentacao m
INNER JOIN unidade u ON  u.ender = m.unidade 
LEFT JOIN unidade ud ON  ud.ender = m.unidade_destino 
INNER JOIN tbstatus st ON m.status = st.id
INNER JOIN tbmobile mob ON m.id_prod = mob.id
LEFT JOIN tb_problema p ON m.problema = p.id
WHERE m.status = '5' and dt_encerramento is null";
$consulta_devolucao_abertos = mysqli_query($conexao2,$query);












$query = " SELECT t.id, t.imei, u.sigla, s.status, o.ordem_servico, p.descricao, o.dt_os FROM tbmobile t
INNER JOIN unidade u ON t.unidade = u.ender
INNER JOIN tbstatus s ON s.id = t.status
INNER JOIN tbmobile_os o ON o.id_prod = t.id
INNER JOIN tb_problema p ON p.id = o.ocorrencia
WHERE t.status = '5'";
$consulta_mov = mysqli_query($conexao2,$query);




















//STATISTICS
/*

$query = "SELECT COUNT(*) AS Não_Liga FROM tbmobile_manutencao WHERE problema = 1";
$consulta_1 = mysqli_query($conexao2,$query);

$query = "SELECT COUNT(*) AS Tela_Nao_reproduz_imagem FROM tbmobile_manutencao WHERE problema = 2;
$consulta_2 = mysqli_query($conexao2,$query)";

$query = "SELECT COUNT(*) AS Bateria_Nao_Carrega FROM tbmobile_manutencao WHERE problema = 3;
$consulta_3 = mysqli_query($conexao2,$query)";

$query = "SELECT COUNT(*) AS Pelicula_Trincada FROM tbmobile_manutencao WHERE problema = 4;
$consulta_4= mysqli_query($conexao2,$query)";

$query = "SELECT COUNT(*) AS Desligando_Sozinho FROM tbmobile_manutencao WHERE problema = 5;
$consulta_5 = mysqli_query($conexao2,$query)";

$query = "SELECT COUNT(*) AS Sem_Novidade FROM tbmobile_manutencao WHERE problema = 6;
$consulta_6 mysqli_query($conexao2,$query)";

$query = "SELECT COUNT(*) AS Sem_Sinal FROM tbmobile_manutencao WHERE problema = 7;
$consulta_7 = mysqli_query($conexao2,$query)";

$query = "SELECT COUNT(*) AS Substituicao FROM tbmobile_manutencao WHERE problema = 8;
$consulta_8 = mysqli_query($conexao2,$query)";

$query = "SELECT COUNT(*) AS Em_Andamento FROM tbmobile_manutencao WHERE problema = 9;
$consulta_9 = mysqli_query($conexao2,$query)";

$query = "SELECT COUNT(*) AS Capa_Danificada FROM tbmobile_manutencao WHERE problema = 10;
$consulta_10 = mysqli_query($conexao2,$query)";

$query = "SELECT COUNT(*) AS Display_Danificado FROM tbmobile_manutencao WHERE problema = 11;
$consulta_11 = mysqli_query($conexao2,$query)";
;
$query = "SELECT COUNT(*) AS Atualizacao FROM tbmobile_manutencao WHERE problema = 12;
$consulta_12 = mysqli_query($conexao2,$query)";

$query = "SELECT COUNT(*) AS Extraviado FROM tbmobile_manutencao WHERE problema = 13;
$consulta_13 = mysqli_query($conexao2,$query)";

$query = "SELECT COUNT(*) AS Tela_Trincada FROM tbmobile_manutencao WHERE problema = 14;
$consulta_14 = mysqli_query($conexao2,$query)";

$query = "SELECT COUNT(*) AS Caixa_trocada FROM tbmobile_manutencao WHERE problema = 15;
$consulta_15 = mysqli_query($conexao2,$query)"; */