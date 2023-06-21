<div class="sidebar">
  <button class="tablinks" onclick="openCity(event, 'inicio')" id="defaultOpen"><a href="#inicio"  style="font-size: 18px"><i class="fa fa-fw fa-home"></i> Home </a></button>
  <button class="tablinks" onclick="openCity(event, 'chamados')"><a href="#chamados"  style="font-size: 18px"><i class="fa fa-fw fa-wrench"></i> Novo Chamado</a></button>
  <button><a href="?pagina=eventos" style="font-size: 18px"><i class="bi bi-pie-chart"></i> Eventos</a></button> 
  <button><a href="?pagina=pendentes"  style="font-size: 18px"><i class="bi bi-pie-chart"></i> Pendentes</a></button>
  <button><a href="app/views/estatisticas.php"  style="font-size: 18px"><i class="bi bi-pie-chart"></i> Estatisticas</a></button>
  <button><a href="app/views/relatorio.php"  style="font-size: 18px"><i class="bi bi-pie-chart"></i> Relatório </a></button>
</div>



























<script> //CONFIGURAÇÃO DA SELEÇÃO DO MENU LATERAL PAGINA HOME
  function openCity(evt, cityName) {
      var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }            
    document.getElementById("defaultOpen").click();
</script> 