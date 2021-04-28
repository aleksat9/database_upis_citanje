<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prikaz</title>
</head>
<body>
    <h2>Prikaz podataka iz tabele</h2>
    <?php
        $konekcija=@mysqli_connect("localhost", "root", "", "aleksa_cv");
        if(!$konekcija) {
            echo "Greska prilikom konekcije!<br>";
            echo mysqli_connect_errno($konekcija).": ".mysqli_connect_error($konekcija);
        } else {
            mysqli_query($konekcija,  "SET NAMES UTF8");
            echo "Uspesna konekcija na bazu!<br>";

            $upit="SELECT * FROM korisnici";
            $odgovor=mysqli_query($konekcija, $upit);
            
            if(mysqli_error($konekcija)) {
                echo "GRESKA!!!<br>".mysqli_error($konekcija);
            } else {
                echo "Broj zapisa: ".mysqli_num_rows($odgovor)."<br>";
                while($red=mysqli_fetch_array($odgovor, MYSQLI_ASSOC)) {
                    echo $red['id'].": ".$red['ime']." ".$red['prezime']." (".$red['status'].") ".$red['email']." Lozinka: ".$red['lozinka']."<br>";
                }
            }
        }
    ?>
</body>
</html>