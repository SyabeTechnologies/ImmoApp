<?php

    ob_start();

    session_start();

    include('../connection.php');

    include('../php/check.php');

        $id = $_POST['id'];
        $agenceid = $_SESSION['agenceid'];

        $nom = $_POST['nom'];

        $specialite = $_POST['specialite'];

        $contact = $_POST['contact'];

        $email = $_POST['email'];

        $localisation = $_POST['localisation'];

        $sql = "UPDATE Partenaire 
            SET Nom = '$nom', Specialite = '$specialite', Contact = '$contact', Email = '$email', Localisation = '$localisation' 
            WHERE  ID='$id' AND AgenceID = '$agenceid'"; 

        $result = mysqli_query($conn, $sql);

        if ($result == true)
        {
            $_SESSION['flash']="Partenaire modifié avec succes";

            echo "<script type='text/javascript'>location.href = 'dashboard.php';</script>";

        }
        else
        {
            $_SESSION['flash']="Erreur survenue lors de la modification";

            echo "<script type='text/javascript'>location.href = 'dashboard.php';</script>";
        }

    

    mysqli_close($conn);

    ob_end_flush();

?>