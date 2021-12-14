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
<table border="1" ><tr><th>Název</th><th>Jméno</th><th>Příjmení</th><th>ISBN</th><th>Popis</th></tr>
<?php
while ($radek = mysqli_fetch_array($vysledek))
{?>
        <tr><td><?php echo htmlspecialchars($radek['nazev']) ?></td>
        <td><?php echo htmlspecialchars($radek['jmeno']) ?></td>        
        <td><?php echo htmlspecialchars($radek['prijmeni']) ?></td>       
        <td><?php echo htmlspecialchars($radek['ISBN']) ?></td>
        <td class="popis"><?php echo htmlspecialchars($radek['popis']) ?></td>
        </tr>
<?php } ?>
</table>
<ul>
  <li><a href="vyhledejForm.php">Vyhledat knihu</a></li>
    <li><a href="zadejKnihy.php">Vložit knihu do databáze</a></li>
    <li><a href="home.html">Home</a></li>
  </ul>

<?php
mysqli_free_result($vysledek);
mysqli_close($con);
?>
</body>
</html>