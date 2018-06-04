<?php

    ob_start();

    session_start();

    include('../connection.php');

    include('../php/check.php');

    if(isset($_POST['submit']))
    {
        $id = $_POST['id'];

        $date = $_POST['date'];

       $description = $_POST['description'];

        $locataireid = $_POST['locataireid'];

        $agenceid = $_SESSION['agenceid'];

        $sql = "UPDATE Antecedent 
                SET  Date = '$date', Description = '$description', LocataireID = '$locataireid'
                WHERE ID ='$id' AND AgenceID = '$agenceid'"; 

        $result = mysqli_query($conn, $sql);

        if ($result == true)
        {
            $_SESSION['flash']="Antecedent modifié avec succes";

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