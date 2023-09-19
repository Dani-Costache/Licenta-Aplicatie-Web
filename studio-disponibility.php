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
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "imobiliare";

    $conn = mysqli_connect($servername, $username, $password, $database);

    if (!$conn) {
        die("Conexiunea la baza de date a eșuat: " . mysqli_connect_error());
    }

    $blockOptions = array("Diamond", "Smarald");
    $scaleOptions = array("A", "B");
    $streetOptions = array("Diamond", "Smarald");
    $floorOptions = array("1", "2", "3", "4", "5", "6");

    $selectedBlock = isset($_POST['block']) ? $_POST['block'] : "";
    $selectedScale = isset($_POST['scale']) ? $_POST['scale'] : "";
    $selectedStreet = isset($_POST['street']) ? $_POST['street'] : "";
    $selectedFloor = isset($_POST['floor']) ? $_POST['floor'] : "";
    $sortOrder = isset($_POST['sort_order']) ? $_POST['sort_order'] : "asc";

    if (isset($_POST['filter'])) {
 
        $query = "SELECT * FROM property WHERE page = 'Studio'";

        if (!empty($selectedBlock)) {
            $query .= " AND building = '$selectedBlock'";
        }

        if (!empty($selectedScale)) {
            $query .= " AND scale = '$selectedScale'";
        }

        if (!empty($selectedStreet)) {
            $query .= " AND street = '$selectedStreet'";
        }

        if (!empty($selectedFloor)) {
            $query .= " AND floor = '$selectedFloor'";
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
    
        $selectedBlock = "";
        $selectedScale = "";
        $selectedStreet = "";
        $selectedFloor = "";
        $sortOrder = "asc";
        $query = "SELECT * FROM property WHERE page = 'Studio'";
        $result = mysqli_query($conn, $query);

        if (!$result) {
            die("Interogarea a eșuat: " . mysqli_error($conn));
        }
    } else {
    
        $query = "SELECT * FROM property WHERE page = 'Studio'";
        $result = mysqli_query($conn, $query);

        if (!$result) {
            die("Interogarea a eșuat: " . mysqli_error($conn));
        }
    }
    ?>

    <div class="disponibility-container">
        <h1>Disponibilitate apartamente tip "Studio"</h1>
        <div class="filters-disponibility-container">
            <form method="post" action="">
                <label for="block">Bloc:</label>
                <select name="block" id="block">
                    <option value="">Toate</option>
                    <?php
                    foreach ($blockOptions as $option) {
                        if ($selectedBlock == $option) {
                            echo "<option value='$option' selected>$option</option>";
                        } else {
                            echo "<option value='$option'>$option</option>";
                        }
                    }
                    ?>
                </select>

                <label for="scale">Scară:</label>
                <select name="scale" id="scale">
                    <option value="">Toate</option>
                    <?php
                    foreach ($scaleOptions as $option) {
                        if ($selectedScale == $option) {
                            echo "<option value='$option' selected>$option</option>";
                        } else {
                            echo "<option value='$option'>$option</option>";
                        }
                    }
                    ?>
                </select>

                <label for="street">Stradă:</label>
                <select name="street" id="street">
                    <option value="">Toate</option>
                    <?php
                    foreach ($streetOptions as $option) {
                        if ($selectedStreet == $option) {
                            echo "<option value='$option' selected>$option</option>";
                        } else {
                            echo "<option value='$option'>$option</option>";
                        }
                    }
                    ?>
                </select>

                <label for="floor">Etaj:</label>
                <select name="floor" id="floor">
                    <option value="">Toate</option>
                    <?php
                    foreach ($floorOptions as $option) {
                        if ($selectedFloor == $option) {
                            echo "<option value='$option' selected>$option</option>";
                        } else {
                            echo "<option value='$option'>$option</option>";
                        }
                    }
                    ?>
                </select>

                <label for="sort_order">Sortare după preț:</label>
                <select name="sort_order" id="sort_order">
                    <option value="asc" <?php if ($sortOrder == 'asc') echo "selected"; ?>>Crescător</option>
                    <option value="desc" <?php if ($sortOrder == 'desc') echo "selected"; ?>>Descrescător</option>
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
            echo "<p>Etaj: $floor</p>";
            echo "<p>Bloc: $building</p>";
            echo "<p>Scară: $scale</p>";
            echo "<p>Preț: $price $currency</p>";
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
      
    </footer>

    <script src="icon.js"></script>
</body>
</html>