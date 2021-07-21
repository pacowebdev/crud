<?php

//DELETE
if (isset($_POST['NameDuBoutonSubmit'])) {
    $ValeurARecuperer1 = $_POST['ValeurARecuperer1'];
    try {
      $pdo = new PDO(DB_DRIVER . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET, DB_LOGIN, DB_PASS, DB_OPTIONS);
      $requete = "DELETE FROM `NomDeLaTable` WHERE `ValeurARecuperer1` = :ValeurARecuperer1;";
      $prepare = $pdo->prepare($requete);
      $prepare->execute(array(
        ':ValeurARecuperer1' => $ValeurARecuperer1
      ));
      echo "<p>Message à afficher en cas de réussite</p>";
    } catch (PDOException $e) {
      exit("❌🙀❌ OOPS :\n" . $e->getMessage());
    }
  }

?>