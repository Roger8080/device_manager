<style>

body, html {
  height: 100%;
}

.parallax {
  /* The image used */
  background-image: url('https://pontoon-e.com/wp-content/uploads/2019/04/Guarda-e-patinete-Gidson-di-Souza-SECOM-1920x1080.jpeg');

  /* Full height */
  height: 100%; 

  /* Create the parallax scrolling effect */
  background-attachment: fixed;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}

/* Turn off parallax scrolling for tablets and phones. Increase the pixels if needed */
@media only screen and (max-device-width: 1366px) {
  .parallax {
    background-attachment: scroll;
  }
}

.parallax_two {
  /* The image used */
  background-image: url('https://www.prefeitura.sp.gov.br/cidade/secretarias/upload/logo%20gcm.png');

  /* Full height */
  height: 100%; 

  /* Create the parallax scrolling effect */
  background-attachment: fixed;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}

/* Turn off parallax scrolling for tablets and phones. Increase the pixels if needed */
@media only screen and (max-device-width: 1366px) {
  .parallax {
    background-attachment: scroll;
  }
}

.parallax_three {
  /* The image used */
  background-image: url('https://caching.alfaconcursos.com.br/alfacon-production/images/images/000/003/692/original/Youtube-curso-Guarda-Civil-Municipal-Esta%CC%82ncia-Turi%CC%81stica-Embu-Artes-SP.jpg?1552302878');

  /* Full height */
  height: 100%; 

  /* Create the parallax scrolling effect */
  background-attachment: fixed;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}

/* Turn off parallax scrolling for tablets and phones. Increase the pixels if needed */
@media only screen and (max-device-width: 1366px) {
  .parallax {
    background-attachment: scroll;
  }
}
</style>






<body>

<p>In this example we have turned off parallax scrolling for mobile devices. It works as expected on all desktop screens sizes.</p>
<p>Scroll Up and Down this page to see the parallax scrolling effect.</p>

<div class="parallax"></div>
<div style="height:1000px;background-color:red;font-size:36px">
This div is just here to enable scrolling.
Tip: Try to remove the background-attachment property to remove the scrolling effect.
</div>



<div class="parallax_two"></div>
<div style="height:1000px;background-color:red;font-size:36px">
This div is just here to enable scrolling.
Tip: Try to remove the background-attachment property to remove the scrolling effect.
</div>


<div class="parallax_three"></div>
<div style="height:1000px;background-color:gray;font-size:36px">
test RDP ls felix.<br>
Tip: Try to remove the background-attachment property to remove the scrolling effect.
</div>


</body>
</html>
