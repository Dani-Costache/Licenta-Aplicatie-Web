<?php include 'auth.php'; ?>
<!DOCTYPE html>
<html>
<head>

<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" type="text/css" href="style.css">
  <title>Apartamente Studio - Diamond Residence Resort</title>

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

  <section id="propertys">
    <div class="property-selector">
      <div class="property-type">
        <button class="active" data-section="studio">Studio</button>
        <button data-section="2-room">2 Camere</button>
        <button data-section="3-room">3 Camere</button>
        <div class="underline"></div>
      </div>
    </div>

    <div class="property-list">
      <div class="property-item" data-type="1-room" data-features="Tip 1">
        <img src="images/studio/studio1" alt="Apartament cu 1 camera">
        <h4>Studio Tip 1</h4>
        <div class="property-description">
          <p>Apartamentele cu o cameră sunt ideale atât pentru persoanele singure (indiferent de vârsta pe care o au) cât și pentru cuplurile mereu în formă, moderne, deseori în călătorii, dar care mereu își doresc să se întoarcă în intimitatea căminului propriu! Spațiul garsonierei este bine compartimentat, spațios și totodată ergonomic.</p>
               <ul>
                   <li><strong>Proiect:</strong> Diamond</li>
                   <li><strong>Poziționare:</strong> Etaj 1</li>
                   <li><strong>Orientare:</strong> Est</li>
                   <li><strong>Suprafață:</strong> 41,7 mp utili + Terasă 4 mp</li>
                   <li><strong>Preț:</strong> de la 64.000 Euro(TVA inclus)</li>
                   <li><strong>Parcare supraterană:</strong> 2.500 Euro(TVA inclus)</li>
                   <li><strong>Parcare subterană:</strong> 5.000 Euro(TVA inclus)</li>
                   <li><strong>Boxă depozitare:</strong> Inclusă în preț</li>
               </ul>
               <a class="availability-button" href="studio-disponibility.php">Vezi disponibilitatea</a>
        </div>
      </div>
      <div class="property-item" data-type="1-room" data-features="Tip 2">
        <img src="images/studio/studio2" alt="Apartament cu 1 camera">
        <h4>Studio Tip 2</h4>
        <div class="property-description">
          <p>Apartamentele cu o cameră sunt ideale atât pentru persoanele singure (indiferent de vârsta pe care o au) cât și pentru cuplurile mereu în formă, moderne, deseori în călătorii, dar care mereu își doresc să se întoarcă în intimitatea căminului propriu! Spațiul garsonierei este bine compartimentat, spațios și totodată ergonomic.</p>
               <ul>
                   <li><strong>Proiect:</strong> Diamond</li>
                   <li><strong>Poziționare:</strong> Etaj 1-3</li>
                   <li><strong>Orientare:</strong> Est</li>
                   <li><strong>Suprafață:</strong> 41,7 mp utili + Terasă 9,2 mp</li>
                   <li><strong>Preț:</strong> de la 66.000 Euro(TVA inclus)</li>
                   <li><strong>Parcare supraterană:</strong> 2.500 Euro(TVA inclus)</li>
                   <li><strong>Parcare subterană:</strong> 5.000 Euro(TVA inclus)</li>
                   <li><strong>Boxă depozitare:</strong> Inclusă în preț</li>
               </ul>
               <a class="availability-button" href="studio-disponibility.php">Vezi disponibilitatea</a>
        </div>
      </div>
      <div class="property-item" data-type="1-room" data-features="Tip 3">
        <img src="images/studio/studio3" alt="Apartament cu 1 camera">
        <h4>Studio Tip 3</h4>
        <div class="property-description">
          <p>Cu o suprafață utilă de 46,65 mp și o terasă de 7,21 mp, apartamentele tip studio oferă un spațiu bine gândit pentru tinerii care sunt la început de drum sau celor care doresc o suprafață mai restrânsă cu o compartimentare eficientă open-space.</p>
               <ul>
                   <li><strong>Proiect:</strong> Diamond</li>
                   <li><strong>Poziționare:</strong> Etaj 1-8</li>
                   <li><strong>Orientare:</strong>Est</li>
                   <li><strong>Suprafață:</strong> 46,7 mp utili + Terasă 7,2 mp</li>
                   <li><strong>Preț:</strong> de la 76.000 Euro(TVA inclus)</li>
                   <li><strong>Parcare supraterană:</strong> 2.500 Euro(TVA inclus)</li>
                   <li><strong>Parcare subterană:</strong> 5.000 Euro(TVA inclus)</li>
                   <li><strong>Boxă depozitare:</strong> Inclusă în preț</li>
               </ul>
               <a class="availability-button" href="studio-disponibility.php">Vezi disponibilitatea</a>
        </div>
      </div>
    </div>
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
      var apartmentItems = document.querySelectorAll('.property-item');

      function showDescription(apartmentItem) {
        var isActive = apartmentItem.classList.contains('active');
        var activeApartmentItem = document.querySelector('.property-item.active');
        if (activeApartmentItem) {
          activeApartmentItem.classList.remove('active');
        }

        if (!isActive) {
          apartmentItem.classList.add('active');
        }
      }

      apartmentItems.forEach(function(apartmentItem) {
        apartmentItem.addEventListener('click', function() {
          showDescription(this);
        });
      });
    });
  </script>

  <script>
    window.addEventListener('DOMContentLoaded', function() {
      var buttons = document.querySelectorAll('.property-type button');
      var underline = document.querySelector('.underline');
      var currentIndex = 0;

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
        
        // Salveaza informatiile despre butonul activ in localStorage
        localStorage.setItem('activeButton', targetSection);

        window.location.href = targetPage;
      }

      buttons.forEach(function(button) {
        button.addEventListener('click', function() {
          switchApartment(this);
        });
      });

      // Verifica daca exista un buton activ salvat in localStorage
      var activeButton = localStorage.getItem('activeButton');
      if (activeButton) {
        var targetButton = document.querySelector('[data-section="' + activeButton + '"]');
        if (targetButton) {
          setActiveButton(targetButton);
          updateUnderlinePosition(targetButton);
        }
      }
    });
  </script>

<script src="icon.js"></script>
</body>
</html>