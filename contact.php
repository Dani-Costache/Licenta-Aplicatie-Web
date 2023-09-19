<?php
require_once 'auth.php';

if (!isLoggedIn()) {
    header("Location: login.php");
    exit(); 
}

$successMessage = "";
$errorMessage = "";

if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "imobiliare";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexiunea la baza de date a eșuat: " . $conn->connect_error);
    }

    $sql = "INSERT INTO contact (user_id, name, email, phone, message) VALUES (?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    
    $stmt->bind_param("issss", getUserId(), $name, $email, $phone, $message);
    
    if ($stmt->execute()) {

        $successMessage = "Mesajul a fost trimis cu succes.";
        $_POST['submit'] = null;

        
        header("Location: contact.php");
        exit();
    } else {

        $errorMessage = "Eroare la trimiterea mesajului.";
    }

    $stmt->close();
    $conn->close();
}

function getUserId() {
    return $_SESSION['user_id']; 
}


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - Diamond Residence Resort</title>
    <link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>

<nav class="navbar">
    <a class="navbar-brand" href="index.php"><img src="images/diamond.png" alt="Logo"></a>
    <ul class="nav-links">
        <li><a href="index.php">Acasă</a></li>
        <li><a href="facilities.php">Facilități</a></li>
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
    
<section class="contact">
            <div class="contact-container">
                <h2>Contactează-ne</h2>
                <div class="contact-form">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">

                        <div class="form-group">
                            <label for="name">Nume:</label>
                            <input type="text" id="name" name="name" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" required>
                        </div>

                        <div class="form-group">
                            <label for="phone">Telefon:</label>
                            <input type="phone" id="phone" name="phone" required>
                        </div>

                        <div class="form-group">
                            <label for="message">Mesaj:</label>
                            <textarea id="message" name="message" required></textarea>
                        </div>

                        <div class="form-group">
                            <input type="submit" name="submit" value="Trimite">
                        </div>
                    </form>
                </div>
                <div class="contact-info">
                    <h3>Informații de contact:</h3>
                    <p>Pentru orice întrebări suplimentare, ne puteți contacta la numărul de telefon: <strong>+40 700 000 000</strong> sau pe adresa de email: <strong>Diamond.residence@yahoo.com</strong>.</p>
                    <p>Vă așteptăm și la sediul nostru situat în Prahova, Ploiești, Str. Diamantului, Nr. 22.</p>
                </div>
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
<script>
    window.onload = function() {
        var successBox = document.getElementById("success-box");
        var errorBox = document.getElementById("error-box");

        <?php if ($successMessage !== ""): ?>
            successBox.innerHTML = "<?php echo $successMessage; ?>";
            successBox.style.display = "block";
            setTimeout(function() {
                successBox.style.display = "none";
            }, 5000);
        <?php endif; ?>

        <?php if ($errorMessage !== ""): ?>
            errorBox.innerHTML = "<?php echo $errorMessage; ?>";
            errorBox.style.display = "block";
            setTimeout(function() {
                errorBox.style.display = "none";
            }, 5000);
        <?php endif; ?>
    };
</script>
<script src="icon.js"></script>
</body>
</html>
