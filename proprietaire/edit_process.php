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

        $contact = $_POST['contact'];

        $email = $_POST['email'];

        $contrat = $_POST['contrat'];

        $sql = "UPDATE Proprietaire 
            SET Nom = '$nom', Contact = '$contact', Email = '$email', Contrat = '$contrat' 
            WHERE  ID='$id' AND AgenceID = '$agenceid'"; 

        $result = mysqli_query($conn, $sql);

        if ($result == true)
        {
            $_SESSION['flash']="Proprietaire modifié avec succes";

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