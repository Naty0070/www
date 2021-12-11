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
<div>
    <form method="POST" action="vyhledejKnihu.php">
        <h1>Vyhledej knihu</h1>
        <label for="jmeno"> Jméno autora: </label><input type="text" name="jmeno" id="jmeno"><br>
        <label for="jmeno"> Příjmení autora: </label> <input type="text" name="prijmeni"  id="prijmeni"><br>
        <label for="jmeno"> Název knihy: </label>  <input type="text" name="nazev" id="nazev"><br>
        <label for="jmeno"> ISBN: </label> <input type="text" name="isbn"  id="isbn"><br>
        <input type="submit" value="vyhledat"  id="vyhledat"><br>
    </form>
</div>
<div class="ref">
        <a href="prehledKnih.php">Přehled knih</a>
        <a href="vyhledejForm.php">Vyhledej Knihu</a>
        <a href="zadejKnihy.php">Vlož Knihu</a>
    </div>    
 
</body>
</html>