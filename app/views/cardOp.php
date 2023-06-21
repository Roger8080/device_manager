<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<style>

#piechart5 {
        -webkit-box-shadow: 6px 4px 18px -3px rgba(0,0,0,0.44);
        -moz-box-shadow: 6px 4px 18px -3px rgba(0,0,0,0.44);
         box-shadow: 6px 4px 18px -3px rgba(0,0,0,0.44);
}

</style>






<div>
   <button type="button" class="dashlink btn btn-outline-secondary" onclick="dashScript(event, 'visao')" id="defaultCop">VISÃO GERAL</button>
   <button type="button" class="dashlink btn btn-outline-secondary" onclick="dashScript(event, 'copn')">RETIRADAS</button>
   <button type="button" class="dashlink btn btn-outline-secondary" onclick="dashScript(event, 'cops')">DEVOLUÇÕES</button>
   <button type="button" class="dashlink btn btn-outline-secondary" onclick="dashScript(event, 'copo')">MANUTENÇÕES</button>
   <button type="button" class="dashlink btn btn-outline-secondary" onclick="dashScript(event, 'copl')">GARANTIAS</button>
</div>
<br>




<body>

<div id="visao" class="tabcontent_dash">

    <div class="row" style="background-color: #f9f9f9">          
       <div  id="piechart5" class="col-md-3 ">1        
       <?php require 'app/dash/rosca_movimentacao_mes.php'; ?>  
            </div>        


            <div id="piechart5" class="row col-md-5 justify-content-center" style="margin-left: 1em">2               
              <?php require 'app/dash/movimentacao_anual.php'; ?> 
            </div>  


          <div id="piechart5" class="col-md-3" style="margin-left:2em; text-align:center">3 
         
            <?php include 'app/dash/descricao_movimentacao.php' ?>;
          
            <!-- Carousel>
            <div id="demo" class="carousel slide" data-bs-ride="carousel">   


                      The slideshow/carousel>        
                      <div class="carousel-item">   teste  
                                 
                      </div>

                      <div class="carousel-item">    lol                                                       
                      </div>   
                      
                      <div class="carousel-item">    lol2                                                      
                      </div>   

                      <div class="carousel-item active">5                                     
                      </div>

            </div-->   
  

        </div>                                     
    </div>
  <br>
       


     <div class="row" style="background-color: #f9f9f9">   

          <div  id="piechart5" class="col-md-3"> 4             
            <?php include 'app/dash/rosca_movimentacao_anual.php'; ?>   
              </div>   

          <div id="piechart5" class="row col-md-5 justify-content-center" style="margin-left:1em;">                                                 
             <div class="container" style="margin-top: 2em; margin-right: 1.5em">
              <?php require 'app/dash/calendar_edicao.php'; ?>   
                </div>
              </div>

          <div id="piechart5" class="col-md-3" style="margin-left:2em; text-align:center">                              
          
          </div>
    </div>




          <br>

     <div class="row" style="background-color: #f3f3f3">             
            <div  id="piechart5" class="col-md-3 justify-content-left">  teste </div>        
            <div id="piechart5" class="col-md-5" style="margin-left: 1em"> teste </div>  
            <div id="piechart5" class="col-md-3 justify-content-center" style="margin-left: 1em"> teste </div>                                            
     </div>           
</div>  
      





<div id="copn" class="tabcontent_dash">
     <div class="row" style="background-color: #f3f3f3">             
            <div  id="piechart5" class="col-md-3 justify-content-left"> teste </div>        
            <div id="piechart5" class="col-md-5" style="margin-left: 1em"> teste </div>  
            <div id="piechart5" class="col-md-3 justify-content-center" style="margin-left: 1em"> teste </div>                                            
     </div>      
</div>    




      
        <div class="row"> 
          <marquee>
            <h3> 
                                
            </h3>
          </marquee>           
        </div>     







 <script>
  
function dashScript(evt, cityName) {
  var i, tabcontent_dash, dashlink;
  tabcontent_dash = document.getElementsByClassName("tabcontent_dash");
  for (i = 0; i < tabcontent_dash.length; i++) {
    tabcontent_dash[i].style.display = "none";
  }
  dashlink = document.getElementsByClassName("dashlink");
  for (i = 0; i < dashlink.length; i++) {
    dashlink[i].className = dashlink[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
  document.getElementById("defaultCop").click();

</script>


