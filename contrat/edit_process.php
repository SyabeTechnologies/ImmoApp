<?php

    ob_start();

    session_start();

    include('../connection.php');

    include('../php/check.php');

    if(isset($_POST['submit']))
    {
        $id = $_POST['id'];

        $date = $_POST['date'];

        $bienimmobilier = $_POST['bienimmobilier'];

        $locataire = $_POST['locataire'];

        $loyer = $_POST['loyer'];

        $caution = $_POST['caution'];

        $avance = $_POST['avance'];

        $contrat = base64_encode(file_get_contents($_FILES['contrat']['tmp_name']));

        $agenceid = $_SESSION['agenceid'];

        $sql2 = "SELECT * FROM Contrat WHERE ID = '$id' AND AgenceID = '$agenceid'"; 

        $result2 = mysqli_query($conn, $sql2);

        foreach ($result2 as $toto)
        {
            $lolo = $toto['BienImmobilierID'];
        }

        $sql1 = "UPDATE BienImmobilier SET Status = 0 WHERE ID = '$lolo' AND AgenceID = '$agenceid'"; 

        $result1 = mysqli_query($conn, $sql1);

        if ($result == true)
        {


            $sql = "UPDATE Contrat SET  BienImmobilierID = '$bienimmobilier', LocataireID = '$locataire', Loyer = '$loyer', Caution = '$caution', Avance = '$avance' WHERE ID = '$id' AND AgenceID = '$agenceid'"; 

            $result = mysqli_query($conn, $sql);

            if ($result == true)
            {
                $sql1 = "UPDATE BienImmobilier SET Status = 1 WHERE ID = '$bienimmobilier' AND AgenceID = '$agenceid'"; 

                $result1 = mysqli_query($conn, $sql1);

                if ($result1 == true)
                {
                    // $sql3 = "UPDATE Location SET BienImmobilierID = '$bienimmobilier', LocataireID = '$locataire' WHERE ContratID = '$id'  AND AgenceID = '$agenceid'"; 

                    // $result3 = mysqli_query($conn, $sql3);

                    // if ($result3 == true)
                    // {

                        $_SESSION['flash']="Contrat modifié avec succes";

                        echo "<script type='text/javascript'>location.href = 'dashboard.php';</script>";
                    // }
                    // else
                    // {
                    //    $_SESSION['flash']="Erreur lors de la modification de la location";

                    //    echo "<script type='text/javascript'>location.href = 'dashboard.php';</script>";
                    //}

                }
                else
                {
                    $_SESSION['flash']="Erreur lors de la modification du statut du bien immobilier";

                    echo "<script type='text/javascript'>location.href = 'dashboard.php';</script>";
                }

            }
            else
            {
                $_SESSION['flash']="Erreur survenue lors de la modification du contrat";

                echo "<script type='text/javascript'>location.href = 'dashboard.php';</script>";
            }
        }
        else
        {
            $_SESSION['flash']="Erreur survenue lors de la modification du statut du bien immobilier";

            echo "<script type='text/javascript'>location.href = 'dashboard.php';</script>";
        }

    }

    mysqli_close($conn);

    ob_end_flush();

?>