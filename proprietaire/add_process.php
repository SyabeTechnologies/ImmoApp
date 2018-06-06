<?php
    ob_start();

    session_start();

    include('../connection.php');

    include('../php/check.php');

    if(isset($_POST['submit']))
    {

        $nom = $_POST['nom'];

        $contact = $_POST['contact'];

        $email = $_POST['email'];

        $contrat = $_POST['contrat'];

        $agenceid = $_SESSION['agenceid'];

        $sql = "INSERT INTO Proprietaire  (Nom,  Contact, Email, Contrat, AgenceID)  
                VALUES  ('$nom', '$contact', '$email', '$contrat', '$agenceid')"; 

        $result = mysqli_query($conn, $sql);

        if ($result == true)
        {
            $_SESSION['flash']="Proprietaire ajouté avec succes";

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