<?php

//READ
if (isset($_POST['NameDuBoutonSubmit'])) {
    $ValeurARecuperer1 = $_POST['ValeurARecuperer1'];
    try {
      $pdo = new PDO(DB_DRIVER . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET, DB_LOGIN, DB_PASS, DB_OPTIONS);
      $requete = "SELECT * FROM `NomDeLaTable` WHERE ValeurARecuperer1 = :ValeurARecuperer1;";
      $prepare = $pdo->prepare($requete);
      $prepare->execute(array(
        ':ValeurARecuperer1' => $ValeurARecuperer1
      ));
      $res = $prepare->rowCount();
      $resultat = $prepare->fetchAll();
      echo ('<p>Truc : ' . htmlentities($resultat[0]['IndexDeLaValeurAAfficher1'], ENT_QUOTES) . '</p>
            <p>Machin : ' . htmlentities($resultat[0]['IndexDeLaValeurAAfficher2'], ENT_QUOTES) . '</p>');
    } catch (PDOException $e) {
      exit("❌🙀❌ OOPS :\n" . $e->getMessage());
      echo('<a href="index.html">Dégage</a>');
    }
  }

?>