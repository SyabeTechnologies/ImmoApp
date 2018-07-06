<?php
    ob_start();

    session_start();

    include('../connection.php');

    include('../php/check.php');

    if(isset($_POST['submit']))
    {
        $agenceid = $_SESSION['agenceid'];
        //recuperation de la date echeance
        $sql = "SELECT * 
            FROM PaiementLocataire 
            WHERE AgenceID = '$agenceid'";
            
         $result = mysqli_query($conn, $sql);

        
       foreach($result as $rot) 
        {
            $dateecheance = $rot['DateEcheance'];
            $id = $rot['ID'];
            $contrat = $rot['ContratID'];
            $pourcentage = $rot['Pourcentage'];
            $frais = $rot['FraisGardiennage'];
            $pen = $rot['Penalite'];
            
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

            if($dateecheance < setlocale(LC_ALL, "en_US.UTF-8") && $pen == 0)
            {   
                //penalite
                $penalite = $montantloyer - ($montantloyer * $pourcentage);
                 //Total
                $total = $montantloyer + $frais + $penalite;

                $sql1 = "UPDATE PaiementLocataire 
                SET Penalite = '$penalite', Status = 1, Total = '$total'  
                WHERE ID = '$id' AND AgenceID = '$agenceid'"; 

                $result1 = mysqli_query($conn, $sql1);
            }
        }   

        if ($result == true)
        {
            $_SESSION['flash']="mise á niveau effectuée";

            echo "<script type='text/javascript'>location.href = 'dashboard.php';</script>";

        }
        else
        {
            $_SESSION['flash']="Erreur survenue";

           echo "<script type='text/javascript'>location.href = 'dashboard.php';</script>";
        }

    }

    mysqli_close($conn);

    ob_end_flush();

?>