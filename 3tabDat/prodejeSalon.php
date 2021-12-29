<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css">
    <title>Přehled prodejů</title>
</head>
<body>
<?php
require "dblogin.php";      
if (!($con = mysqli_connect($server, $user, $pass, $db)))   
{
  die("Nelze se připojit k databázovému serveru!</body></html>");
}
mysqli_query($con,"SET NAMES 'utf8'");
if (!($vysledek = mysqli_query($con, "SELECT date(DATUM) as DATUM, MODEL, ZAKAZNIK,LATKA FROM PRODEJE")))
{
  die("Nelze provést dotaz.</body></html>");
}
?>
<h1>Přehled prodejů</h1>  
<table border="1" ><tr><th>Datum</th><th>Model</th><th>Zákazník</th><th>Látka</th></tr>
<?php
while ($radek = mysqli_fetch_array($vysledek))
{?>
        <tr><td><?php echo htmlspecialchars($radek['DATUM']) ?></td>
        <td><?php echo htmlspecialchars($radek['MODEL']) ?></td>        
        <td><?php echo htmlspecialchars($radek['ZAKAZNIK']) ?></td>
        <td><?php echo htmlspecialchars($radek['LATKA']) ?></td>        
    </tr>             
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