<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css">
    <title>Přehled modelů</title>
</head>
<body>
<?php
require "dblogin.php";      
if (!($con = mysqli_connect($server, $user, $pass, $db)))   
{
  die("Nelze se připojit k databázovému serveru!</body></html>");
}
mysqli_query($con,"SET NAMES 'utf8'");
if (!($vysledek = mysqli_query($con, "SELECT KOD, NAZEV, PRACNOST, SPOTREBA FROM MODELY")))
{
  die("Nelze provést dotaz.</body></html>");
}
?>
<h1>Přehled modelů</h1>  
<table border="1" ><tr><th>Kód</th><th>Název</th><th>Pracnost</th><th>Spotřeba</th></tr>
<?php
while ($radek = mysqli_fetch_array($vysledek))
{?>
        <tr><td><?php echo htmlspecialchars($radek['KOD']) ?></td>
        <td><?php echo htmlspecialchars($radek['NAZEV']) ?></td>        
        <td><?php echo htmlspecialchars($radek['PRACNOST']) ?> hod.</td>  
        <td><?php echo htmlspecialchars($radek['SPOTREBA']) ?> m</td></tr>             
<?php } ?>
</table>
<ul>
    <li><a href="menusalon.html">Datábáze Modní salón</a></li>
    <li><a href="home.html">Home</a></li>
  </ul>

<?php
mysqli_free_result($vysledek);
mysqli_close($con);
?>
</body>
</html>