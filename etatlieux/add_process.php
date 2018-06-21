<?php

    ob_start();

    session_start();

    include('../connection.php');

    include('../php/check.php');

    if(isset($_POST['submit']))
    {

        $date = $_POST['date'];

        $type = $_POST['type'];
        
        $cuisine = $_POST['cuisine'];

        $chambre = $_POST['chambre'];

        $salleeau = $_POST['salleeau'];

        $salon = $_POST['salon'];

        $piece = $_POST['piece'];

        $contratid = $_POST['contratid'];

       $agenceid = $_SESSION['agenceid'];

        $sql = "INSERT INTO EtatLieux (Date, Type, Cuisine, Chambre, SalleEau, Salon, Piece, ContratID, AgenceID) 
                VALUES ('$date','$type', '$cuisine', '$chambre', '$salleeau', '$salon', '$piece', '$contratid', '$agenceid')"; 

        $result = mysqli_query($conn, $sql);

        if ($result == true)
        {
            $_SESSION['flash'] = "Etat de lieux ajouté avec succes";

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