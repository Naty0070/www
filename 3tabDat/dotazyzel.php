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
        <form action="dotazyzel.php" method="post" >
            <label for="d1" class="col-8">Které zboží se prodalo v únoru 2020?</label>
            <input type="submit" class="btn btn-dark rounded col-3" id="d1" name="d1" value="Odpověz">
            <?php if (isset($_POST['d1'])) {
                require "dblogin.php";      
                if (!($con = mysqli_connect($server, $user, $pass, $db)))   
                {
                die("Nelze se připojit k databázovému serveru!</body></html>");
                }
                mysqli_query($con,"SET NAMES 'utf8'");
                if (!($vysledek = mysqli_query($con, "SELECT ZBOZI, NAZEV, sum(KUSY) AS POCET
                FROM PRODEJ, SKLAD
                WHERE ZBOZI=KOD and DATUM > '2020-01-31' And DATUM<'2020-03-01'
                GROUP BY ZBOZI, NAZEV
                ORDER BY ZBOZI")))
                {
                die("Nelze provést dotaz.</body></html>");
                }
                ?>
                <table border="1" style="width: 50%;" class="ml-3">
                <tr><th>Zboží</th><th>Název</th><th>Počet</th></tr>
                <?php
                while ($radek = mysqli_fetch_array($vysledek))
                {?>
                        <tr>
                            <td><?php echo htmlspecialchars($radek['ZBOZI']) ?></td>
                            <td><?php echo htmlspecialchars($radek['NAZEV']) ?></td>
                            <td><?php echo htmlspecialchars($radek['POCET']) ?></td>
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
    <form action="dotazyzel.php" method="post">
        <label for="d2" class="col-8">Kolik se vydělalo v únoru 2020, jestliže k ceně dodavatele připočítávám 10% jako svůj zisk?</label>
        <input type="submit" id="d2" name="d2" class="btn btn-dark rounded col-3 mb-3" value="Odpověz">
        <?php if (isset($_POST['d2'])) {
            require "dblogin.php";      
            if (!($con = mysqli_connect($server, $user, $pass, $db)))   
            {
            die("Nelze se připojit k databázovému serveru!</body></html>");
            }
            mysqli_query($con,"SET NAMES 'utf8'");
            if (!($vysledek = mysqli_query($con, "SELECT sum((KUSY*CENA)/10) AS VYDELEK
            FROM PRODEJ, SKLAD
            WHERE ZBOZI=KOD and DATUM > '2020-01-31' And DATUM< '2020-03-01'")))
            {
            die("Nelze provést dotaz.</body></html>");
            }
            ?>
            <table border="1" style="width: 20%;" class="ml-3"><tr><th>Výdělek</th></tr>
            <?php
            while ($radek = mysqli_fetch_array($vysledek))
            {?>
                    <tr><td><?php echo htmlspecialchars($radek['VYDELEK']) ?> ,- Kč</td></tr>        
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
    <form action="dotazyzel.php" method="post">
        <label for="d3" class="col-8">Kolik kusů zboží se celkem dovezlo od dodavatelů z Plzně?</label>
        <input type="submit" id="d3" name="d3" class="btn btn-dark rounded col-3" value="Odpověz">
        <?php if (isset($_POST['d3'])) {
            require "dblogin.php";      
            if (!($con = mysqli_connect($server, $user, $pass, $db)))   
            {
            die("Nelze se připojit k databázovému serveru!</body></html>");
            }
            mysqli_query($con,"SET NAMES 'utf8'");
            if (!($vysledek = mysqli_query($con, "SELECT sum(B.DODANO) AS DOVEZENOZPLZNE
            FROM SKLAD AS B, DODAVATELE AS C
            WHERE B.DODAVATEL=C.KOD and C.SIDLO='Plzeň'")))
            {
            die("Nelze provést dotaz.</body></html>");
            }
            ?>
            <table border="1" style="width: 25%" class="ml-3 mt-3">
            <tr><th>Celkem kusů z Plzně</th></tr>
            <?php
            while ($radek = mysqli_fetch_array($vysledek))
            {?>
                <tr>
                    <td><?php echo htmlspecialchars($radek['DOVEZENOZPLZNE']) ?></td>
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
    <form action="dotazyzel.php" method="POST">
        <label for="d4" class="col-8">Které zboží se musí objednat (počet kusů na skladě je menší než 5)?</label>
        <input type="submit" id="d4" name="d4" class="btn btn-dark rounded col-3 mb-3" value="Odpověz">
        <?php if (isset($_POST['d4'])) {
            require "dblogin.php";      
            if (!($con = mysqli_connect($server, $user, $pass, $db)))   
            {
            die("Nelze se připojit k databázovému serveru!</body></html>");
            }
            mysqli_query($con,"SET NAMES 'utf8'");
            if (!($vysledek = mysqli_query($con, "SELECT NAZEV, DODANO-sum(KUSY) AS ZBYTEKNASKLADE
            FROM PRODEJ, SKLAD
            WHERE ZBOZI=KOD
            GROUP BY NAZEV, DODANO
            HAVING DODANO-sum(KUSY)<5;")))
            {
            die("Nelze provést dotaz.</body></html>");
            }
            ?>
            <table border="1" class="ml-3" style="width: 50%;">
            <tr><th>Název</th><th>Zůstatek(ks)</th></tr>
            <?php
            while ($radek = mysqli_fetch_array($vysledek))
            {?>
                <tr>
                    <td><?php echo htmlspecialchars($radek['NAZEV']) ?></td>
                    <td><?php echo htmlspecialchars($radek['ZBYTEKNASKLADE']) ?></td>
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
    <li><a href="menuzelezarstvi.html">Datábáze železářství</a></li>
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