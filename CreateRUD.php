<?php

//CREATE
if (isset($_POST['NameDuBoutonSubmit'])) {
  $ValeurARecuperer1 = $_POST['ValeurARecuperer1'];
  $ValeurARecuperer2 = $_POST['ValeurARecuperer2'];
  try {
    $pdo = new PDO(DB_DRIVER . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET, DB_LOGIN, DB_PASS, DB_OPTIONS);
    $requete = "INSERT INTO `NomDeLaTable` (`NomDeLaColonne1`, `NomDeLaColonne2`)
                VALUES (:ValeurAEntrer1, :ValeurAEntrer2);";
    $prepare = $pdo->prepare($requete);
    $prepare->execute(array(
      ':ValeurAEntrer1' => $ValeurARecuperer1,
      ':ValeurAEntrer2' => $ValeurARecuperer2
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