<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="style2.css">
    <title>Dotazy</title>
</head>
<body>
<h1>Dotazy</h1>
<div class="mt-5 p-5 m-auto d-flex flex-column align-items-flex-start rounded bg-light col-6" >
    <div class="p-3">
        <form action="dotazymod.php" method="post" >
            <label for="d1" class="col-8">Kolik akcí je ještě nasmlouváno do konce roku?</label>
            <input type="submit" class="btn btn-dark rounded col-3" id="d1" name="d1" value="Odpověz">
            <?php if (isset($_POST['d1'])) {
                require "dblogin.php";      
                if (!($con = mysqli_connect($server, $user, $pass, $db)))   
                {
                die("Nelze se připojit k databázovému serveru!</body></html>");
                }
                mysqli_query($con,"SET NAMES 'utf8'");
                if (!($vysledek = mysqli_query($con, "SELECT count(DATOD) AS pocetakci
                FROM KALENDAR
                WHERE DATOD>=curdate() And year(DATOD)=year(curdate())")))
                {
                die("Nelze provést dotaz.</body></html>");
                }
                ?>
                <table border="1" style="width: 20%;" class="ml-3">
                <tr><th>Počet akcí</th></tr>
                <?php
                while ($radek = mysqli_fetch_array($vysledek))
                {?>
                        <tr>
                            <td><?php echo htmlspecialchars($radek['pocetakci']) ?></td>
                        </tr>        
                <?php } ?>
                </table>
                <?php
                mysqli_free_result($vysledek);
                mysqli_close($con);
            }
            ?>
        </form>
    </div>
    <div class="p-3">
        <form action="dotazymod.php" method="post">
            <label for="d2" class="col-8">Kolik akcí je nasmlouváno do konce roku ve Francii?</label>
            <input type="submit" id="d2" name="d2" class="btn btn-dark rounded col-3" value="Odpověz">
            <?php if (isset($_POST['d2'])) {
                 require "dblogin.php";      
                 if (!($con = mysqli_connect($server, $user, $pass, $db)))   
                 {
                 die("Nelze se připojit k databázovému serveru!</body></html>");
                 }
                 mysqli_query($con,"SET NAMES 'utf8'");
                 if (!($vysledek = mysqli_query($con, "SELECT count(DATOD) AS pocetakciFr
                 FROM KALENDAR,navrhari
                 WHERE DATOD>=curdate() And year(DATOD)=year(curdate()) and zeme='FR'")))
                 {
                 die("Nelze provést dotaz.</body></html>");
                 }
                 ?>
                 <table border="1" style="width: 30%;" class="ml-3">
                 <tr><th>Počet akcí ve FR</th></tr>
                 <?php
                 while ($radek = mysqli_fetch_array($vysledek))
                 {?>
                         <tr>
                             <td><?php echo htmlspecialchars($radek['pocetakciFr']) ?></td>
                         </tr>        
                 <?php } ?>
                 </table>
                 <?php
                 mysqli_free_result($vysledek);
                 mysqli_close($con);
            }
            ?>
        </form>
    </div>
    <div class="p-3">
        <form action="dotazymod.php" method="post">
            <label for="d3" class="col-8">Kolik jsem si vydělala v únoru 2020?</label>
            <input type="submit" id="d3" name="d3" class="btn btn-dark rounded col-3" value="Odpověz">
            <?php if (isset($_POST['d3'])) {
                require "dblogin.php";      
                if (!($con = mysqli_connect($server, $user, $pass, $db)))   
                {
                die("Nelze se připojit k databázovému serveru!</body></html>");
                }
                mysqli_query($con,"SET NAMES 'utf8'");
                if (!($vysledek = mysqli_query($con, "SELECT sum(((date(datdo)-date(datod)+1)*plat)-poplatek) AS Vydelek
                FROM KALENDAR AS A, AGENTURY AS B, NAVRHARI AS C
                WHERE agentura=B.kod And navrhar=C.kod And datod>'2020-01-31' And datod<'2020-03-01'")))
                {
                die("Nelze provést dotaz.</body></html>");
                }
                ?>
                <table border="1" style="width: 25%" class="ml-3 mt-3">
                <tr><th>Výdělek</th></tr>
                <?php
                while ($radek = mysqli_fetch_array($vysledek))
                {?>
                    <tr>
                        <td><?php echo htmlspecialchars($radek['Vydelek']) ?> ,-Kč</td>
                    </tr>        
                <?php } ?>
                </table>
            <?php
                mysqli_free_result($vysledek);
                mysqli_close($con);
            }
            ?>
        </form>
    </div>
    <div class="p-3">
        <form action="dotazymod.php" method="POST">
            <label for="d4" class="col-8">Od kterého návrháře byla nejvetší výplata?</label>
            <input type="submit" id="d4" name="d4" class="btn btn-dark rounded col-3" value="Odpověz">
            <?php if (isset($_POST['d4'])) {
                require "dblogin.php";      
                if (!($con = mysqli_connect($server, $user, $pass, $db)))   
                {
                die("Nelze se připojit k databázovému serveru!</body></html>");
                }
                mysqli_query($con,"SET NAMES 'utf8'");
                if (!($vysledek = mysqli_query($con, "SELECT jmeno AS NejlepsiNavrhar
                FROM OdNavrharu
                WHERE vyplata=(select max(vyplata) from OdNavrharu)")))
                {
                die("Nelze provést dotaz.</body></html>");
                }
                ?>
                <table border="1" class="ml-3" style="width: 30%;">
                <tr><th>Nejlepší návrhář</th></tr>
                <?php
                while ($radek = mysqli_fetch_array($vysledek))
                {?>
                    <tr>
                        <td><?php echo htmlspecialchars($radek['NejlepsiNavrhar']) ?></td>
                    </tr>        
                <?php } ?>
                </table>
            <?php
                mysqli_free_result($vysledek);
                mysqli_close($con);
            }
            ?>
        </form>
    </div>
    <div class="p-3">
        <form action="dotazymod.php" method="POST">
            <label for="d5" class="col-8">Byla nějaká akce ztrátová?</label>
            <input type="submit" id="d5" name="d5" class="btn btn-dark rounded col-3 mb-3" value="Odpověz">
            <?php if (isset($_POST['d5'])) {
                require "dblogin.php";      
                if (!($con = mysqli_connect($server, $user, $pass, $db)))   
                {
                die("Nelze se připojit k databázovému serveru!</body></html>");
                }
                mysqli_query($con,"SET NAMES 'utf8'");
                if (!($vysledek = mysqli_query($con, "SELECT date(DATOD) as DATOD, date(DATDO) as DATDO, NAZEV, JMENO, (((date(DATDO)-date(DATOD)+1)*PLAT)-POPLATEK) AS VYDELEK
                FROM AGENTURY, KALENDAR, NAVRHARI
                WHERE KALENDAR.NAVRHAR=NAVRHARI.KOD AND AGENTURY.KOD=KALENDAR.AGENTURA
                AND (((DATDO-DATOD+1)*PLAT)-POPLATEK)<0")))
                {
                die("Nelze provést dotaz.</body></html>");
                }
                ?>
                <table border="1" class="ml-3" style="width: 80%;">
                <tr><th>DatOd</th><th>DatDo</th><th>Nazev</th><th>Jméno</th><th>Výdělek</th></tr>
                <?php
                while ($radek = mysqli_fetch_array($vysledek))
                {?>
                    <tr>
                        <td><?php echo htmlspecialchars($radek['DATOD']) ?></td>
                        <td><?php echo htmlspecialchars($radek['DATDO']) ?></td>
                        <td><?php echo htmlspecialchars($radek['NAZEV']) ?></td>
                        <td><?php echo htmlspecialchars($radek['JMENO']) ?></td>
                        <td><?php echo htmlspecialchars($radek['VYDELEK']) ?> ,- Kč</td>
                    </tr>        
                <?php } ?>
                </table>
            <?php
                mysqli_free_result($vysledek);
                mysqli_close($con);
            }
            ?>
        </form>
    </div>
</div>
<ul>
    <li><a href="menumod.html">Datábáze Modeling</a></li>
    <li><a href="home.html">Home</a></li>
  </ul>
  
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF"
        crossorigin="anonymous"></script>
</body>
</html>