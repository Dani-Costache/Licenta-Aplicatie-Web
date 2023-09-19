<?php
include 'auth.php';

if (!isLoggedIn()) {
 
    header("Location: login.php");
    exit;
}

$conn = mysqli_connect('localhost', 'root', '', 'imobiliare');

if (!$conn) {
    die('Eroare la conectare: ' . mysqli_connect_error());
}

if (isset($_POST['property_id'])){
  $propertyID = $_POST['property_id'];
}


?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Plăți - Diamond Residence Resort</title>
  <link rel="stylesheet" type="text/css" href="style.css">
 
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
<header>
  <div class="payment-card-container">
  <form id="payment-form" method="POST" action="handle-payment.php">
      <div class="card-form-row row1">
        <label for="card-number">
          Card de credit sau de debit
        </label>
        <div id="card-number-element" class="card-form-control"></div>
        <div class="card-form-row">
     <label for="cardholder-name">
    Numele deținătorului
  </label>
  <input type="text" id="cardholder-name-element" class="card-form-control" placeholder="Nume"/>
   </div>
      <div class="card-form-row">
        <div class="row2">
          <div class="row2-col1">
            <label for="card-expiry">
              Data
            </label>
            <div id="card-expiry-element" class="card-form-control"></div>
          </div>
          <div class="row2-col2">
            <label for="card-cvc">
              CVC
            </label>
            <div id="card-cvc-element" class="card-form-control"></div>
          </div>
        </div>
      </div>
      <div class="card-form-row submit-row">
        <input id="submit-button" type="submit" value="Confirmați plata" class="card-form-control" />
        <input type="hidden" name="propertyID" value="<?php echo $propertyID; ?>">
    </div>
      <div id="card-errors" role="alert"></div>
    </form>

  </div>
</header>



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
  
    <script src="https://js.stripe.com/v3/"></script>

<script>
var stripe = Stripe('pk_test_51NGjLdCUdp96TfDJ7XbCdbo1X4TY7rCFrPEIIFDcBP1OdYGK3xDrxg2nLIZnnuEry84w9XBhoPSmYThh6wpUjTn200jJgo9ie2');
var elements = stripe.elements();

var cardNumberElement = elements.create('cardNumber', {style: style});
cardNumberElement.mount('#card-number-element');

var cardExpiryElement = elements.create('cardExpiry', {style: style});
cardExpiryElement.mount('#card-expiry-element');

var cardCvcElement = elements.create('cardCvc', {style: style});
cardCvcElement.mount('#card-cvc-element');

var form = document.getElementById('payment-form');
var submitButton = document.getElementById('submit-button');

form.addEventListener('submit', function(event) {
event.preventDefault();

submitButton.disabled = true;
stripe.createToken(cardNumberElement).then(function(result) {
  if (result.error) {
    var errorElement = document.getElementById('card-errors');
    errorElement.textContent = result.error.message;
    submitButton.disabled = false;
  } else {
    stripeTokenHandler(result.token);
  }
});
});

function stripeTokenHandler(token) {
var hiddenInput = document.createElement('input');
hiddenInput.setAttribute('type', 'hidden');
hiddenInput.setAttribute('name', 'stripeToken');
hiddenInput.setAttribute('value', token.id);
form.appendChild(hiddenInput);

var successInput = document.createElement('input');
successInput.setAttribute('type', 'hidden');
successInput.setAttribute('name', 'payment_status');
successInput.setAttribute('value', 'success');
form.appendChild(successInput);

// Trimite formularul catre server
form.submit();
}

var style = {
base: {
  fontFamily: 'Arial, sans-serif',
  fontSize: '16px',
  lineHeight: '24px',
  color: '#6B6B6B',
  '::placeholder': {
    color: '#BFBFBF',
  },
},
invalid: {
  color: '#F75959',
},
};
</script>



   
<script src="icon.js"></script>
</body>
</html>