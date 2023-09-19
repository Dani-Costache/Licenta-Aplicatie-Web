<?php include 'auth.php'; ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Facilități - Diamond Residence Resort</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<nav class="navbar">
  <a class="navbar-brand" href="index.php"><img src="images/diamond.png" alt="Logo"> </a>
  <ul class="nav-links">
      <li><a href="index.php">Acasă</a></li>
      <li><a href="facilities.php">Facilități</a>
      <li><a href="about.php">Despre noi</a></li>
      <li><a href="house.php">Case</a></li>
      <li><a href="apartment.php">Apartamente</a></li>
      <li><a href="contact.php">Contact</a></li>
    </ul>
    <div class="auth-buttons">
    <?php if (isLoggedin()): ?>
  <div class="icon-container">
    <div class="icon-item" id="customIcon">
      <a href="inbox.php">
        <script src="https://cdn.lordicon.com/bhenfmcm.js"></script>
        <lord-icon
          src="https://cdn.lordicon.com/psnhyobz.json"
          trigger="hover"
          colors="primary:#107c91"
          style="width:60px;height:50px">
        </lord-icon>
      </a>
    </div>
  </div>
  <div class="icon-container">
    <div class="icon" id="menuIcon">
      <script src="https://cdn.lordicon.com/bhenfmcm.js"></script>
      <lord-icon
        src="https://cdn.lordicon.com/bhfjfgqz.json"
        trigger="hover"
        colors="primary:#107c91"
        style="width:60px;height:50px">
      </lord-icon>
    </div>
    <div class="list-icon-container">
      <div class="icon-item"><a href="logout.php">Delogare</a></div>
    </div>
  </div>
<?php else: ?>
  <div class="icon-container">
    <div class="icon" id="menuIcon">
      <script src="https://cdn.lordicon.com/bhenfmcm.js"></script>
      <lord-icon
        src="https://cdn.lordicon.com/bhfjfgqz.json"
        trigger="hover"
        colors="primary:#107c91"
        style="width:60px;height:50px">
      </lord-icon>
    </div>
    <div class="list-icon-container">
      <div class="icon-item"><a href="register.php">Inregistrare</a></div>
      <div class="icon-item"><a href="login.php">Autentificare</a></div>
    </div>
  </div>
<?php endif; ?>

</div>
</nav>
<main>
  <section class="facilities">
  <h1>Un stil de viață extraordinar doar la Diamond Residence Resort</h1>
			<p>Redefinim stilul cartierului rezidențial și aducem tot ce ai nevoie într-un singur loc,
