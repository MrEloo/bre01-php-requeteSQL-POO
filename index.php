<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php

    require 'User.class.php';
    require 'config/connexion.php';

    //REQUETE PERMETTANT DE RECUPERER TOUS LES UTILISATEURS DE LA TABLES
    $query = $db->prepare('SELECT * FROM users');
    $query->execute();
    $usersDatas = $query->fetchAll(PDO::FETCH_ASSOC);


    //CREATIONS D'UN TABLEAU QUI CONTIENDRA LES INSTANCES DE CLASSES
    $users = [];


    //CREATIONS D'UNE INSTANCE DE CLASSE POUR CHAQUE PERSONNE, PUIS PUSH DAND LE TABLEAU USERS CREE PRECEDEMMENT
    foreach ($usersDatas as $key => $usersData) {
        $user = new User("", "", "");
        $user->hydrate($usersData);
        $users[] = $user;
    }




    //VERIFICATION ET AFFICHAGE A PARTIR DU TABLEAU USERS
    // foreach ($users as $key => $user) {
    //     echo $user->getFirstName() . "<br>";
    //     echo $user->getLastName() . "<br>";
    //     echo $user->getEmail() . "<br> <br>";
    // }

    //CREATION D'UN USER SUPERMAN
    $superman = [
        "first_name" => "Clark",
        "last_name" => "Kent",
        "email" => "clark.kent@test.fr"
    ];
    $supermanUser = new User($superman['first_name'], $superman['last_name'], $superman['email']);

    //REQUETE PERMETTANT D'INSERER UN NOUVEL UTILISATEUR
    $supermanUser->save($db);

    //RECUPERATION ET ATRIBUTION DE L'ID DU DERNIER USER DE LA TABLE
    $lastInsertedId = $db->lastInsertId();
    $supermanUser->setID($lastInsertedId);

    ?>


</body>

</html>