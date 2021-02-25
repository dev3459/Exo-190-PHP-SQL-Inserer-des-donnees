<?php

/**
 * Pour cet exercice, vous allez utiliser la base de données table_test_php créée pendant l'exo 189
 * Vous utiliserez également les deux tables que vous aviez créées au point 2 ( créer des tables avec PHP )
 */

try {
    /**
     * Créez ici votre objet de connection PDO, et utilisez à chaque fois le même objet $pdo ici.
     */

    $server = 'localhost';
    $user = 'dev';
    $pass = 'dev';
    $pdo = new PDO("mysql:host=$server;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    /**
     * 1. Insérez un nouvel utilisateur dans la table utilisateur.
     */

    // TODO votre code ici.
    $insertRequest = "INSERT INTO table_test_php.utilisateur (nom, prenom, email, pass, adresse, code_postal, pays, date_join) VALUES ('GIBERT', 'Gaëtan', 'test@test.test', 'azerty', 'test rue test', 12, 'France', NOW())";
    $pdo->exec($insertRequest);

    /**
     * 2. Insérez un nouveau produit dans la table produit
     */

    // TODO votre code ici.
    $insertRequest = "INSERT INTO table_test_php.produit (titre, prix, description_courte, description_longue) VALUES ('mon article', 20, 'ma belle description courte', 'ma moche description longue')";
    $pdo->exec($insertRequest);

    /**
     * 3. En une seule requête, ajoutez deux nouveaux utilisateurs à la table utilisateur.
     */

    // TODO Votre code ici.
    $insertRequest = "INSERT INTO table_test_php.utilisateur (nom, prenom, email, pass, adresse, code_postal, pays, date_join) VALUES ('GIBERT', 'Gaëtan', 'test@sqfgdqgsdh.test', 'azerty', 'test rue test', 34591, 'France', NOW()), ('Azerty', 'Qwerty', 'azerty@azerty.azerty', 'hellopassword', 'essai rue essai', 12, 'France', NOW())";
    $pdo->exec($insertRequest);

    /**
     * 4. En une seule requête, ajoutez deux produits à la table produit.
     */

    // TODO Votre code ici.
    $insertRequest = "INSERT INTO table_test_php.produit (titre, prix, description_courte, description_longue) VALUES ('mon article', 20, 'ma belle description courte', 'ma moche description longue'), ('mon article 2', 202, 'ma belle description courte 2', 'ma moche description longue 2')";
    $pdo->exec($insertRequest);
    /**
     * 5. A l'aide des méthodes beginTransaction, commit et rollBack, insérez trois nouveaux utilisateurs dans la table utilisateur.
     */

    // TODO Votre code ici.
    $pdo->beginTransaction();
    $insert = "INSERT INTO table_test_php.utilisateur (nom, prenom, email, pass, adresse, code_postal, pays, date_join) VALUES ";

    $sql = $insert. "('teqsfst', 'essasdhi', 'test@tesdgsdgsdgst.test', 'pasdhsdss', 'adresse', 345637, 'France', NOW())";
    $pdo->exec($sql);

    $sql2 = $insert. "('teshst', 'essdshai', 'test@tefdsshgsst.test', 'pasdgss', 'adresse', 56789, 'France', NOW())";
    $pdo->exec($sql2);

    $sql3 = $insert. "('tesqsfqt', 'sdgsdg', 'test@tedgsgsst.test', 'passsdgsd', 'adresse', 12345, 'France', NOW())";
    $pdo->exec($sql3);

    $pdo->commit();

    /**
     * 6. A l'aide des méthodes beginTransaction, commit et rollBack, insérez trois nouveaux produits dans la table produit.
     */

    $pdo->beginTransaction();

    $insertProduits = "INSERT INTO table_test_php.produit (titre, prix, description_courte, description_longue) VALUES ";

    $sqlProduits = $insertProduits. "('gohsddgsd', 20, 'tdsiqdgqdojhjgsdoi', 'pasdhgidjsgigdsgsdss')";
    $pdo->exec($sqlProduits);

    $sqlProduits2 = $insertProduits. "('gohsqsgsqgddgsd', 2355, 'tdsioqdgqdjhjgsdoi', 'pasdhgidjsgigdsgsdss')";
    $pdo->exec($sqlProduits2);

    $sqlProduits3 = $insertProduits. "('gohsgdqgdqhddgsd', 53536, 'tdsiojqdgqdhjgsdoi', 'pasdhgidjsgqdgdqgigdsgsdss')";
    $pdo->exec($sqlProduits3);

    $pdo->commit();
}
catch (PDOException $exception){
    echo 'Une erreur est survenue' . $exception->getMessage() . " " . $exception->getLine();
    $pdo->rollBack();
}