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
if (!($vysledek = mysqli_query($con, "SELECT date(datod) as datod, date(datdo) as datdo, navrhar, agentura FROM kalendar")))
{
  die("Nelze provést dotaz.</body></html>");
}
?>
<h1>Přehled modelů</h1>  
<table border="1" ><tr><th>Datum Od</th><th>Datum Do</th><th>Navrhar</th><th>Agentura</th></tr>
<?php
while ($radek = mysqli_fetch_array($vysledek))
{?>
        <tr><td><?php echo htmlspecialchars($radek['datod']) ?></td>
        <td><?php echo htmlspecialchars($radek['datdo']) ?></td>  
        <td><?php echo htmlspecialchars($radek['navrhar']) ?></td>        
        <td><?php echo htmlspecialchars($radek['agentura']) ?></td></tr>             
<?php } ?>
</table>
<ul>
    <li><a href="menumod.html">Databáze Modeling</a></li>
    <li><a href="home.html">Home</a></li>
  </ul>

<?php
mysqli_free_result($vysledek);
mysqli_close($con);
?>
</body>
</html>