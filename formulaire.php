<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
    <body>
        <form action="" method="post">
            
                
                    nomcomplet: 
                    <input type="text" name="nomcompl"> <br>
                
                
                    login :
                    <input type="text" name="login"> <br>
                
                
                    password: 
                    <input type="password" name="password"> <br>

                    etat: 
                    <input type="text" name="etat"> <br>
                
                profil:
                <select name="profil" id="olio">
                    <option value="">Profil</option>
                    <option value="user">user</option>
                    <option value="admin">admin</option>
                </select><br>
                <input type="submit" name="envoyer" value="envoyer">
            
        </form>
        <?php

            require 'prop.php';
            use location\dao\utilisateur;
            $u = new utilisateur();

            extract($_POST);
            if(isset($envoyer)){
                $u->nomcomplet = $nomcompl;
                $u->login = $login;
                $u->password = $password;
                $u->etat = $etats;
                $u->profil = $profil;
                $u->addutilisateur();
            }
            

        ?>
    </body>
</html>