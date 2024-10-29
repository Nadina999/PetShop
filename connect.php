<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost"; 
    $username = "root";         
    $password = "";          
    $dbname = "contact";       

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Konekcija nije uspjela: " . $conn->connect_error);
    } else {
        echo "Konekcija je uspješna!<br>";
    }

    $name = $conn->real_escape_string($_POST['name']);
    $number = $conn->real_escape_string($_POST['number']);
    $email = $conn->real_escape_string($_POST['email']);
    $message = $conn->real_escape_string($_POST['message']);

    $sql = "INSERT INTO poruke (ime_prezime, broj_telefona, email, poruka) VALUES ('$name', '$number', '$email', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "Vaša poruka je uspješno sačuvana!";
    } else {
        echo "Greška: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    echo "Neispravan zahtjev.";
}
?>

