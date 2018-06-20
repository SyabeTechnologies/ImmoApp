<?php

    ob_start();

    session_start();

    include('../connection.php');

    include('../php/check.php');

    if(isset($_POST['submit']))
    {

        $id = $_POST['id'];

        $dateresiliation = $_POST['dateresiliation'];

        $agenceid = $_SESSION['agenceid'];

        $sql = "UPDATE Contrat SET Resiliation = 1, DateResiliation = '$dateresiliation' WHERE ID = '$id' AND AgenceID = '$agenceid'";

        $result = mysqli_query($conn, $sql);

        if ($result == true)
        {
            $_SESSION['flash']="Resiliation contrat ajouté avec succes";

            echo "<script type='text/javascript'>location.href = 'dashboard.php';</script>";

        }
        else
        {
            $_SESSION['flash']="Erreur survenue lors de l'ajout de la resiliation du contrat";

            echo "<script type='text/javascript'>location.href = 'dashboard.php';</script>";
        }

    }

    mysqli_close($conn);

    ob_end_flush();

?>