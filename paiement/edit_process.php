<?php

    ob_start();

    session_start();

    include('../connection.php');

    include('../php/check.php');

    if(isset($_POST['submit']))
    {
        $id = $_POST['id'];

        $date = $_POST['date'];

        $dateecheance = $_POST['dateecheance'];

        $frais = $_POST['frais'];

        $pourcentage = $_POST['pourcentage'];
         
        $contratid = $_POST['contratid'];
        
        $agenceid = $_SESSION['agenceid'];

        $jour = date('d-m-Y');

        if($dateecheance > $jour)
        {

             //calcul du total

        //recuperation du montant du loyer
        $loyer = "SELECT LoyerMensuel AS loyer
            FROM Contrat
            WHERE ID = $contratid AND AgenceID = $agenceid";

        $resultLoyer = mysqli_query($conn, $loyer);
        
        $r = mysqli_fetch_assoc($resultLoyer);
        
        $montantloyer = $r['loyer'];

        // Free result set
        mysqli_free_result($resultLoyer);

        //Total
        $total = $montantloyer + $frais;

            $sql = "UPDATE PaiementLocataire 
            SET Date = '$date', DateEcheance = '$dateecheance', FraisGardiennage = '$frais', Penalite = 0, Pourcentage = '$pourcentage', Status = 0, Total = '$total', ContratID = '$contratid'  
            WHERE ID='$id' AND AgenceID = '$agenceid'"; 
        }
        
        else{
            
            $sql = "UPDATE PaiementLocataire 
            SET Date = '$date', DateEcheance = '$dateecheance', FraisGardiennage = '$frais', Pourcentage = '$pourcentage', ContratID = '$contratid'  
            WHERE ID='$id' AND AgenceID = '$agenceid'"; 
        }

        $result = mysqli_query($conn, $sql);

        if ($result == true)
        {
            $_SESSION['flash']="Paiement modifié avec succes";

            echo "<script type='text/javascript'>location.href = 'dashboard.php';</script>";

        }
        else
        {
            $_SESSION['flash']="Erreur survenue lors de la modification";

           echo "<script type='text/javascript'>location.href = 'dashboard.php';</script>";
        }

    }

    mysqli_close($conn);

    ob_end_flush();

?>