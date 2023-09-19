<?php include 'auth.php'; ?>
<!DOCTYPE html>
<html>
<head>

<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" type="text/css" href="style.css">
  <title>Apartamente - Diamond Residence Resort</title>

</head>
<body>
  <nav class="navbar">
  <a class="navbar-brand" href="index.php"><img src="images/Diamond.png" alt="Logo"></a>
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

  <section id="property">
    <div class="property-selector">
      <div class="property-type">
        <button class="active" data-section="studio">Studio</button>
        <button data-section="2-room">2 Camere</button>
        <button data-section="3-room">3 Camere</button>
        <div class="underline"></div>
      </div>
    </div>


				<div class="property-obs">
							<p>Apartamentele Diamond Residence Resort combină spații generoase, menite să ofere libertate de acțiune și confort, decoruri funcționale cu o soluție completă de finisaje, totul pentru un stil de viață modern și minimalist. Lumina naturală străbate prin ferestrele mari, oferind locatarilor confort și o oază de liniște.</p>
<p>Fiecare apartament dispune de centrală proprie și finisaje premium. Diamond Residence Resort se află în apropierea orasului Ploiesti. În zonă există numeroase spații verzi, iar accesul se face rapid către zonele comerciale din proximitate.</p>
<p>Diamond Residence Resort reprezintă soluția pentru cei care își doresc un loc pe care să-l numească acasă. Ansamblul vine în întâmpinarea clienților cu 200 de apartamente în Ploiesti, realizate cu cele mai bune materiale, care oferă intimitatea dorită. Reprezintă varianta perfectă pentru familiile tinere, aflate la început de drum, care vor o compartimentare bună, un preț optim și o zonă ferită de agitația Ploiestiului.</p>
<p><br>Astfel, dacă te afli în căutarea primului apartament sau a unui loc care sa îți ofere confortul și relaxarea de care ai nevoie, venim în ajutorul tău cu o selecție largă de apartamente de vânzare.</br> 
<br>Poți alege între:</br></p>

  <ul>
 	   <li>Studio.</li>
 	   <li>Apartament 2 camere.</li>
 	   <li>Apartamente 3 camere.</li>
  </ul>
  <h2>Te așteptăm să devii unul din proprietarii Diamond Residence Resort!</h2>					
	</div>

  <section class="gallery-container">
      <div class="gallery-navigation">
        <button id="prev-button">&lt;</button>
        <button id="next-button">&gt;</button>
      </div>
    
          <img src="images/apartamente/bloc1" alt="Image 1" class="gallery-image">
          <img src="images/apartamente/bloc2" alt="Image 2" class="gallery-image">
          <img src="images/apartamente/int1" alt="Image 3" class="gallery-image">
          <img src="images/apartamente/int2" alt="Image 4" class="gallery-image">
          <img src="images/apartamente/int3" alt="Image 5" class="gallery-image">
          <img src="images/apartamente/int4" alt="Image 6" class="gallery-image">
      
</div>
</section>
  </section>
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

  <script>
window.addEventListener('DOMContentLoaded', function() {
  var buttons = document.querySelectorAll('.property-type button');
  var underline = document.querySelector('.underline');
  var galleryImages = document.querySelectorAll('.gallery-container img');
  var currentIndex = 0;
  var timer;

  function setActiveButton(button) {
    var currentActive = document.querySelector('.property-type button.active');
    if (currentActive) {
      currentActive.classList.remove('active');
    }
    button.classList.add('active');
  }

  function updateUnderlinePosition(button) {
    var leftOffset = button.offsetLeft;
    var width = button.offsetWidth;
    underline.style.left = leftOffset + 'px';
    underline.style.width = width + 'px';
  }

  function switchApartment(button) {
    setActiveButton(button);
    updateUnderlinePosition(button);
    var targetSection = button.getAttribute('data-section');
    var targetPage = targetSection + '.php';

    // Salvam informatiile despre butonul activ
    localStorage.setItem('activeButton', targetSection);

    window.location.href = targetPage;
  }

  function showImage(index) {
    for (var i = 0; i < galleryImages.length; i++) {
      galleryImages[i].style.display = 'none';
    }
    galleryImages[index].style.display = 'block';
    currentIndex = index;
  }

  function nextImage() {
    currentIndex = (currentIndex + 1) % galleryImages.length;
    showImage(currentIndex);
  }

  function startTimer() {
    stopTimer();
    timer = setInterval(nextImage, 2000);
  }

  function stopTimer() {
    clearInterval(timer);
  }

  buttons.forEach(function(button) {
    button.addEventListener('click', function() {
      switchApartment(this);
    });
  });

  var prevButton = document.getElementById('prev-button');
  var nextButton = document.getElementById('next-button');

  prevButton.addEventListener('click', function() {
    currentIndex = (currentIndex - 1 + galleryImages.length) % galleryImages.length;
    showImage(currentIndex);
    stopTimer();
    startTimer();
  });

  nextButton.addEventListener('click', function() {
    currentIndex = (currentIndex + 1) % galleryImages.length;
    showImage(currentIndex);
    stopTimer();
    startTimer();
  });

  // Verificam daca exista un buton activ salvat in localStorage
  var activeButton = localStorage.getItem('activeButton');
  if (activeButton) {
    var targetButton = document.querySelector('[data-section="' + activeButton + '"]');
    if (targetButton) {
      setActiveButton(targetButton);
      updateUnderlinePosition(targetButton);
    }
  }

  showImage(currentIndex);
  startTimer();
});


  </script>

<script src="icon.js"></script>
</body>
</html>