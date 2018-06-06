<?php
    ob_start();

    session_start();

    include('../connection.php');

    include('../php/check.php');

    if(isset($_POST['submit']))
    {

        $nom = $_POST['nom'];

        $localisation = $_POST['localisation'];
 
        $proprietaireid = $_POST['proprietaireid'];

        $agenceid = $_SESSION['agenceid'];
    
        
        $sql = "INSERT INTO Immeuble (Nom, Localisation, ProprietaireID, AgenceID) 
                VALUES ('$nom', '$localisation', '$proprietaireid', '$agenceid')"; 

        $result = mysqli_query($conn, $sql);

        if ($result == true)
        {
            $_SESSION['flash']="Immeuble ajouté avec succes";

            echo "<script type='text/javascript'>location.href = 'dashboard.php';</script>";

        }
        else
        {
            $_SESSION['flash']="Erreur survenue lors de l'ajout";

            echo "<script type='text/javascript'>location.href = 'dashboard.php';</script>";
        }

    }

    mysqli_close($conn);

    ob_end_flush();

?>