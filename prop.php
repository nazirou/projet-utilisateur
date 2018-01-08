<?php

    namespace location\dao;
    use \PDO;
        class utilisateur{
            var $id;
            var $nomcomplet;
            var $login;
            var $password;
            var $etat;
            var $profil;
            private $bdd;
            private function getConnexion(){
                try{
                    if($this->bdd == null){
                        $this->bdd = new PDO('mysql:host=;dbname=BD BDLOCATION;charset=utf8', 'root', '1327',
                        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); 
                    }       
                }
                catch(Exception $e){
                    die('Erreur : ' . $e->getMessage());
                }
            
            
            }
            function addutilisateur()
            {
                $this->getConnexion();
                // requete a executer
               $sql = "insert into utilisateur 
               values(null, :nomcomplet, :login, :password, :etat ,:profil)";
               $req = $this->bdd->prepare($sql);
               $data = $req->execute(
                array('nomcomplet'=>$this->nomcomplet,
                      'login'=>$this->login,
                      'password'=>$this->password,
                      'etat'=>$this->etat,
                      'profil'=>$this->profil
            ));
            return $data;
        }
        function allutilisateur()
        {
            $this->getConnexion();
            // requete a executer
           $sql = "select * from utilisateur";
            // preparation de la requete
            $donnees = $this->bdd->query($sql);
            return $donnees;
        }

    }
    
?>