pentru a te simți nu doar acasa, ci ca într-o vacanța permanentă.</p>
      <div class="facility" data-description=" Pentru zilele călduroase de vară, diamond rezidence resort va pune la dispoziție o piscina exterioara pentru adulți (adâncime de la 1.40m la 2m) și una pentru copii (adâncime de la 0.50 la 1.00m).
            <br>Piscina pentru copii dispune de loc de joacă și zonă de nisip.</br>
            <br>Clienții au asigurat vestiar, 300 de locuri pe sezlonguri și 100 de locuri la terasa.</br>">
				<img src="images/facilities/piscina-exterioara.jpg" alt="Swimming Pool">
				<h3>PISCINA EXTERIOARA</h3>
			</div>
      <div class="facility" data-description="Diamond Rezidence Resort are două bazine acoperite, unul de 25 x 15 metri(adăncime de la 1.40 la 2.00m) și unul mai mic destinat copiilor (adăncime 0.55m-1m).  
            </br>Piscina are întotdeauna temperatura apei constantă, la 29.5 grade bazinul mare și 30 grade bazinul mic, fiind deschisă tot timpul anului.</br> 
            <br>Centrul asigură și cursuri de inot contra cost pentru copii și adulți, cu instructori calificați.</br>">
				<img src="images/facilities/piscina-interioara.jpg" alt="Swimming Pool 2">
				<h3>PISCINA INTERIOARA</h3>
			</div>
			<div class="facility" data-description="Vara, atăt copii căt și parinții se pot bucura de spațiul verde din centrul resortului unde sunt amenajate 2 spații de joaca. 
           <br>Unul este format din topogane, leagăne, spațiu de cățărare, și alte jocuri interactive, iar celălat este amenajat pentru iubitorii de role, skateboard, bmx."></br>
				<img src="images/facilities/joaca.jpg" alt="Play">
				<h3>LOCURII DE JOACA PENTRU COPII</h3>
			</div>
      <div class="facility" data-description="Diamond rezidence resort oferă posibilitatea parinților de a-și înscrie copiii la grădinița privată din cadrul complexului. 
           <br>De asemenea, amplasearea lui facilitează accesul la cele 2  grădinițe de stat care se afla la mai puțin de 5 km de resort.</br>">
				<img src="images/facilities/gradinita.jpg" alt="Children">
				<h3>GRADINITA PENTRU COPII</h3>
			</div>
			<div class="facility" data-description="Diamond rezidence resort vă invită să petreceți o parte din timpul dumnevoastră liber în sala de fitness unde amabilitatea și profesionalismul personalului, calitatea servicilor oferite, precum și prețurile accesibile, fac din acesta o alegere perfectă.
           <br>Sala vă oferă un pachet complet de servicii, intr-un spațiu dotat cu aparatura profesională și aparate cardio profesionale toate extinse pe o suprafață de 300 mp, dotate cu: aer condiționat, vestiare, dușuri și grupuri sanitare, dulapuri cu cheie pentru depozitarea lucrurilor personale pe durata antrenamentului.</br> 
           <br>Clienții beneficiază și de clase de grup precum zumba, aerobic, pilates, cycling."></br>
				<img src="images/facilities/fitness.jpg" alt="Fitness">
				<h3>FITNESS</h3>
			</div>
			<div class="facility" data-description="Centrul spa din cadrul Diamond Residence Resort este deschis pentru oricine este în cautare de relaxare și liniște. 
           <br>Astfel, partenerii noștri ofera următoarele servicii:</br>
           <br>-Masaj balinez</br>
           <br>-Masaj facial</br>
           <br>-Reflexoterapie</br>
           <br>-Masaj cu pietre vulcanice</br>
           <br>-Masaj terapeutic</br>
           <br>-Masaj anticelulitic</br>
           <br>Centrul dispune de asemenea de o saună umedă, una uscata și jacuzzi.</br>">
				<img src="images/facilities/spa.jpg" alt="Spa Center">
				<h3>CENTRU SPA</h3>
			</div>
			<div class="facility" data-description="Pentru a completa facilitățile de care dispune centrul nostru, am reușit amenajarea și deschiderea unui salon de frumusețe.
           <br>Astfel, doamnele și domnișoarele vor beneficia de servicii precum: coafor, manichiură, pedichiură, machiaj și epilare.</br>
           <br>Domnii au asigurat frizerie și stilizare barbă.</br>">
				<img src="images/facilities/beauty-salon.jpg" alt="Beauty">
				<h3>BEAUTY SALON</h3>
			</div>
			<div class="facility" data-description="Diamond rezident resort este poziționat în apropierea unora din cele mai bune restaurante din Ploiești (restaurant Giulia, da vinci, Regina nopții, etc.), astfel încât locuitorii pot beneficia de serviciile lor într-un timp scurt.
          <br>De asemena, resortul nostru deține 2 restaurante de top:</br> 
          <br>-Diamont Restorante: este un restaurant de tip italienesc.</br> 
          <br>-Smarald Restaurant: este un restaurant cu preparate tradiționale.</br>">
				<img src="images/facilities/restaurant.jpg" alt="Restaurant">
				<h3>RESTAURANTE</h3>
			</div>
      <div class="facility" data-description="Pe perioada verii, clienții noștri se pot bucura de accesul la terasa piscinei exterioare. 
         <br>Pentru a asigura liniștea de care este nevoie în incinta complexului, barurile sunt poziționare la distanța de spațiul de locuințe.</br>">
				<img src="images/facilities/Terase-Baruri.jpg" alt="Pubs">
				<h3>TERASE & BARURI</h3>
			</div>
      <div class="facility" data-description="Drumul parcurs pana la oricare din centrele comerciale se poate face și cu autobuzul care are punct de plecare în interiorul complexului nostru.
         <br>Spații comerciale:</br> 
         <br>-Kaufland situat la o distanța de 500 m</br>  
         <br>-epco situat la 500 m</br> 
         <br>-Carrefour situat la un km</br> 
         <br>- Decathlon situat la un km</br>  
         <br>-Ploiesti shopping city situat la 2 km</br>  ">
				<img src="images/facilities/spatii-comerciale2.jpg" alt="Shop Mixt">
				<h3>SPATII COMERCIALE</h3>
			</div>
      <div class="facility" data-description="<br>La parterul fiecărui bloc se găsește unul dintre următoare:</br>
           <br>-Mega image shop&go</br> 
           <br>-Penny</br> 
           <br>-La doi pași</br> 
           <br>-Carrefour express</br>">
				<img src="images/facilities/Spatii-Comerciale.jpg" alt="Shops">
				<h3>MAGAZINE MIXTE</h3>
			</div>
      <div class="facility" data-description="Accesul în complex se face pe baza de cartela, iar masinile vor fi înregistrate într-o baza de date pentu ca bariera sa se ridice automat în cazul clienților noștri. 
           <br>Pentru persoanele străine, agenții noștri de securitate vor cere detalii despre scopul lor în incintă și nu vor permite accesul celor care nu au un motiv de intrare.</br> 
           <br>Locuitorii trebuie să îi informeze dacă aștepta o anumită persoana sau nu.</br>">
				<img src="images/facilities/securitate.jpg" alt="Security">
				<h3>CIRCUIT INCHIS 24/24</h3>
			</div>
  </section>
