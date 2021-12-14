<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Přehled knih</title>
</head>
<body>
<?php
require "dblogin.php";      //tady vlozis skript
if (!($con = mysqli_connect($server, $user, $pass, $db)))   //tady vlozis promenne ze skriptu
{
  die("Nelze se připojit k databázovému serveru!</body></html>");
}
mysqli_query($con,"SET NAMES 'utf8'");
if (!($vysledek = mysqli_query($con, "SELECT ISBN, jmeno, prijmeni, nazev, popis FROM knihy")))
{
  die("Nelze provést dotaz.</body></html>");
}
?>

<h1>Přehled knih</h1>  
<div class="zaznamy">
<?php
while ($radek = mysqli_fetch_array($vysledek))
{?>
    <div class="zaznam">
      <h3>Název: <?php echo htmlspecialchars($radek['nazev']) ?></h3>
      <p>Jméno autora: <?php echo htmlspecialchars($radek["jmeno"]) ?></p>
      <p>Přijmení autora: <?php echo htmlspecialchars($radek["prijmeni"]) ?></p>
      <p>Popis:</p>
      <p class="popis"><?php echo htmlspecialchars($radek["popis"]) ?></p>
      <p>ISBN: <?php echo htmlspecialchars($radek["ISBN"]) ?></p>
      </div>
<?php } ?>
</div>
<div class="ref">
    <a href="prehledKnih.php">Přehled knih</a>
    <a href="vyhledejForm.php">Vyhledej Knihu</a>
    <a href="zadejKnihy.php">Vlož Knihu</a>
</div>

<?php
mysqli_free_result($vysledek);
mysqli_close($con);
?>
</body>
</html>