<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css">
    <title>Přehled knih</title>
</head>
<body>
<?php
require "dblogin.php";      
if (!($con = mysqli_connect($server, $user, $pass, $db)))   
{
  die("Nelze se připojit k databázovému serveru!</body></html>");
}
mysqli_query($con,"SET NAMES 'utf8'");
if (!($vysledek = mysqli_query($con, "SELECT AUTOR, NAZEV, OBCHOD, CENA, NAKLADATEL,VYDAVATEL,ROK FROM KNIHY2")))
{
  die("Nelze provést dotaz.</body></html>");
}
?>
<h1>Přehled knih</h1>  
<table border="1" ><tr><th>Autor</th><th>Název</th><th>Obchod</th><th>Cena</th><th>Nakladatel</th><th>Vydavatel</th><th>Rok</th></tr>
<?php
while ($radek = mysqli_fetch_array($vysledek))
{?>
        <tr><td><?php echo htmlspecialchars($radek['AUTOR']) ?></td>
        <td><?php echo htmlspecialchars($radek['NAZEV']) ?></td>        
        <td><?php echo htmlspecialchars($radek['OBCHOD']) ?></td>  
        <td><?php echo htmlspecialchars($radek['CENA']) ?></td>       
        <td><?php echo htmlspecialchars($radek['NAKLADATEL']) ?></td>            
        <td><?php echo htmlspecialchars($radek['VYDAVATEL']) ?></td>
        <td><?php echo htmlspecialchars($radek['ROK']) ?></td> </tr>     

        
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