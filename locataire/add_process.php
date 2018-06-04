<?php
    ob_start();

    session_start();

    include('../connection.php');

    include('../php/check.php');

    if(isset($_POST['submit']))
    {

        $nom = $_POST['nom'];

        $datenaissance = $_POST['datenaissance'];

        $profession = $_POST['profession'];

        $numcompte = $_POST['numcompte'];

        $cni = $_POST['cni'];

        $agenceid = $_SESSION['agenceid'];

        $sql = "INSERT INTO Locataire (Nom, DateNaissance, Profession, NumCompte, CNI, AgenceID) 
                VALUES ('$nom','$datenaissance', '$profession', '$numcompte', '$cni', '$agenceid')"; 

        $result = mysqli_query($conn, $sql);

        if ($result == true)
        {
            $_SESSION['flash']="Locataire ajouté avec succes";

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