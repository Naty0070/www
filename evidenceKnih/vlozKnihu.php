<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
</head>
<body>
  <div>
<?php
require "dblogin.php";
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
  echo "<p>Úspěšně vloženo.</p>";
}
else
{
  echo "Nelze provést dotaz. " . mysqli_error($con);
}
mysqli_close($con);
?>
  </div>
<div class="ref">
    <a href="prehledKnih.php">Přehled knih</a>
    <a href="vyhledejForm.php">Vyhledej Knihu</a>
    <a href="zadejKnihy.php">Vlož Knihu</a>
</div>
</body>
</html>