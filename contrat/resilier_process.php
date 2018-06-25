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
            $sql3 = "SELECT * FROM Contrat WHERE ID = '$id' AND AgenceID = '$agenceid'";

            $result3 = mysqli_query($conn, $sql3);

            foreach ($result3 as $toto)
            {
                $bien = $toto['BienImmobilierID'];
            }

            $sql1 = "UPDATE BienImmobilier SET Status = 0 WHERE ID = '$bien' AND AgenceID = '$agenceid'";

            $result1 = mysqli_query($conn, $sql1);

            if ($result1 == true)
            {

                $_SESSION['flash']="Resiliation contrat ajouté avec succes";

                echo "<script type='text/javascript'>location.href = 'dashboard.php';</script>";
            
            }
            else
            {
                $_SESSION['flash']="Erreur survenue lors de la modification du status du bien immobilier";

                echo "<script type='text/javascript'>location.href = 'dashboard.php';</script>";
            }

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