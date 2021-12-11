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
   <div>
    <form>
        <h1>Kniha</h1>  
        <h3><?php echo htmlspecialchars($radek['nazev']) ?></h3>
        <p>Jméno autora: <?php echo htmlspecialchars($radek["jmeno"]) ?></p>
        <p>Přijmení autora: <?php echo htmlspecialchars($radek["prijmeni"]) ?></p>
        <p>Popis: </p><p class="popis"><?php echo htmlspecialchars($radek["popis"]) ?></p>
        <p>ISBN: <?php echo htmlspecialchars($radek["ISBN"]) ?></p>
     </form>
     </div>
    <div class="ref">
    <a href="prehledKnih.php">Přehled knih</a>
    <a href="vyhledejForm.php">Vyhledej Knihu</a>
    <a href="zadejKnihy.php">Vlož Knihu</a>
    </div>

  <?php }
  else
    echo "Takovou knihu nemáme v databázi, jdi zpět!";
   mysqli_free_result($vysledek);
   mysqli_close($con);
    ?>
</body>
</html>