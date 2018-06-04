<?php

    ob_start();

    session_start();

    include('../connection.php');

    include('../php/check.php');

    if(isset($_POST['submit']))
    {

        $date = date("Y-m-d");

        $description = $_POST['description'];

        $locataireid = $_POST['locataireid'];

        $agenceid = $_SESSION['agenceid'];

        $sql = "INSERT INTO Antecedent (Date, Description, LocataireID, AgenceID) 
                VALUES ('$date', '$description', '$locataireid', '$agenceid')"; 

        $result = mysqli_query($conn, $sql);

        if ($result == true)
        {
            $_SESSION['flash'] = "Antecedent ajouté avec succes";

            echo "<script type='text/javascript'>location.href = 'dashboard.php';</script>";

        }
        else
        {
            $_SESSION['flash'] = "Erreur survenue lors de l'ajout";

            echo "<script type='text/javascript'>location.href = 'dashboard.php';</script>";
        }

    }

    mysqli_close($conn);

    ob_end_flush();

?>