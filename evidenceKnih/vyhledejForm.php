<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Vyhledej knihu</title>
</head>
<body>
    <h1>Vyhledej knihu</h1>
    <form id="vloz" method="POST" action="vyhledejKnihu.php">
        ISBN: <input type="text" name="isbn"><br>
        Jméno autora: <input type="text" name="jmeno"><br>
        Příjmení autora: <input type="text" name="prijmeni"><br>
        Název knihy: <input type="text" name="nazev"><br>
        <div class="tlacitka"><input type="submit" value="Hledat"><input type="reset" value="Smazat"></div>
    </form>
    <ul>
    <li><a href="prehledKnih.php">Přehled knih</a></li>
    <li><a href="zadejKnihy.php">Vložit knihu do databáze</a></li>
    <li><a href="home.html">Home</a></li>
    </ul>
 
</body>
</html>