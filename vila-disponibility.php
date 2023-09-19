<?php include 'auth.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="style.css">
    <title>Disponibilitate - Diamond Residence Resort</title>
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

<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "imobiliare";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Conexiunea la baza de date a eșuat: " . mysqli_connect_error());
}

$streetOptions = array("Diamond", "Smarald");
$courtyardOptions = array("Mare", "Mica");

$selectedStreet = isset($_POST['street']) ? $_POST['street'] : '';
$selectedCourtyard = isset($_POST['courtyard']) ? $_POST['courtyard'] : '';
$selectedSortOrder = isset($_POST['sort_order']) ? $_POST['sort_order'] : 'asc';

if (isset($_POST['filter'])) {
    $street = $_POST['street'];
    $courtyard = $_POST['courtyard'];
    $sortOrder = $_POST['sort_order'];

    $query = "SELECT * FROM property WHERE type = 'Vila'";

    if (!empty($street)) {
        $query .= " AND street = '$street'";
    }

    if (!empty($courtyard)) {
        $query .= " AND courtyard = '$courtyard'";
    }

    if ($sortOrder == 'asc') {
        $query .= " ORDER BY price ASC";
    } else if ($sortOrder == 'desc') {
        $query .= " ORDER BY price DESC";
    }

    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Interogarea a eșuat: " . mysqli_error($conn));
    }
} else if (isset($_POST['reset'])) {

    $selectedStreet = '';
    $selectedCourtyard = '';
    $selectedSortOrder = 'asc';

    $query = "SELECT * FROM property WHERE type = 'Vila'";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Interogarea a eșuat: " . mysqli_error($conn));
    }
} else {

    $query = "SELECT * FROM property WHERE type = 'Vila'";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Interogarea a eșuat: " . mysqli_error($conn));
    }
}
?>

<div class="disponibility-container">
    <h1>Disponibilitate Vile</h1>
    <div class="filters-disponibility-container">
        <form method="post" action="">
            <label for="street">Stradă:</label>
            <select name="street" id="street">
                <option value="">Toate</option>
                <?php
                foreach ($streetOptions as $option) {
                    $selected = ($option == $selectedStreet) ? 'selected' : '';
                    echo "<option value='$option' $selected>$option</option>";
                }
                ?>
            </select>

            <label for="courtyard">Curte:</label>
            <select name="courtyard" id="courtyard">
                <option value="">Toate</option>
                <?php
                foreach ($courtyardOptions as $option) {
                    $selected = ($option == $selectedCourtyard) ? 'selected' : '';
                    echo "<option value='$option' $selected>$option</option>";
                }
                ?>
            </select>

            <label for="sort_order">Ordine preț:</label>
            <select name="sort_order" id="sort_order">
                <option value="asc" <?php echo ($selectedSortOrder == 'asc') ? 'selected' : ''; ?>>Crescător</option>
                <option value="desc" <?php echo ($selectedSortOrder == 'desc') ? 'selected' : ''; ?>>Descrescător</option>
            </select>

            <input type="submit" name="filter" value="Filtrează">
            <input type="submit" name="reset" value="Resetare filtre">
        </form>
    </div>

    <?php
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];
            $type = $row['type'];
            $street = $row['street'];
            $floor = $row['floor'];
            $building = $row['building'];
            $scale = $row['scale'];
            $price = $row['price'];
            $currency = $row['currency'];
            $courtyard = $row['courtyard'];
            $availability = $row['availability'];

            echo "<div class='disponibility-item'>";
            echo "<h3>ID: $id</h3>";
            echo "<p>Tip: $type</p>";
            echo "<p>Stradă: $street</p>";
            echo "<p>Preț: $price $currency</p>";
            echo "<p>Curte: $courtyard</p>";
            echo "<p>Disponibilitate: $availability</p>";

            if ($availability == 1) {
                echo "<form method='post' action='payment.php?payment_required=true'>";
                echo "<input type='hidden' name='action' value='reserve'>";
                echo "<input type='hidden' name='property_id' value='$id'>";
                echo "<input type='submit' name='buy' value='Cumpără'>";
                echo "</form>";
            }

            echo "<hr>";
            echo "</div>";
        }
    }

    ?>

</div>

<?php mysqli_close($conn); ?>


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
