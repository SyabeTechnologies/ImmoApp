<?php

    ob_start();

    session_start();

    include('../connection.php');

    include('../php/check.php');
     
    if(isset($_POST['submit']))
    {
   
        $id = $_POST['id'];

        $agenceid = $_SESSION['agenceid'];

        $nom = $_POST['nom'];

        $loyerprix = $_POST['loyerprix'];

        $type = $_POST['type'];

        $nombrepiece = $_POST['nombrepiece'];

        $immeubleid = $_POST['immeubleid'];

        $sql = "UPDATE Bienimmobilier SET Nom = '$nom',  LoyerPrix = '$loyerprix',  Type = '$type', NombrePiece ='$nombrepiece', ImmeubleID = '$immeubleid'
                 WHERE ID = '$id' AND AgenceID = '$agenceid'"; 

        $result = mysqli_query($conn, $sql);

        if ($result == true)
        {
            $_SESSION['flash']="Bien Immobilier modifié avec succes";

            echo "<script type='text/javascript'>location.href = 'dashboard.php';</script>";

        }
        else
        {
            $_SESSION['flash']="Erreur survenue lors de la modification du Bien Immobilier";

            echo "<script type='text/javascript'>location.href = 'dashboard.php';</script>";
        }

    }

    mysqli_close($conn);

    ob_end_flush();

?>