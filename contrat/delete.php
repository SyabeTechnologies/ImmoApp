<?php

    ob_start();

    session_start();

    include('../connection.php');

    include('../php/check.php');

    if(isset($_GET['id']))
    {
        $id = $_GET['id'];

        $agenceid = $_SESSION['agenceid'];

        $sql2 = "SELECT * FROM Contrat WHERE ID = '$id' AND AgenceID = '$agenceid'"; 

        $result2 = mysqli_query($conn, $sql2);

        foreach ($result2 as $toto)
        {
            $lolo = $toto['BienImmobilierID'];
        }

        $sql1 = "UPDATE BienImmobilier SET Status = 0 WHERE ID = '$lolo' AND AgenceID = '$agenceid'"; 

        $result1 = mysqli_query($conn, $sql1);

        if ($result1 == true)
        {
            $sql = "DELETE FROM Contrat WHERE ID = '$id' AND AgenceID = '$agenceid'"; 

            $result = mysqli_query($conn, $sql);

            if ($result == true)
            {
                $_SESSION['flash']="Contrat supprimé avec succes";

                echo "<script type='text/javascript'>location.href = 'dashboard.php';</script>";
            }
            else
            {
                $_SESSION['flash']="Erreur survenue lors de la supression de la location";

                echo "<script type='text/javascript'>location.href = 'dashboard.php';</script>";
            }

        }
        else
        {
            $_SESSION['flash']="Erreur survenue lors de la supression du contrat";

            echo "<script type='text/javascript'>location.href = 'dashboard.php';</script>";
        }

    }

    mysqli_close($conn);

    ob_end_flush();

?>