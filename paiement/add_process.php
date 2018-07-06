<?php
    ob_start();

    session_start();

    include('../connection.php');

    include('../php/check.php');

    if(isset($_POST['submit']))
    {

        $date = $_POST['date'];

        $dateecheance = $_POST['dateecheance'];

        $frais = $_POST['frais'];

        $pourcentage = $_POST['pourcentage'];

        $penalite = 0;

        $status = 0;

        $contrat = $_POST['contratid'];

        $agenceid = $_SESSION['agenceid'];

        //calcul du total

        //recuperation du montant du loyer
        $loyer = "SELECT LoyerMensuel AS loyer
            FROM Contrat
            WHERE ID = $contrat AND AgenceID = $agenceid";

        $resultLoyer = mysqli_query($conn, $loyer);
        
        $r = mysqli_fetch_assoc($resultLoyer);
        
        $montantloyer = $r['loyer'];

        // Free result set
        mysqli_free_result($resultLoyer);

        //Total
        $total = $montantloyer + $frais;

        $sql = "INSERT INTO PaiementLocataire (Date, DateEcheance, FraisGardiennage, Penalite, Pourcentage, Status, Total, ContratID, AgenceID) 
                VALUES ('$date', '$dateecheance', '$frais', '$penalite', '$pourcentage', '$status', '$total', '$contrat', '$agenceid')"; 

        $result = mysqli_query($conn, $sql);

        if ($result == true)
        {
            $_SESSION['flash']="Paiement ajouté avec succes";

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