</main>
<footer>
        <div class="footer-container">
            <div class="footer-content">
                <div class="col-md-4">
                    <h5>Adresă</h5>
                    <p>Prahova, Ploiești, Str. Diamantului, Nr. 22</p>
                </div>
                <div class="col-md-4">
                    <h5>Telefon</h5>
                    <p>+40 700 000 000</p>
                </div>
                <div class="col-md-4">
                    <h5>Email</h5>
                    <p>Diamond.residence@yahoo.com</p>
                </div>
            </div>
            <hr>
            <div class="footer-content">
                <div class="col-md-6">
                    <p>&copy; Diamond Residence Resort. Are toate drepturile rezervate.</p>
                </div>
                <div class="col-md-6">
                    <ul class="list-inline text-md-end">
                        <li class="list-inline-item"><a class="privacy-policy" href="privacy-policy.php">Politică de confidențialitate</a></li>
                        <li class="list-inline-item"><a class="terms-conditions" href="terms-conditions.php">Termeni & Condiții</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
  <div id="modal" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
    <h2 id="facility-title"></h2>
    <p id="facility-description"></p>
  </div>
</div>

<script>
  // Obtine elementele relevante
  const modal = document.getElementById("modal");
  const facilityTitle = document.getElementById("facility-title");
  const facilityDescription = document.getElementById("facility-description");
  const closeBtn = document.getElementsByClassName("close")[0];
  const facilities = document.getElementsByClassName("facility");

  // Adauga un eveniment de clic pentru fiecare facilitate
  for (let i = 0; i < facilities.length; i++) {
    facilities[i].addEventListener("click", function () {
      const title = this.querySelector("h3").innerText;
      const description = this.getAttribute("data-description"); 

      // Actualizeaza titlul si descrierea fereastrei modale
       facilityTitle.innerText = title;
       facilityDescription.innerHTML = description;

      // Afiseaza fereastra modala
      modal.style.display = "block";
    });
  }

  // Adauga un eveniment de clic pentru inchiderea fereastrei modale
  closeBtn.addEventListener("click", function () {
    modal.style.display = "none";
  });

  // Inchide fereastra modala atunci cand se face clic in afara ei
  window.addEventListener("click", function (event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  });
</script>


	<script src="icon.js"></script>
</body>
</html>
