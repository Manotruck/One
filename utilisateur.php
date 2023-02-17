<?php
function mysqli_connect(
    ?string $hostname = null,
    ?string $username = null,
    ?string $password = null,
    ?string $database = null,
    ?int $port = null,
    ?string $socket = null
): mysqli|false 
   
    
function mysqli_query(mysqli $mysql, string $query, int $result_mode = MYSQLI_STORE_RESULT): mysqli_result|bool { 
    echo mysqli_query($mysqli,"CREATE TABLE IF NOT EXISTS `".$BDD['db']."`.`user` ( `id` INT NOT NULL AUTO_INCREMENT, `nom` VARCHAR(25) NOT NULL, `prenom` VARCHAR(25) NOT NULL, `pays` VARCHAR(25) NOT NULL, `codepostal` VARCHAR(25) NOT NULL, `pseudo` VARCHAR(25) NOT NULL , `mdp` CHAR(32) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;");
}
if(isset($_POST['nom'],$_POST['prenom'],$_POST['pays'],$_POST['codepostal'],$_POST['pseudo'],$_POST['mdp'])){//l'utilisateur à cliqué sur "S'inscrire", on demande donc si les champs sont défini avec "isset"
    if(empty($_POST['pseudo'])){
        echo "Le champ Pseudo est vide.";
    } elseif(!preg_match("#^[a-z0-9]+$#",$_POST['pseudo'])){
        echo "Le Pseudo doit être renseigné en lettres minuscules sans accents, sans caractères spéciaux.";
    } elseif(strlen($_POST['pseudo'])>25){
        echo "Le pseudo est trop long, il dépasse 25 caractères.";
    } elseif(empty($_POST['pays'])){
        echo "Le champ Pays est vide.";
    } elseif(empty($_POST['codepostal'])){
        echo "Le champ Code postal est vide.";
    } elseif(empty($_POST['mdp'])){
        echo "Le champ Mot de passe est vide.";
    } elseif(mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM user WHERE pseudo='".$_POST['pseudo']."'"))==1){//on vérifie que ce pseudo n'est pas déjà utilisé par un autre membre
        echo "Ce pseudo est déjà utilisé.";
    } else {
        //toutes les vérifications sont faites, on passe à l'enregistrement dans la base de données:
        if(!mysqli_query($mysqli,"INSERT INTO user SET nom='".$_NOM['nom']."', prenom='".$_PRENOM['prenom']."', pays='".$_PAYS['pays']."', codepostal='".$_CODEPOSTAL['codepostal']."', pseudo='".$_POST['pseudo']."', mdp='".md5($_POST['mdp'])."'")){//on crypte le mot de passe avec la fonction propre à PHP: md5()
            echo "Une erreur s'est produite: ".mysqli_error($mysqli);
        } else {
            echo "Vous êtes inscrit avec succès!";
           
        }
    }
}

    
    ?>

