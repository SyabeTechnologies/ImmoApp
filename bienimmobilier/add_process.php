<?php
    ob_start();

    session_start();

    include('../connection.php');

    include('../php/check.php');

    if(isset($_POST['submit']))
    {

        $nom = $_POST['nom'];

        $loyerprix = $_POST['loyerprix'];

        $type = $_POST['type'];

        $nombrepiece = $_POST['nombrepiece'];

        $immeubleid = $_POST['immeubleid'];

        $agenceid = $_SESSION['agenceid'];

        $sql = "INSERT INTO Bienimmobilier (Nom, Status, LoyerPrix, Type, NombrePiece, ImmeubleID, agenceID) 
        VALUES ('$nom', '1', '$loyerprix','$type' ,'$nombrepiece', '$immeubleid', '$agenceid')"; 

        $result = mysqli_query($conn, $sql);

        if ($result == true)
        {
            $_SESSION['flash']="Bien ajouté avec succes";

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