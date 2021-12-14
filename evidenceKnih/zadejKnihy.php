<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Vlož knihu</title>
</head>
<body>
<?php
require "dblogin.php";
if(isset($_POST['isbn'])){
if (!($con = mysqli_connect($server,$user,$pass,$db)))
{
  die("Nelze se připojit k databázovému serveru!</body></html>");
}
mysqli_query($con,"SET NAMES 'utf8'");
if (mysqli_query($con,
"INSERT INTO knihy(ISBN,jmeno, prijmeni,nazev, popis) VALUES('" . 
addslashes($_POST["isbn"]) . "', '" . 
addslashes($_POST["jmeno"]) . "', '" . 
addslashes($_POST["prijmeni"]) . "', '" . 
addslashes($_POST["nazev"]) . "', '" . 
addslashes($_POST["popis"]) . "')"
))
{
  echo "<p style='text-align: center'>Úspěšně vloženo.</p>";
}
else
{
  echo "Nelze provést dotaz. " . mysqli_error($con);
}
mysqli_close($con);}
?>
    
    <h1>Vlož knihu do databáze</h1>
    <form id="vloz" method="POST" action="zadejKnihy.php">
        ISBN: <input type="text" name="isbn" required><br>
        Jméno autora: <input type="text" name="jmeno" required><br>
        Příjmení autora: <input type="text" name="prijmeni" required><br>
        Název knihy: <input type="text" name="nazev" required><br>
        Popis:<br><textarea name="popis" cols="20" rows="5" required></textarea><br>
        <div class="tlacitka"><input type="submit" value="Vložit"><input type="reset" value="Smazat"></div>
    </form>
    
    <ul>
    <li><a href="prehledKnih.php">Přehled knih</a></li>
    <li><a href="vyhledejForm.php">Vyhledat knihu</a></li>
    <li><a href="home.html">Home</a></li>
  </ul>
</body>
</html>