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
<h1>Výsledek vyhledávání</h1>  

    <?php
        require "dblogin.php";

    $nazev=addslashes($_POST['nazev']);
    $jmeno=addslashes($_POST['jmeno']);
    $prijmeni=addslashes($_POST['prijmeni']);
    $isbn=addslashes($_POST['isbn']);

    if (!($con = mysqli_connect($server,$user,$pass,$db))){
    echo "nelze se pripojit k databazi";
    }
   if(!$vysledek=mysqli_query($con,"select ISBN,jmeno, prijmeni,nazev, popis from knihy where nazev='$nazev' || jmeno='$jmeno' || prijmeni='$prijmeni' ||ISBN='$isbn'")){
       echo "nastala chyba nelze provest prikaz";
   };
   if($radek=mysqli_fetch_array($vysledek)){?>
        <table border="1" ><tr><th>Název</th><th>Jméno</th><th>Příjmení</th><th>ISBN</th><th>Popis</th></tr>
        <tr><td><?php echo htmlspecialchars($radek['nazev']) ?></td>
        <td><?php echo htmlspecialchars($radek['jmeno']) ?></td>        
        <td><?php echo htmlspecialchars($radek['prijmeni']) ?></td>       
        <td><?php echo htmlspecialchars($radek['ISBN']) ?></td>
        <td class="popis"><?php echo htmlspecialchars($radek['popis']) ?></td>
        </tr>
        </table>
  <?php
   }
  else
    echo "Takovou knihu nemáme v databázi, jdi zpět!";
   mysqli_free_result($vysledek);
   mysqli_close($con);
    ?>
     <ul>
    <li><a href="prehledKnih.php">Přehled knih</a></li>
    <li><a href="zadejKnihy.php">Vložit knihu do databáze</a></li>
    <li><a href="home.html">Home</a></li>
    </ul>   
</body>
</html>