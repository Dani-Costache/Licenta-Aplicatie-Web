<?php include 'auth.php'; ?>
<!DOCTYPE html>
<html>
<head>

<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Despre Noi - Diamond Residence Resort</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <script src="map.js"></script>
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
<main>
  <div class="about-container">
    <section class="about">
      <h1>Despre Noi</h1>
      <p>Diamond Residence Resort este primul nostru proiect rezidențial ce poartă semnătura Diamond Residence Resort, aflat la doar 5km de orasul <strong>Ploiesti</strong>.</p>

      <p>În jurul tău lucrurile se întâmplă rapid, totul este interactiv și inteligent. Te afli mereu în mișcare, iar timpul tău reprezintă suma momentelor pe care le dăruiești celor dragi ție, țelurilor și pasiunilor tale.</p>

      <p>Diamond Residence Resort este un concept rezidențial urban dedicat omului modern, care iubește orașul și îl folosește ca pe un teren de joacă, investește timp în lucrurile ce contează și nu îl pierde încercând să ajungă la ele.</p>

      <p>Diamond Residence Resort vine în întâmpinarea tuturor cu <strong>210 de locuinte</strong> cu design modern, confortabile și liniștite, ce reușesc să ofere relaxarea mult dorită la finalul zilelor obositoare. Acestea sunt construite cu materiale premium, finisaje de calitate superioară și sunt oferite cu un preț de achiziție competitiv.</p>

      <ul>În oferta noastră se găsesc:
        <li>case cu suprafete de circa 150-280 mp, potrivite pentru familiile tinere, care isi doresc mai mult spatiu.</li>
        <li>studiouri cu suprafața de circa 41-47 mp, perfecte pentru persoanele ce își doresc un spațiu propriu, pe care să-l amenajeze după bunul plac.</li>
        <li>apartamente spațioase de 2 și 3 camere, potrivite pentru familiile tinere, care se află în căutarea unui loc care să ofere liniște și bună dispoziție.</li>
      </ul>

      <p>Locuințele oferă multă lumină naturală și acces facil la autobuz, la centrule noastre cat si  la numeroase spații verzi și locuri de recreere.</p>

      <div class="bar">
        <div class="bar-item">
          <span id="nr-case">50</span>
          <span>Case</span>
        </div>
        <div class="bar-item">
          <span id="nr-apartamente">160</span>
          <span>Apartamente</span>
        </div>
        <div class="bar-item">
          <span id="mp-constructii">23000 mp2</span>
          <span>mp construiți</span>
        </div>
        <div class="bar-item">
          <span id="nr-parcari">350+</span>
          <span>Parcări</span>
        </div>
        <div class="bar-item">
          <span id="mp-verzi">5000 mp2</span>
          <span>mp verzi</span>
        </div>
      </div>
    </section>
    <div class="location-video-container">
      <div class="video-container">
        <video src="video/video1.mp4" controls></video>
      </div>
      <div class="location">
        <div class="map-container">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d4000.7128446712713!2d25.87619217753668!3d44.84333957965121!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sro!2sro!4v1680974186373!5m2!1sro!2sro" width="600" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </div>
    </div>
  </div>
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

<script src="icon.js"></script>
</body>
</html>
