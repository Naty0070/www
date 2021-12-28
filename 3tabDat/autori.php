<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css">
    <title>Autoři</title>
</head>
<body>
<?php
require "dblogin.php";      
if (!($con = mysqli_connect($server, $user, $pass, $db)))   
{
  die("Nelze se připojit k databázovému serveru!</body></html>");
}
mysqli_query($con,"SET NAMES 'utf8'");
if (!($vysledek = mysqli_query($con, "SELECT kod, jmeno, narodnost, narozen, zemrel,jazyk FROM autori")))
{
  die("Nelze provést dotaz.</body></html>");
}
?>
<h1>Autoři</h1>  
<table border="1" ><tr><th>Kód</th><th>Jméno</th><th>Národnost</th><th>Narozen</th><th>Zemřel</th><th>Jazyk</th></tr>
<?php
while ($radek = mysqli_fetch_array($vysledek))
{?>
        <tr><td><?php echo htmlspecialchars($radek['kod']) ?></td>
        <td><?php echo htmlspecialchars($radek['jmeno']) ?></td>        
        <td><?php echo htmlspecialchars($radek['narodnost']) ?></td>  
        <td><?php echo htmlspecialchars($radek['narozen']) ?></td>       
        <td><?php echo htmlspecialchars($radek['zemrel']) ?></td>            
        <td><?php echo htmlspecialchars($radek['jazyk']) ?></td> </tr>     
<?php } ?>
</table>
<ul>
    <li><a href="menuknihy.html">Datábáze knih</a></li>
    <li><a href="home.html">Home</a></li>
  </ul>

<?php
mysqli_free_result($vysledek);
mysqli_close($con);
?>
</body>
</html>