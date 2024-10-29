<?php
// Prikaz grešaka za debugiranje
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Proveravamo da li je zahtev metod POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Povezivanje sa bazom podataka
    $servername = "localhost";
    $username = "root";
    $password = "aezakmi77";
    $dbname = "contact"; // Uverite se da je naziv baze ispravan

    // Kreiranje konekcije
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Provera konekcije
    if ($conn->connect_error) {
        die("Konekcija nije uspjela: " . $conn->connect_error);
    }

    // Uzimamo podatke iz forme i sanitizujemo ih
    $name = $conn->real_escape_string($_POST['name']);
    $number = $conn->real_escape_string($_POST['number']);
    $email = $conn->real_escape_string($_POST['email']);
    $message = $conn->real_escape_string($_POST['message']);

    // SQL upit za unos podataka u tabelu
    $sql = "INSERT INTO poruke (ime_prezime, broj_telefona, email, poruka) 
            VALUES ('$name', '$number', '$email', '$message')";

    // Izvršavanje upita i provera uspeha
    if ($conn->query($sql) === TRUE) {
        echo "Vaša poruka je uspješno sačuvana!";
    } else {
        echo "Greška: " . $sql . "<br>" . $conn->error; // Prikaz greške
    }

    // Zatvaranje konekcije
    $conn->close();
} else {
    echo "Neispravan zahtjev.";
}
?>
