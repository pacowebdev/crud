<?php

//UPDATE
if (isset($_POST['NameDuBoutonSubmit'])) {
    $ValeurARecuperer1 = $_POST['ValeurARecuperer1'];
    $ValeurARecuperer2 = $_POST['ValeurARecuperer2'];
    try {
      $pdo = new PDO(DB_DRIVER . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET, DB_LOGIN, DB_PASS, DB_OPTIONS);
      $requete = "UPDATE `NomDeLaTable` SET `NomDeLaColonne` = :NomDeLaColonne WHERE `ValeurDeCiblage` = :ValeurDeCiblage;";
      $prepare = $pdo->prepare($requete);
      $prepare->execute(array(
        ':NomDeLaColonne' => $ValeurARecuperer1,
        ':ValeurDeCiblage' => $ValeurARecuperer2
      ));
      $res = $prepare->rowCount();
  
      if ($res == 1) {
        echo "<p>Message à afficher en cas de réussite</p>";
      }
    } catch (PDOException $e) {
      exit("❌🙀❌ OOPS :\n" . $e->getMessage());
    }
  }

?>