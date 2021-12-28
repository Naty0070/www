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
        <form action="dotazysal.php" method="post" >
            <label for="d1" class="col-8">Které modely byly dodány v únoru 2019?</label>
            <input type="submit" class="btn btn-dark rounded col-3" id="d1" name="d1" value="Odpověz">
            <?php if (isset($_POST['d1'])) {
                require "dblogin.php";      
                if (!($con = mysqli_connect($server, $user, $pass, $db)))   
                {
                die("Nelze se připojit k databázovému serveru!</body></html>");
                }
                mysqli_query($con,"SET NAMES 'utf8'");
                if (!($vysledek = mysqli_query($con, "SELECT nazev, count(Nazev) AS pocet
                FROM PRODEJ LEFT JOIN MODELY ON PRODEJ.MODEL=MODELY.KOD
                WHERE DATUM> '2019-01-31' AND DATUM<'2019-03-01'
                GROUP BY NAZEV;")))
                {
                die("Nelze provést dotaz.</body></html>");
                }
                ?>
                <table border="1" style="width: 30%;" class="ml-3">
                <tr><th>Název</th><th>Počet</th></tr>
                <?php
                while ($radek = mysqli_fetch_array($vysledek))
                {?>
                        <tr>
                            <td><?php echo htmlspecialchars($radek['nazev']) ?></td>
                            <td><?php echo htmlspecialchars($radek['pocet']) ?></td>
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
        <form action="dotazysal.php" method="post">
            <label for="d2" class="col-8">Kolik se vydělalo v únoru 2020?</label>
            <input type="submit" id="d2" name="d2" class="btn btn-dark rounded col-3" value="Odpověz">
            <?php if (isset($_POST['d2'])) {
                require "dblogin.php";      
                if (!($con = mysqli_connect($server, $user, $pass, $db)))   
                {
                die("Nelze se připojit k databázovému serveru!</body></html>");
                }
                mysqli_query($con,"SET NAMES 'utf8'");
                if (!($vysledek = mysqli_query($con, "SELECT SUM(PRACNOST*300) AS vydelek
                FROM PRODEJ, MODELY
                WHERE model=kod and datum > '2020-01-31' And datum< '2020-03-01'")))
                {
                die("Nelze provést dotaz.</body></html>");
                }
                ?>
                <table border="1" style="width: 20%;" class="ml-3"><tr><th>Výdělek</th></tr>
                <?php
                while ($radek = mysqli_fetch_array($vysledek))
                {?>
                        <tr><td><?php echo htmlspecialchars($radek['vydelek']) ?> ,- Kč</td></tr>        
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
        <form action="dotazysal.php" method="post">
            <label for="d3" class="col-8">Kolik se spotřebovalo té které látky?</label>
            <input type="submit" id="d3" name="d3" class="btn btn-dark rounded col-3" value="Odpověz">
            <?php if (isset($_POST['d3'])) {
                require "dblogin.php";      
                if (!($con = mysqli_connect($server, $user, $pass, $db)))   
                {
                die("Nelze se připojit k databázovému serveru!</body></html>");
                }
                mysqli_query($con,"SET NAMES 'utf8'");
                if (!($vysledek = mysqli_query($con, "SELECT C.nazev, Round(Sum(B.SPOTREBA),2) AS spotreba
                FROM PRODEJ AS A, MODELY AS B, LATKY AS C
                WHERE (((A.MODEL)=B.kod) And ((A.LATKA)=C.kod))
                GROUP BY C.NAZEV;")))
                {
                die("Nelze provést dotaz.</body></html>");
                }
                ?>
                <table border="1" style="width: 25%" class="ml-3 mt-3">
                <tr><th>Název</th><th>Spotřeba</th></tr>
                <?php
                while ($radek = mysqli_fetch_array($vysledek))
                {?>
                    <tr>
                        <td><?php echo htmlspecialchars($radek['nazev']) ?></td>
                        <td><?php echo htmlspecialchars($radek['spotreba']) ?> m</td>
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
        <form action="dotazysal.php" method="POST">
            <label for="d4" class="col-8">Který model je nejžádanější?</label>
            <input type="submit" id="d4" name="d4" class="btn btn-dark rounded col-3" value="Odpověz">
            <?php if (isset($_POST['d4'])) {
                require "dblogin.php";      
                if (!($con = mysqli_connect($server, $user, $pass, $db)))   
                {
                die("Nelze se připojit k databázovému serveru!</body></html>");
                }
                mysqli_query($con,"SET NAMES 'utf8'");
                if (!($vysledek = mysqli_query($con, "SELECT nazev
                FROM TABULKA_PRODEJU
                WHERE POCET IN(SELECT MAX(POCET) FROM TABULKA_PRODEJU);")))
                {
                die("Nelze provést dotaz.</body></html>");
                }
                ?>
                <table border="1" class="ml-3" style="width: 30%;">
                <tr><th>Název</th></tr>
                <?php
                while ($radek = mysqli_fetch_array($vysledek))
                {?>
                    <tr>
                        <td><?php echo htmlspecialchars($radek['nazev']) ?></td>
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
        <form action="dotazysal.php" method="POST">
            <label for="d5" class="col-8">Který model jsem ještě vůbec neudala?</label>
            <input type="submit" id="d5" name="d5" class="btn btn-dark rounded col-3" value="Odpověz">
            <?php if (isset($_POST['d5'])) {
                require "dblogin.php";      
                if (!($con = mysqli_connect($server, $user, $pass, $db)))   
                {
                die("Nelze se připojit k databázovému serveru!</body></html>");
                }
                mysqli_query($con,"SET NAMES 'utf8'");
                if (!($vysledek = mysqli_query($con, "SELECT nazev
                FROM MODELY
                WHERE KOD NOT IN( SELECT MODEL FROM PRODEJ)")))
                {
                die("Nelze provést dotaz.</body></html>");
                }
                ?>
                <table border="1" class="ml-3" style="width: 30%;">
                <tr><th>Název</th></tr>
                <?php
                while ($radek = mysqli_fetch_array($vysledek))
                {?>
                    <tr>
                        <td><?php echo htmlspecialchars($radek['nazev']) ?></td>
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
    <li><a href="menusalon.html">Datábáze Módní salón</a></li>
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