<?php

    ob_start();

    session_start();

    include('../connection.php');

    include('../php/check.php');

    if(isset($_POST['submit']))
    {
        $id = $_POST['id'];

        $date = $_POST['date'];

        $type = $_POST['type'];
        
        $cuisine = $_POST['cuisine'];

        $chambre = $_POST['chambre'];
        
        $salleeau = $_POST['salleeau'];

        $salon = $_POST['salon'];
        
        $piece = $_POST['piece'];

        $contratid = $_POST['contratid'];

       $agenceid = $_SESSION['agenceid'];

        $sql = "UPDATE EtatLieux
                SET   Date = '$date', Type = '$type', Cuisine = '$cuisine', Chambre = '$chambre', SalleEau = '$salleeau', Salon = '$salon', Piece = '$piece', ContratID = '$contratid'
                WHERE ID ='$id' AND AgenceID = '$agenceid'"; 

        $result = mysqli_query($conn, $sql);

        if ($result == true)
        {
            $_SESSION['flash']="Etat de lieux modifié avec succes";

            echo "<script type='text/javascript'>location.href = 'dashboard.php';</script>";

        }
        else
        {
            $_SESSION['flash']="Erreur survenue lors de la modification";

            echo "<script type='text/javascript'>location.href = 'dashboard.php';</script>";
        }

    }

    mysqli_close($conn);

    ob_end_flush();

?>