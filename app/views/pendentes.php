
<div class="sidebar">
  <button><a href="index.php"  style="font-size: 18px"><i class="fa fa-fw fa-home"></i> Home </a></button><br><br>
  <button class="pendentetab" onclick="openTab(event, 'manutencao')" id="defaultOpen"><a href="#manutencao"  style="font-size: 18px"><i class="fa fa-fw fa-home"></i> Manutenções </a></button>
  <button class="pendentetab" onclick="openTab(event, 'retirada')"><a href="#retirada"  style="font-size: 18px"><i class="fa fa-fw fa-home"></i> Retiradas </a></button>
  <button class="pendentetab" onclick="openTab(event, 'devolucao')"><a href="#devolucao"  style="font-size: 18px"><i class="fa fa-fw fa-home"></i> Devoluções </a></button>
  <button class="pendentetab" onclick="openTab(event, 'garantia')"><a href="#garantia"  style="font-size: 18px"><i class="fa fa-fw fa-home"></i> Garantias </a></button>
</div>
<br>





<br><br>
<!-- MANUTENÇÃO <<< 2 >>>-->   
<div class="main"> 

<?php 
include 'app/pendente/manutencao_pendente.php';

include 'app/pendente/retirada_pendente.php';

include 'app/pendente/devolucao_pendente.php';

include 'app/pendente/garantia_pendente.php';
?>
 


  

<script> //CONFIGURAÇÃO DA SELEÇÃO DO MENU LATERAL PAGINA HOME
  function openTab(evt, cityName) {
      var i, tabcontent, pendentetab;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
        }
        pendentetab = document.getElementsByClassName("pendentetab");
        for (i = 0; i < pendentetab.length; i++) {
        pendentetab[i].className = pendentetab[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }            
    document.getElementById("defaultOpen").click();
</script> 


             