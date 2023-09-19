<html>
<head>

<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" type="text/css" href="style.css">
  <title>Autentificare - Diamond Residence Resort</title>
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

</div>
  </nav>


  <div class="login-container">
  <form method="post" action="login.php">
  <?php if (isset($error_message) && !empty($error_message)): ?>
    <div class="error-message"><?php echo $error_message; ?></div>
  <?php endif; ?>
  <label for="username">Nume</label>
  <input type="text" name="username" required placeholder="Nume de utilizator"><br><br>
  <label for="password">Parolă</label>
  <input type="password" name="password" required placeholder="Parolă"><br><br>
  <input type="submit" name="submit" value="Autentificare">
</form>
  
  <p>Încă nu aveți cont? <a href="register.php">Click aici</a> pentru înregistrare.</p>
</div>

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

<?php
session_start();

if (isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}

$error_message = '';

// Verifia formularul de autentificare
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtine datele din formular
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (verificaCredentiale($username, $password)) {
        // Autentificare cu succes
        $_SESSION['user_id'] = getUserId($username);
        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = $username;
        header('Location: index.php');
        exit;
    } else {

        $error_message = "Nume de utilizator sau parolă incorecte.";
    }
}

// Verifica credetinale in bd
function verificaCredentiale($username, $password) {
    // Configureaza conexiunea la baza de date
    $servername = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "imobiliare";

    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
    if ($conn->connect_error) {
        die("Conexiunea la baza de date a eșuat: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
     
            $stmt->close();
            $conn->close();
            return true;
        }
    }

    $stmt->close();
    $conn->close();
    return false;
}

// Funcția pentru obținerea ID-ului 
function getUserId($username) {

    $servername = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "imobiliare";

    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
    if ($conn->connect_error) {
        die("Conexiunea la baza de date a eșuat: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("SELECT ID FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $user_id = $row['ID'];
        $stmt->close();
        $conn->close();
        return $user_id;
    }
// Utilizator inex
    $stmt->close();
    $conn->close();
    return null;
}
?>