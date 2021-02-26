<?php

/**
 * Reprenez le code de l'exercice précédent et transformez vos requêtes pour utiliser les requêtes préparées
 * la méthode de bind du paramètre et du choix du marqueur de données est à votre convenance.
 */

try {
    /**
     * Créez ici votre objet de connection PDO, et utilisez à chaque fois le même objet $pdo ici.
     */
    $server = "localhost";
    $db = "table2testphp";
    $user = "root";
    $pass = "";

    $pdo = new PDO("mysql:host=$server;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    /**
     * 1. Insérez un nouvel utilisateur dans la table utilisateur.
     */

    // TODO votre code ici.

    $nom = "Droskall";
    $prenom = "Droskall";
    $email = "droskall@blabla.fr";
    $password = "azerty";
    $adresse = "fort-dragon";
    $codePostal = 0001;
    $pays = "france";
    $dateJoin = NULL;

    $newUser = $pdo->prepare("
        INSERT INTO table2testphp.utilisateur (nom, prenom, email, password, adresse, code_postal, pays, date_join) 
        VALUES (:nom, :prenom, :email, :password, :adresse, :codePostal, :pays, :dateJoin)
    ");

    $newUser->bindParam(":nom", $nom);
    $newUser->bindParam(":prenom", $prenom);
    $newUser->bindParam(":email", $email);
    $newUser->bindParam(":password", $password);
    $newUser->bindParam(":adresse", $adresse);
    $newUser->bindParam(":codePostal", $codePostal, PDO::PARAM_INT);
    $newUser->bindParam(":pays", $pays);
    $newUser->bindParam(":dateJoin", $dateJoin);

    $newUser->execute();

    /**
     * 2. Insérez un nouveau produit dans la table produit
     */

    // TODO votre code ici.

    $titre = "pomme";
    $prix = 200;
    $descriptionCourte = "un fruit";
    $descriptionLongue = "un fruit qui se mange";

    $newProduct = $pdo->prepare("
        INSERT INTO table2testphp.produit (titre, prix, description_courte, descrition_longue) 
        VALUES (:titre, :prix, :descriptionCourte, :descriptionLongue)
    ");

    $newProduct->bindParam(":titre", $titre);
    $newProduct->bindParam(":prix", $prix, PDO::PARAM_INT);
    $newProduct->bindParam(":descriptionCourte", $descriptionCourte);
    $newProduct->bindParam(":descriptionLongue", $descriptionLongue);

    $newProduct->execute();

    /**
     * 3. En une seule requête, ajoutez deux nouveaux utilisateurs à la table utilisateur.
     */

    // TODO Votre code ici.

    $nom = "De-Rive";
    $prenom = "Geralt";
    $email = "witcher@gmail.com";
    $password = "1234";
    $adresse = "Kaer Mohren";
    $codePostal = 0002;
    $pays = "Novigrad";
    $dateJoin = NULL;
    $nom2 = "Blaviken";
    $prenom2 = "Le Boucher";
    $email2 = "geralt@gmail.com";
    $password2 = "azerty1234";
    $adresse2 = "Velen";
    $codePostal2 = 0003;
    $pays2 = "Skelige";
    $dateJoin2 = NULL;

    $newUser = $pdo->prepare("
        INSERT INTO table2testphp.utilisateur (nom, prenom, email, password, adresse, code_postal, pays, date_join) 
        VALUES (:nom, :prenom, :email, :password, :adresse, :codePostal, :pays, :dateJoin),
               (:nom2, :prenom2, :email2, :password2, :adresse2, :codePostal2, :pays2, :dateJoin2) 
    ");

    $newUser->bindParam(":nom", $nom);
    $newUser->bindParam(":prenom", $prenom);
    $newUser->bindParam(":email", $email);
    $newUser->bindParam(":password", $password);
    $newUser->bindParam(":adresse", $adresse);
    $newUser->bindParam(":codePostal", $codePostal, PDO::PARAM_INT);
    $newUser->bindParam(":pays", $pays);
    $newUser->bindParam(":dateJoin", $dateJoin);
    $newUser->bindParam(":nom2", $nom2);
    $newUser->bindParam(":prenom2", $prenom2);
    $newUser->bindParam(":email2", $email2);
    $newUser->bindParam(":password2", $password2);
    $newUser->bindParam(":adresse2", $adresse2);
    $newUser->bindParam(":codePostal2", $codePostal2, PDO::PARAM_INT);
    $newUser->bindParam(":pays2", $pays2);
    $newUser->bindParam(":dateJoin2", $dateJoin2);

    $newUser->execute();

    /**
     * 4. En une seule requête, ajoutez deux produits à la table produit.
     */

    // TODO Votre code ici.

    $titre = "pomme";
    $prix = 2.54;
    $descriptionCourte = "un fruit";
    $descriptionLongue = "un fruit qui se mange";
    $titre2 = "banane";
    $prix2 = 22;
    $descriptionCourte2 = "un fruit";
    $descriptionLongue2 = "un fruit jaune qui se mange";

    $newProduct = $pdo->prepare("
        INSERT INTO table2testphp.produit (titre, prix, description_courte, descrition_longue) 
        VALUES (:titre, :prix, :descriptionCourte, :descriptionLongue),
               (:titre2, :prix2, :descriptionCourte2, :descriptionLongue2)
    ");

    $newProduct->bindParam(":titre", $titre);
    $newProduct->bindParam(":prix", $prix, PDO::PARAM_INT);
    $newProduct->bindParam(":descriptionCourte", $descriptionCourte);
    $newProduct->bindParam(":descriptionLongue", $descriptionLongue);
    $newProduct->bindParam(":titre2", $titre2);
    $newProduct->bindParam(":prix2", $prix2, PDO::PARAM_INT);
    $newProduct->bindParam(":descriptionCourte2", $descriptionCourte2);
    $newProduct->bindParam(":descriptionLongue2", $descriptionLongue2);

    $newProduct->execute();

    /**
     * 5. A l'aide des méthodes beginTransaction, commit et rollBack, insérez trois nouveaux utilisateurs dans la table utilisateur.
     */

    // TODO Votre code ici.

    $pdo->beginTransaction();

    $nom = "Michel";
    $prenom = "Michel";
    $email = "mich@gmail.com";
    $password = "jesuismichel";
    $adresse = "liberte";
    $codePostal = 59820;
    $pays = "France";
    $dateJoin = NULL;

    $newUser = $pdo->prepare("
        INSERT INTO table2testphp.utilisateur (nom, prenom, email, password, adresse, code_postal, pays, date_join) 
        VALUES (:nom, :prenom, :email, :password, :adresse, :codePostal, :pays, :dateJoin)
    ");

    $newUser->bindParam(":nom", $nom);
    $newUser->bindParam(":prenom", $prenom);
    $newUser->bindParam(":email", $email);
    $newUser->bindParam(":password", $password);
    $newUser->bindParam(":adresse", $adresse);
    $newUser->bindParam(":codePostal", $codePostal, PDO::PARAM_INT);
    $newUser->bindParam(":pays", $pays);
    $newUser->bindParam(":dateJoin", $dateJoin);

    $newUser->execute();

    $nom = "JM";
    $prenom = "JM";
    $email = "ilestcontent@gmail.com";
    $password = "azerty";
    $adresse = "DTC";
    $codePostal = 3333;
    $pays = "France";
    $dateJoin = NULL;

    $newUser = $pdo->prepare("
        INSERT INTO table2testphp.utilisateur (nom, prenom, email, password, adresse, code_postal, pays, date_join) 
        VALUES (:nom, :prenom, :email, :password, :adresse, :codePostal, :pays, :dateJoin)
    ");

    $newUser->bindParam(":nom", $nom);
    $newUser->bindParam(":prenom", $prenom);
    $newUser->bindParam(":email", $email);
    $newUser->bindParam(":password", $password);
    $newUser->bindParam(":adresse", $adresse);
    $newUser->bindParam(":codePostal", $codePostal, PDO::PARAM_INT);
    $newUser->bindParam(":pays", $pays);
    $newUser->bindParam(":dateJoin", $dateJoin);

    $newUser->execute();

    $nom = "Rabit";
    $prenom = "Roger";
    $email = "rabit@Roger.fr";
    $password = "rogerRabit";
    $adresse = "mimi";
    $codePostal = 7898;
    $pays = "ToonLand";
    $dateJoin = NULL;

    $newUser = $pdo->prepare("
        INSERT INTO table2testphp.utilisateur (nom, prenom, email, password, adresse, code_postal, pays, date_join) 
        VALUES (:nom, :prenom, :email, :password, :adresse, :codePostal, :pays, :dateJoin)
    ");

    $newUser->bindParam(":nom", $nom);
    $newUser->bindParam(":prenom", $prenom);
    $newUser->bindParam(":email", $email);
    $newUser->bindParam(":password", $password);
    $newUser->bindParam(":adresse", $adresse);
    $newUser->bindParam(":codePostal", $codePostal, PDO::PARAM_INT);
    $newUser->bindParam(":pays", $pays);
    $newUser->bindParam(":dateJoin", $dateJoin);

    $newUser->execute();

    $pdo->commit();

    /**
     * 6. A l'aide des méthodes beginTransaction, commit et rollBack, insérez trois nouveaux produits dans la table produit.
     */

    $pdo->beginTransaction();

    $titre = "epee";
    $prix = 24;
    $descriptionCourte = "epee";
    $descriptionLongue = "epee pour tuer";

    $newProduct = $pdo->prepare("
        INSERT INTO table2testphp.produit (titre, prix, description_courte, descrition_longue) 
        VALUES (:titre, :prix, :descriptionCourte, :descriptionLongue)
    ");

    $newProduct->bindParam(":titre", $titre);
    $newProduct->bindParam(":prix", $prix, PDO::PARAM_INT);
    $newProduct->bindParam(":descriptionCourte", $descriptionCourte);
    $newProduct->bindParam(":descriptionLongue", $descriptionLongue);

    $newProduct->execute();

    $titre = "hache";
    $prix = 2785;
    $descriptionCourte = "hache";
    $descriptionLongue = "hache pour tuer";

    $newProduct = $pdo->prepare("
        INSERT INTO table2testphp.produit (titre, prix, description_courte, descrition_longue) 
        VALUES (:titre, :prix, :descriptionCourte, :descriptionLongue)
    ");

    $newProduct->bindParam(":titre", $titre);
    $newProduct->bindParam(":prix", $prix, PDO::PARAM_INT);
    $newProduct->bindParam(":descriptionCourte", $descriptionCourte);
    $newProduct->bindParam(":descriptionLongue", $descriptionLongue);

    $newProduct->execute();

    $titre = "couteau";
    $prix = 1;
    $descriptionCourte = "couteau";
    $descriptionLongue = "couteau de lance";

    $newProduct = $pdo->prepare("
        INSERT INTO table2testphp.produit (titre, prix, description_courte, descrition_longue) 
        VALUES (:titre, :prix, :descriptionCourte, :descriptionLongue)
    ");

    $newProduct->bindParam(":titre", $titre);
    $newProduct->bindParam(":prix", $prix, PDO::PARAM_INT);
    $newProduct->bindParam(":descriptionCourte", $descriptionCourte);
    $newProduct->bindParam(":descriptionLongue", $descriptionLongue);

    $newProduct->execute();

    $pdo->commit();
}

catch (PDOException $e){
    echo $e->getMessage();
    $pdo->rollBack();
}