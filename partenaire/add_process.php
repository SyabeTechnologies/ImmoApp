<?php
    ob_start();

    session_start();

    include('../connection.php');

    include('../php/check.php');

    if(isset($_POST['submit']))
    {

        $nom = $_POST['nom'];

        $specialite= $_POST['specialite'];

        $contact = $_POST['contact'];

        $email = $_POST['email'];

        $localisation = $_POST['localisation'];

        $agenceid = $_SESSION['agenceid'];

        $sql = "INSERT INTO Partenaire (Nom, Specialite, Contact, Email, Localisation, AgenceID) 
                VALUES ('$nom','$specialite', '$contact', '$email', '$localisation', '$agenceid')"; 

        $result = mysqli_query($conn, $sql);

        if ($result == true)
        {
            $_SESSION['flash']="Partenaire ajouté avec succes";

            echo "<script type='text/javascript'>location.href = 'dashboard.php';</script>";

        }
        else
        {
            $_SESSION['flash']="Erreur survenue lors de l'ajout du Partenaire";

            echo "<script type='text/javascript'>location.href = 'dashboard.php';</script>";
        }

    }

    mysqli_close($conn);

    ob_end_flush();

?>