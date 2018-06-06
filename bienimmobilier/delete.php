<?php

    ob_start();

    session_start();

    include('../connection.php');

    include('../php/check.php');

    
        $id = $_GET['id'];

        $agenceid = $_SESSION['agenceid'];

        $sql= "DELETE FROM Bienimmobilier WHERE ID = '$id' AND AgenceID = '$agenceid'"; 

        $result = mysqli_query($conn, $sql);

        if ($result == true)
        {
            $_SESSION['flash']="Bien Immobilier supprimé avec succes";

            echo "<script type='text/javascript'>location.href = 'dashboard.php';</script>";

        }
        else
        {
            $_SESSION['flash']="Erreur survenue lors de la supression";

            echo "<script type='text/javascript'>location.href = 'dashboard.php';</script>";
        }

    

    mysqli_close($conn);

    ob_end_flush();

?>