<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upis</title>
</head>
<body>
    <h3>Dodaj u bazu</h3>
    <form action="dodaj.php" method="POST" enctype="multipart/form-data">
        <input type="text" name="ime" id="ime" placeholder="Unesite ime"><br><br>
        <input type="text" name="prezime" id="prezime" placeholder="Unesite prezime"><br><br>
        <select name="status" id="status">
            <option value="0">--Izaberite status--</option>
            <option value="Administrator">Administrator</option>
            <option value="Urednik">Urednik</option>
            <option value="Korisnik">Korisnik</option>
        </select><br><br>
        <input type="text" name="email" id="email" placeholder="Unesite email"><br><br>
        <input type="password" name="lozinka" id="lozinka" placeholder="Unesite lozinku"><br><br>
        <button type="submit" name="dugme">Snimi</button>
    </form>

    <?php
    
        if(isset($_POST['dugme'])) {
            $baza_podataka=mysqli_connect("localhost", "root", "", "aleksa_cv");

            $ime=$_POST['ime'];
            $prezime=$_POST['prezime'];
            $status=$_POST['status'];
            $email=$_POST['email'];
            $lozinka=$_POST['lozinka'];

            if($ime!="" and $prezime!="" and $status!="0" and $email!="" and $lozinka!="") {
                $upit="INSERT INTO korisnici (ime, prezime, status, email, lozinka) VALUE ('$ime','$prezime','$status','$email','$lozinka')";
                $odg_baze=mysqli_query($baza_podataka, $upit);
                if($odg_baze) {
                    echo "Uspesno dodato u bazu.";
                } else {
                    echo "Greska: ".mysqli_connect_error($baza_podataka);
                }
            } else {
                echo "Obavezni su svi podaci.";
            }
        } else {
            echo "Dobrodosli na stranicu za unos podataka u bazu.";
        }
    ?>

</body>
</html>