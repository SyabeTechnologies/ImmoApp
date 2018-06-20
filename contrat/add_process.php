<?php

    ob_start();

    session_start();

    include('../connection.php');

    include('../php/check.php');

    if(isset($_POST['submit']))
    {

        $date = $_POST['date'];

        $bienimmobilier = $_POST['bienimmobilier'];

        $locataire = $_POST['locataire'];

        $loyer = $_POST['loyer'];

        $caution = $_POST['caution'];

        $avance = $_POST['avance'];

        $contrat = base64_encode(file_get_contents($_FILES['contrat']['tmp_name']));

        $agenceid = $_SESSION['agenceid'];

        $sql = "INSERT INTO Contrat (Date, LoyerMensuel, Caution, Avance, Contrat, BienImmobilierID, LocataireID, AgenceID) 
                VALUES ('$date', '$loyer', '$caution', '$avance', '$contrat', '$bienimmobilier','$locataire', '$agenceid')"; 

        $result = mysqli_query($conn, $sql);

        $contratid = mysqli_insert_id($conn);

        if ($result == true)
        {
            $sql1 = "UPDATE BienImmobilier SET Status = 1 WHERE ID = '$bienimmobilier' AND AgenceID = '$agenceid'"; 

            $result1 = mysqli_query($conn, $sql1);

            if ($result1 == true)
            {
                //$sql2 = "INSERT INTO Location (BienImmobilierID, LocataireID, ContratID, AgenceID) 
                //         VALUES ('$bienimmobilier','$locataire', '$contratid', '$agenceid')"; 

                //$result2 = mysqli_query($conn, $sql2);

                //if ($result2 == true)
                //{

                    $_SESSION['flash']="Contrat ajouté avec succes";

                    echo "<script type='text/javascript'>location.href = 'dashboard.php';</script>";

                //}

                //else
                //{
                //    $_SESSION['flash']="Erreur lors de l'insertion de la location";

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
            $_SESSION['flash']="Erreur survenue lors de l'ajout du contrat";

            echo "<script type='text/javascript'>location.href = 'dashboard.php';</script>";
        }

    }

    mysqli_close($conn);

    ob_end_flush();

?>