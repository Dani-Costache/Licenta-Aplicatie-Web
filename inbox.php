<?php
require_once 'auth.php';
require_once 'config.php';

if (!isLoggedIn()) {
  header('Location: login.php');
  exit;
}

$payment_message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  if (isset($_POST['user']) && isset($_POST['date']) && isset($_POST['price']) && isset($_POST['currency']) && isset($_POST['status'])) {
    // Preluare info plata
    $user = $_POST['user'];
    $price = $_POST['price'];
    $currency = $_POST['currency'];
    $status = $_POST['status'];
    $date = $_POST['date'];

    // Afsare detalii
    $payment_message = 'Detalii plată:<br>';
    $payment_message .= 'Utilizator: ' . $user . '<br>';
    $payment_message .= 'Sumă: ' . $price . ' ' . $currency . '<br>';
    $payment_message .= 'Status: ' . $status . '<br>';
    $payment_message .= 'Data: ' . $date . '<br>';

    // Salveaza detalii
    $query = "INSERT INTO Payments (UserID, Subject, Price, Currency, Status, Date) VALUES ('{$_SESSION['user_id']}', '$user', '$price', '$currency', '$status', '$date')";
    if ($conn->query($query) === TRUE) {
   
    } else {
       
    }
  }
}
//Selectare mesaje
$query = "SELECT * FROM Payments WHERE UserID = '{$_SESSION['user_id']}'";
$result = $conn->query($query);
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" type="text/css" href="style.css">
  <title>Notificări - Diamond Residence Resort</title>
</head>
<body>
  <nav class="navbar">
  <a class="navbar-brand" href="index.php"><img src="images/diamond.png" alt="Logo"></a>
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
  <div class="inbox-container">
    <div class="notificari-container">
    <h2>Notificări</h2>
    <?php if (!empty($payment_message)) : ?>
      <div class="message success"><?php echo $payment_message; ?></div>
    <?php endif; ?>
    <?php if ($result->num_rows > 0) : ?>
      <?php while ($row = $result->fetch_assoc()) : ?>
        <div class="message" onclick="toggleDetails(this)">
          <div class="message-title"><?php echo $row['Subject']; ?></div>
          <div class="message-details" style="display: none;">
          <div class="message-content">Id: <?php echo $row['PropertyID']; ?></div>
            <div class="message-content">Preț locuință: <?php echo $row['Price']; ?> <?php echo $row['Currency']; ?></div>
            <div class="message-content">Achitat: <?php echo $row['Paid']; ?> <?php echo $row['Currency']; ?></div>
            <div class="message-status">Status: <?php echo $row['Status']; ?></div>
            <div class="message-date">Data: <?php echo $row['Date']; ?></div>
          </div>
        </div>
      <?php endwhile; ?>
    <?php else : ?>
      <div class="message">Nu există mesaje.</div>
    <?php endif; ?>
    </div>
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

  <script>
    function toggleDetails(message) {
      const details = message.querySelector('.message-details');
      details.style.display = (details.style.display === 'block') ? 'none' : 'block';
    }
  </script>

<script src="icon.js"></script>
</body>
</html>
