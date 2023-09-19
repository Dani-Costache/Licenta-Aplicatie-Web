<!DOCTYPE html>
<html>
<head>

<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" type="text/css" href="style.css">
<title>Înregistrare - Diamond Residence Resort</title>

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

<div class="register-container">
  <form action="register.php" method="post">
  <?php if (isset($_GET['error'])) { ?>
    <p class="error"><?php echo $_GET['error']; ?></p>
  <?php } ?>

  <?php if (isset($_GET['success'])) { ?>
    <p class="success"><?php echo $_GET['success']; ?></p>
  <?php } ?>

  <label for="username">Nume</label>
  <?php if (isset($_GET['username'])) { ?>
    <input type="text" 
           name="username" 
           id="username"
           placeholder="Nume"
           value="<?php echo $_GET['username']; ?>"><br>
  <?php } else { ?>
    <input type="text" 
           name="username" 
           id="username"
           placeholder="Nume"><br>
  <?php }?>

  <label for="email">Email</label>
  <?php if (isset($_GET['email'])) { ?>
    <input type="text" 
           name="email" 
           id="email"
           placeholder="Email"
           value="<?php echo $_GET['email']; ?>"><br>
  <?php } else { ?>
    <input type="text" 
           name="email" 
           id="email"
           placeholder="Email"><br>
  <?php }?>

  <label for="password">Parolă</label>
  <input type="password" 
         name="password" 
         id="password"
         placeholder="Parolă"><br>

  <label for="confirm_password">Confirmă Parola</label>
  <input type="password" 
         name="confirm_password" 
         id="confirm_password"
         placeholder="Confirmă parola"><br>

  <input type="submit" name="submit" value="Inregistrare">
</form>
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

require_once 'config.php';

$error_msg = ""; 

if (isset($_POST['submit'])) {
    
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE username=? OR email=?");
    $stmt->bind_param("ss", $username, $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $error_msg = "Numele de utilizator sau adresa de email există deja. Vă rugăm să alegeți un alt nume de utilizator sau email.";
    } elseif (strlen($password) < 8 || !preg_match('/[A-Z]/', $password) || !preg_match('/\d/', $password)) {
        $error_msg = "Parola trebuie să aibă cel puțin 8 caractere și să conțină cel puțin o literă mare și un număr.";
    } elseif ($password != $confirm_password) {
        $error_msg = "Parola nu se potrivește.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_msg = "Email invalid.";
    } else {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $email, $hashed_password);
        $stmt->execute();

        $_SESSION['success_msg'] = "Te-ai înregistrat cu succes.";

        header('Location: login.php?success=Te-ai înregistrat cu succes.');
        exit();
    }

    $stmt->close();
    $conn->close();
    header('Location: register.php?error=' . urlencode($error_msg) .
        '&username=' . urlencode($username) .
        '&email=' . urlencode($email));
    exit();
}
?>
