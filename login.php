<?php
  ob_start();

  session_start();
  
  include('connection.php');
  
   if(isset($_POST['submit']))
  {
    
    $username = $_POST['username'];

    $password = $_POST['password'];

    $username = mysqli_real_escape_string($conn,$username);

    $password = mysqli_real_escape_string($conn,$password);

    $sql= "SELECT Utilisateur.*, Agence.Nom AS NomAgence
           FROM Utilisateur 
           INNER JOIN Agence ON Utilisateur.AgenceID = Agence.ID 
           WHERE Username ='$username' AND Password='$password'";

    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result) != 0)
    {

      $toti = mysqli_fetch_assoc($result);

      $roti = $toti['AgenceID'];

      $sql1= "SELECT * FROM Paiement WHERE AgenceID = '$roti'";

      $result1=mysqli_query($conn,$sql1);

      if(mysqli_num_rows($result1) != 0)
      {
        foreach($result1 as $rotu) 
        {
          //Inserer une ou plusieurs valeurs à la fin du tableau
          $reqc = $rotu;                               
        }

        $datefin = $reqc['DateFin'];

        $today = date("Y-m-d");

        if ($datefin >= $today)
        {
            foreach($result as $rooi) 
            {
              //Inserer une ou plusieurs valeurs à la fin du tableau
              $req = $rooi;                               
            }

            $_SESSION['userid'] = $req['ID'];

            $_SESSION['username'] = $req['Username'];

            $_SESSION['nomagence'] = $req['NomAgence'];

            $_SESSION['nomuser'] = $req['Nom'];

            $_SESSION['agenceid'] = $req['AgenceID'];

            $_SESSION['statut_immo'] = 1;

            echo "<script type='text/javascript'>location.href = 'home/dashboard.php';</script>";

        }
        else
        {

          $_SESSION['flash']="Veuillez renouveler votre souscription";

          echo "<script type='text/javascript'>location.href = 'index.php';</script>";
        }

      }
      else
      {

        $_SESSION['flash']="Veuillez acheter une souscription";

        echo "<script type='text/javascript'>location.href = 'index.php';</script>";

      }
    }

     else
     {
      $_SESSION['flash']="Votre pseudo ou mot de passe est invalide, veuillez réessayer";

      echo "<script type='text/javascript'>location.href = 'index.php';</script>";
     }
  
  }

  ob_end_flush();
?>