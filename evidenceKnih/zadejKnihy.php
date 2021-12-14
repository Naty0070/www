<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Zadej knihu</title>
</head>
<body>
    <div>
    <h1>Vlož knihu do databaze</h1>
    <form method="POST" action="vlozKnihu.php">
        ISBN: <input type="text" name="isbn" required><br>
        Jméno autora: <input type="text" name="jmeno" required><br>
        Příjmení autora: <input type="text" name="prijmeni" required><br>
        Název knihy: <input type="text" name="nazev" required><br>
        Popis:<br><textarea name="popis" cols="20" rows="5" required></textarea><br>
        <input type="submit" value="vložit"><br>
    </form>
    </div>
    <div class="ref">
    <a href="prehledKnih.php">Přehled knih</a>
    <a href="vyhledejForm.php">Vyhledej Knihu</a>
    <a href="zadejKnihy.php">Vlož Knihu</a>
    </div>
</body>
</html>