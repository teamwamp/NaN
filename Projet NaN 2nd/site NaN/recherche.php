<?php

    $db = new PDO('mysql:host=localhost;dbname=site', 'root', '');

    if (isset($_GET['motclef'])) {
        $motclef = $_GET['motclef'];
        $q = ['motclef' => $motclef.'%'];
        $sql = 'SELECT * FROM etudiants where nom like :motclef or prenoms like :motclef  or id like :motclef';
        $req = $db->prepare($sql);
        $req->execute($q);
        $ligne = $req->rowCount();
        if ($ligne == 1) {
            while ($res = $req->fetch(PDO::FETCH_OBJ)) {
                echo 'Identifiant : '.$res->id.'<br> Nom:'.$res->nom.'<br> Prenoms : '.$res->prenoms.'<br><button href="cv.php?id='.$res->id.'" class="btn btn-success pull-right">En savoir plus</button>';
            }
        } else {
            echo 'Aucun resultat pour : <br>'.$motclef;
        }
    }
