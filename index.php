<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calcul de votre âge</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            height: 100vh;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;

            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input[type="date"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        button {
            background-color: #8080ff;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }


        button:hover {
            background-color: #b88bf3;
        }

        p {
            margin-top: 20px;
            font-weight: bold;
            color: white;
        }

        label {
            color: white;
        }
    </style>
</head>

<body>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="birth_date">Enter Your Date Of Birth :</label>
        <input type="date" id="birth_date" name="birth_date" value="">
        <button type="submit">Calculate</button>
    </form>
    <?php
    // Vérifie si la variable $_POST['birth_date'] est définie et non nulle
    if (isset($_POST['birth_date'])) {

        // Récupère la valeur du champ de saisie 'birth_date'
        $birth_date = $_POST['birth_date'];

        // Nettoie la valeur en supprimant les balises HTML et en ajoutant des barres obliques
        $birth_date = strip_tags(addslashes($birth_date));

        // Vérifie si la date de naissance est vide
        if (empty($birth_date)) {
            echo "<p>Vous devez choisir une date de naissance</p>";
        } else {
            // Vérifie si la date de naissance a le format attendu (YYYY-MM-DD)
            if (preg_match('/^\d{4}-\d{2}-\d{2}$/', $birth_date)) {
                // Obtient la date actuelle
                $date_now = new DateTime();

                // Convertit la date de naissance en objet DateTime
                $birth_date = new DateTime($birth_date);

                // Calcule l'âge en années
                $age = $date_now->diff($birth_date)->y;

                // Affiche l'âge
                echo "<p>Your age:  " . $age . "</p>";
            } else {
                // Affiche un message si le format de la date de naissance est incorrect
                echo "<p>Veuillez entrer une date valide au format AAAA-MM-JJ.</p>";
            }
        }
    }
    ?>
</body>
</html>