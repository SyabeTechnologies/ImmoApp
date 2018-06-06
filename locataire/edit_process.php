<?php

    ob_start();

    session_start();

    include('../connection.php');

    include('../php/check.php');

    if(isset($_POST['submit']))
    {
        $id = $_POST['id'];

        $nom = $_POST['nom'];
         
        $contact = $_POST['contact'];

        $datenaissance = $_POST['datenaissance'];

        $profession = $_POST['profession'];

        $numcompte = $_POST['numcompte'];

        $cni = $_POST['cni'];

        $agenceid = $_SESSION['agenceid'];

        $sql = "UPDATE Locataire 
            SET  Nom='$nom', Contact='$contact', DateNaissance='$datenaissance', Profession='$profession', Numcompte = '$numcompte', CNI = '$cni' 
            WHERE ID = '$id' AND AgenceID = '$agenceid'"; 

        $result = mysqli_query($conn, $sql);

        if ($result == true)
        {
            $_SESSION['flash']="Locataire modifié avec succes";

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