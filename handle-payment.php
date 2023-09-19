
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Succes - Diamond Residence Resort</title>
    <style>
body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: url('images/case.jpg');
            background-size: cover;
            background-position: center;
        }

        .message-container {
            width: 400px;
            padding: 30px;
            background-color: rgba(255, 255, 255, 0.8);
            border: 1px solid #ccc;
            border-radius: 20px;
            text-align: center;
        }

        .success-message {
            color: black;
            font-size: 24px;
        }

        .error-message {
            color: black;
            font-size: 24px;
        }

        .home-button {
            margin-top: 20px;
            color: black;
            font-size: 16px;
        }
    </style>
    </style>
</head>
<body>

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

    if (isset($_POST['propertyID'])) {
        $propertyID = $_POST['propertyID'];

        $query = "SELECT * FROM property WHERE id = " . $propertyID;
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);

            $userID = getUserId();
            $subject = 'Rezervare proprietate';
            $price = $row['price'];
            $currency = $row['currency'];
            $status = 'Rezervat';
            $date = date('Y-m-d H:i:s');

            $insertQuery = "INSERT INTO Payments (UserID, PropertyID, Subject, Price, Currency, Status, Date)
                            VALUES ($userID, $propertyID, '$subject', $price, '$currency', '$status', '$date')";
            mysqli_query($conn, $insertQuery);

            echo '<div class="message-container">';
            echo "<h2>Rezervarea a fost efectuată cu succes!</h2>";
            echo '<a href="index.php" class="home-button">Acasă</a>';
            echo '</div>';

            $updateQuery = "UPDATE property SET availability = 0 WHERE id = $propertyID";
            mysqli_query($conn, $updateQuery);
        } else {
          echo '<div class="message-container">';
            echo "<h2>Eroare: Proprietatea nu a fost găsită.</h2>";
            echo '<a href="home.php" class="home-button">Acasă</a>';
            echo '</div>';
        }
    } else {
      echo '<div class="message-container">';
        echo "<h2>Eroare: ID-ul proprietății lipsește.</h2>";
        echo '<a href="home.php" class="home-button">Acasă</a>';
        echo '</div>';
        echo '</div>';
    }

mysqli_close($conn);
?>

</body>
</html>