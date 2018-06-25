<?php

    ob_start();

    session_start();

    include('../connection.php');

    include('../php/check.php');

    if(isset($_POST['submit']))
    {
        $id = $_POST['id'];

        $datedebut = $_POST['datedebut'];

        $datefin = $_POST['datefin'];

        $description = $_POST['description'];

        $bienid = $_POST['bienid'];

        $partenaireid = $_POST['partenaireid'];

        $agenceid = $_SESSION['agenceid'];

        $sql = "UPDATE Travaux
                SET   DateDebut = '$datedebut', DateFin = '$datefin', Description = '$description', BienImmobilierID = '$bienid', PartenaireID = '$partenaireid'
                WHERE ID = '$id' AND AgenceID = '$agenceid'"; 

        $result = mysqli_query($conn, $sql);

        if ($result == true)
        {
            $_SESSION['flash'] = "Travaux modifié avec succes";

            echo "<script type='text/javascript'>location.href = 'dashboard.php';</script>";

        }
        else
        {
            $_SESSION['flash'] = "Erreur survenue lors de la modification ";

            echo "<script type='text/javascript'>location.href = 'dashboard.php';</script>";
        }

    }

    mysqli_close($conn);

    ob_end_flush();

?>