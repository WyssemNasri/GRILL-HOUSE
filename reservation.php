<?php
    // Récupération des données du formulaire
    $nom = $_POST['name'];
    $email = $_POST['email'];
    $telephone = $_POST['phone'];
    $dateReservation = $_POST['date'];
    $heureReservation = $_POST['time'];
    $nbInvites = $_POST['guests'];
    $infosSupplementaires = $_POST['additional-info'];

    // Connexion à la base de données (à modifier avec vos informations)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "reservation";

    // Création d'une connexion
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Vérification de la connexion
    if ($conn->connect_error) {
        die("La connexion a échoué : " . $conn->connect_error);
    }

    // Requête SQL pour insérer les données dans la table reservations
    $sql = "INSERT INTO reservations (nom, email, telephone, date_reservation, heure_reservation, nb_invites, infos_supplementaires)
    VALUES ('$nom', '$email', '$telephone', '$dateReservation', '$heureReservation', '$nbInvites', '$infosSupplementaires')";

    if ($conn->query($sql) === TRUE) {
        echo "Enregistrement effectué avec succès.";
    } else {
        echo "Erreur : " . $sql . "<br>" . $conn->error;
    }

    // Fermeture de la connexion à la base de données
    $conn->close();

