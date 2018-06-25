<?php

    ob_start();

    session_start();

    include('../connection.php');

    include('../php/check.php');

    if(isset($_POST['submit']))
    {

        $description = $_POST['description'];

        $montant = $_POST['montant'];

        $datedebut = $_POST['datedebut'];

        $datefin = $_POST['datefin'];

        $bienid = $_POST['bienid'];

        $partenaireid = $_POST['partenaireid'];

        $agenceid = $_SESSION['agenceid'];

        $sql = "INSERT INTO Travaux (DateDebut, DateFin, Description, Montant, BienImmobilierID, PartenaireID, AgenceID) 
                VALUES ('$datedebut', '$datefin', '$description',  '$montant', '$bienid', '$partenaireid', '$agenceid')"; 

        $result = mysqli_query($conn, $sql);

        if ($result == true)
        {
            $_SESSION['flash'] = "Travaux ajouté avec succes";

            echo "<script type='text/javascript'>location.href = 'dashboard.php';</script>";

        }
        else
        {
            $_SESSION['flash'] = "Erreur survenue lors de l'ajout";

            echo "<script type='text/javascript'>location.href = 'dashboard.php';</script>";
        }

    }

    mysqli_close($conn);

    ob_end_flush();

?>